<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only('email','password'))){
            return Auth::user()->createToken('mobile')->plainTextToken;
        }

        return response()->json(['message' => 'Credenciais inválidas.'], 404);
    }
}
