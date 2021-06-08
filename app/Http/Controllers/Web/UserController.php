<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:128',
            'password' => 'required',
        ]);

        $user = User::create([
            'uuid' => (string) \Illuminate\Support\Str::uuid(),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('home');
    }

    public function create(){
        return view('users.create');
    }
}
