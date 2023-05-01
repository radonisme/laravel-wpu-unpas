<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use PharIo\Manifest\Author;

class PostController extends Controller
{
    public function index(Request $request){

        // dd(request('cari')); -- cara menangkap input
// dd($request);

        return view('posts',[
            "tittle" => "All Posts",
            "active" => "Posts",
            // "post" => Post::all()
            "posts" => Post::latest()->filter(request(['cari', 'category', 'author']))->paginate(7)->withQueryString()
        ]); 
    }

    public function show(Post $post){

        return view('post',[
            "tittle" => "Single Post",
            "active" => "Post",
            "post" => $post
        ]);

    }
}
