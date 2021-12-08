<?php

namespace App\Models;


class Post
{
    private static $data_artikel = [
        [
            "judul_artikel"=>"Competitive Programming",
            "slug"=>"competitive-programming",
            "isi"=>"Competitive programming merupakan sebuah kompetisi dimana peserta akan menyelesaikan masalah menggunakan penerapan algoritma pada pemrogramman."
        ],
        [
            "judul_artikel"=>"Creative Poster",
            "slug"=>"creative-poster",
            "isi"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid debitis, ipsam nostrum delectus tempora rerum veritatis provident quae nesciunt repudiandae maxime quia consectetur hic repellat recusandae ducimus nisi ea perferendis quibusdam iusto officiis dolores sint. Dignissimos, eum. Quas ratione eaque ipsum, et, quidem sit, porro laudantium architecto quam ad perspiciatis!"
        ],
        [
            "judul_artikel"=>"Karya Tulis Ilmiah",
            "slug"=>"karya-tulis-ilmiah",
            "isi"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam totam qui ex iure tenetur, aspernatur, eos ipsum eum eius voluptas repellat aliquam dolorem laudantium excepturi voluptatibus? Vitae beatae et deserunt."
        ],
        [
            "judul_artikel"=>"Judul artikel baru",
            "slug"=>"judul-artikel-baru",
            "isi"=>"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt delectus illo asperiores, assumenda laborum, ex dolores neque, commodi quia inventore nesciunt sit. Nisi accusantium ut voluptas tempore delectus perspiciatis. Omnis, autem. Iure dicta error eaque blanditiis velit tenetur distinctio, minima est, optio quas voluptatibus ipsam accusamus in. Est, libero odit."
        ]
    ];
    
    public static function all(){
        return collect(self::$data_artikel);
    }

    public static function find($slug){
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
