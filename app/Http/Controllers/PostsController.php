<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }
    public function index(Request $request){
        $items = Post::all();
        return view('post.index', ['items' => $items]);
    }

    public function show(User $user){
        $id = User::find($user->id);
        // $item = Post::where('user_id', $user->id)->first();
        $item = Post::all();
        return view('post.show', ['item' => $item, 'user' => $id]);
    }

    public function add(Request $request){
        $user = Auth::user();
        return view('post.add', ['user'=>$user]);
    }

    public function create(Request $request){
        if($file = $request->image){
            $fileName = time(). $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
        }
        $id = Auth::user()->id;
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $fileName;
        $post->category = $request->category;
        $post->user_id = $id;

        $post->save();

        return redirect('/post');
    }
}
