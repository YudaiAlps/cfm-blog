<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }
    public function index(Request $request){
        $keyword = $request->keyword;

        $query = Post::query();

        if(!empty($keyword)){
            $query->where('title', 'LIKE', "%{$keyword}%")->orWhere('content', 'LIKE', "%{$keyword}%")->orWhere('category', 'LIKE', "%{$keyword}%");
        }

        $items = $query->get();
        
        
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

    /**
     * @param Request $request
     * @return Response
     */
    public function create(PostRequest $request){
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

        return redirect('/');
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/');
    }
}
