<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function login()
    {

        $user = User::where('nombre_user', request()->nombre_user)->first();

        $login = Auth::attempt(array('nombre_user' => request()->nombre_user, 'password' => sha1(request()->password)));

        if($login){
            return response()->json([
                'message' => "usuario logueado con exito perro",
                'token' => $user->createToken('token')->plainTextToken
            ]);
        }else{
            return response()->json([
                'message' => "usuario no logueado perroo",
            ]);
        }

    }

    public function logout(){

        $user = User::findOrFail(auth()->user());
        $user->tokens()->delete();

        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}
