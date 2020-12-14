<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function index(Request $request){
        // ログイン情報を取得
        $user = Auth::user();

        if(empty($user)){
            return redirect('/login');
        }else{
            // user_idを取得
            $user_id = Auth::user()->id;
            // idで検索し、最初のものを取得
            $item = User::where('id', $user_id)->first();
            // 変数をまとめている
            $param = ['user' => $user, 'item' => $item];
            return view('blog.index', $param);
        }
      
    }
}
