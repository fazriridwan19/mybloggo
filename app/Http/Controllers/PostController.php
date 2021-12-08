<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{

    function index(){
        /*
            Method latest() digunakan untuk mengambil data dari dari database 
            melalui model Post dari yang paling baru di input.

            Method filter() digunakan untuk melakukan filterisasi data, jadi data yang akan ditampilkan
            berdasarkan filter yang ditentukan user. Parameter untuk method filter() adalah method request() yang akan mengembalikan
            value pada url sesuai dengan namanya.

            Method paginate() digunakan untuk memberikan pagination. 
        */
        return view('posts', [
            "judul"=>"Blog",
            "posts"=>Post::latest()->filter(request(['search','category']))->paginate(7)->withQueryString()
        ]);        
    }

    function show(Post $post){
        return view('post', [
            "judul"=>"artikel",
            "post"=>$post
        ]); 
    }
}
