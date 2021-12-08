<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ['judul', 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['user', 'category'];

    public function scopeFilter($query, array $filters){
        
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('judul', 'like', '%'.$search.'%')->orWhere('body', 'like', '%'.$search.'%');
        });

        $query->when($filters['category'] ?? false, fn($query, $category) => 
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            )
        );
        
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
