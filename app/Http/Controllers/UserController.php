<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        $logged = Auth::check();
        return view('user', ['users' => $users, 'logged' => $logged]);
    }
    
    public function deactivate($id)
    {
        if (Auth::check())
        {
            if (Auth::user()->id == $id)
            {
                return redirect()->route('user')->with('message', 'can\'t deactivate yourself!');
            }
            if (User::find($id)->active == 0)
            {
                return redirect()->route('user')->with('message', 'user already deactivated!');
            }
            User::find($id)->update(['active' => 0]);
            return redirect()->route('user')->with('message', 'user successfully deactivated!');
        }
        return redirect()->route('user')->with('message', 'not logged in!');
    }
    
    public function activate($id)
    {
        if (Auth::check())
        {
            if (Auth::user()->id == $id)
            {
                return redirect()->route('user')->with('message', 'can\'t activate yourself!');
            }
            if (User::find($id)->active == 1)
            {
                return redirect()->route('user')->with('message', 'user already activated!');
            }
            User::find($id)->update(['active' => 1]);
            return redirect()->route('user')->with('message', 'user successfully activated!');
        }
        return redirect()->route('user')->with('message', 'not logged in!');
    }
}

