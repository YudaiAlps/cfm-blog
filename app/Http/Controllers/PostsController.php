<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    //
    public function index(Request $request){
        $items = Post::all();
        return view('post.index', ['items' => $items]);
    }

    public function add(Request $request){
        return view('post.add');
    }

    public function create(Request $request){
        $post = new Post;
        $form = $request->all();
        unset($form['_token']);
        $post->fill($form)->save();

        return redirect('/post');
    }
}
