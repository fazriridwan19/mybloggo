<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul'=>$this->faker->sentence(mt_rand(2,7)),
            'slug'=>$this->faker->slug(mt_rand(1,4)),
            'excerpt'=>$this->faker->paragraph(),
            'body'=>'<p>'. implode('</p><p>', $this->faker->paragraphs(mt_rand(5,10))) . '</p>',
            'user_id'=>mt_rand(1,4),
            'category_id'=>mt_rand(1,6),
        ];
    }
}
