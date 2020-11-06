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
        return view('blog.index', ['item' => $user]);
    }
}
