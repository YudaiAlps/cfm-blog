<?php

namespace App\Http\Controllers;

// 引数でリクエストを使えるようにする
use Illuminate\Http\Request;
// ポストモデルと繋げる
use App\Post;
// ユーザーモデルと繋げる
use App\User;
// 認証機能を導入する
use Illuminate\Support\Facades\Auth;

// use App\Http\Requests\PostRequest;

// Controllerクラスを継承して、作成
class PostsController extends Controller
{
    //

    public function __construct(){
        // indexメソッドを除いて、authミドルウェアを呼び出し、ログイン必須状態にしている
        $this->middleware('auth')->except(['index']);
    }

    /**
     * view top page
     * 
     * @param string $item
     * 
     * @param string Request $keyword
     * 
     * @param 
     */
    public function index(Request $request){
        if (strlen($request->keyword) > 30 ){
            $items = Post::all();
        } else{
            // keywordを取得
            $keyword = $request->keyword;
            // queryメソッドでクエリパラメータを取得
            $query = Post::query();
            // データベースで検索
            if(!empty($keyword)){
                $query->where('title', 'LIKE', "%{$keyword}%")->orWhere('content', 'LIKE', "%{$keyword}%")->orWhere('category', 'LIKE', "%{$keyword}%");
            }else{
                $query->where('reply_message_id', 0);
            }
            // $queryを格納
            $items = $query->get();
        }
        
        
        return view('post.index', ['items' => $items]);
    }

    /**
     * show each post
     * 
     * @param string $item
     */
    public function show($id){
        // authでログイン情報を取得
        $user = Auth::user();
        // ポストモデルで検索し、一番上の値を取得
        $item = Post::where('id', $id)->first();

        $reply = Post::where('reply_message_id', $id)->get();

        $param = [
            'item' => $item,
            'user' => $user,
            'reply' => $reply,
        ];
        // auth用のユーザー情報と、showページ向けの記事情報を渡す
        return view('post.show', $param);
    }

    /**
     * add new posts
     * 
     * @param string $user
     */
    public function add(Request $request){
        // authでログイン情報を取得
        $user = Auth::user();
        // 投稿ページを表示
        return view('post.add', ['user'=>$user]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(PostRequest $request){
        // $fileの中に値があることを確認
        if($file = $request->image){
            // 現在時刻と$fileのファイル名を取得し、結合
            $fileName = time(). $file->getClientOriginalName();
            // 移動先のフォルダ名を記入
            $target_path = public_path('uploads/');
            // $fileを$target_pathの場所へ移動する
            $file->move($target_path, $fileName);
        }
        // ユーザー情報からidを取得
        $id = Auth::user()->id;
        // $postのインスタンスを作成
        $post = new Post;
        // Postテーブルに必要なカラムの情報を入力する
        $post->title = $request->title;
        $post->content = $request->content;
        // $fileNameが空なら、nullを入力する
        if(!empty($fileName)){
            $post->image = $fileName;
        }else{
            $post->image = null;
        }

        $post->category = $request->category;
        $post->user_id = $id;
        // 上記のデータをセーブする
        $post->save();

        return redirect('/');
    }

    public function destroy($id){
        $user = Auth::user();
        if(empty($user)){
            return redirect('/login');
        }else{
            // 削除する対象を指定する
            $post = Post::find($id);
            // 削除
            $post->delete();
            return redirect('/');
        }
        
    }

    public function reply(Request $request){
        $reply_user = Auth::user();
        $post = new Post;

        $post->title = 'reply';
        $post->content = $request->reply;
        $post->user_id = $reply_user->id;
        $post->reply_message_id = $request->reply_id;
        $post->save();

        return redirect('/');
    }

}