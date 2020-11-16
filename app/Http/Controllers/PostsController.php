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
        $keyword = $request->keyword;
        $title = $request->title_key;

        
        if(empty($title) && empty($keyword)){
            $items = Post::all();
        } else {
            $query = Post::query();
            if(!empty('title')){
                $query->where('title', 'LIKE', "%{$title}%");
            }
            if(!empty('keyword')){
                $query->where('content', 'LIKE', "%{$keyword}%");
            }

            $items = $query->get();
        }
        
        
        return view('post.index', ['items' => $items]);
    }

    public function show($id){
        $item = Post::where('id', $id)->first();
        return view('post.show', ['item' => $item]);
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
        if(!empty($fileName)){
            $post->image = $fileName;
        }else{
            $post->image = null;
        }
        
        $post->category = $request->category;
        $post->user_id = $id;

        $post->save();

        return redirect('/post');
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();

        return redirect('/post');
    }
}
