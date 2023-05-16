<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $users = User::all();
            $posts = Posts::all();

            return view('pages.home')->with(compact('users', 'posts'));
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
}
