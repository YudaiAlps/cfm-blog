<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function index(Request $request){
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $item = User::where('id', $user_id)->first();
        $param = ['user' => $user, 'item' => $item];
        return view('blog.index', $param);
    }
}
