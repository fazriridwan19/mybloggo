<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        Post::factory(40)->create();
        Category::create([
            "nama"=>"Life style",
            "slug"=>"life-style"
        ]);
        Category::create([
            "nama"=>"Tech",
            "slug"=>"tech"
        ]);
        Category::create([
            "nama"=>"Design",
            "slug"=>"design"
        ]);
        Category::create([
            "nama"=>"Health",
            "slug"=>"health"
        ]);
        Category::create([
            "nama"=>"Sports",
            "slug"=>"sports"
        ]);
        Category::create([
            "nama"=>"Movie",
            "slug"=>"movie"
        ]);
    }
}
