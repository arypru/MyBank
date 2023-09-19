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


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login()
    {

        $user = User::where('nombre_user', request()->nombre_user)->first();
        $user->tokens()->delete();

        $login = Auth::attempt(array('nombre_user' => request()->nombre_user, 'password' => sha1(request()->password)));

        $token_v1 = $user->createToken('token')->plainTextToken;
        $user->token = $token_v1;
        $user->save();

        if($login){
            return response()->json([
                'message' => "ok",
                'token' => $token_v1
            ]);
        }else{
            return response()->json([
                'message' => "error",
            ]);
        }

    }

    public function logout(){

        //$user = Auth::user();
        $user = User::findOrFail(auth()->user()->getAuthIdentifier());
        $user->tokens()->delete();
        //auth('sanctum')->user()->tokens()->delete();
        //
        return ('usuario deslogueado');
        /*
       if(Auth::user()){
           auth('sanctum')->user()->tokens()->delete();
           Auth::logout();
           return response()->json([
               "mensaje"=>"se deslogueo con exito"
           ]);
       } else{
           return response()->json([
               "mensaje"=>"no se edslogueo nada"
           ]);
       }*/
    }
}
