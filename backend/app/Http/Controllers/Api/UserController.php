<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\PersonaController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        return response()->json([
            'status' => true,
            'Users' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Crea un usuario / Referencia a una persona que ya existe
     */
    public function store(Request $request)
    {
        //busco a la persona

        $persona = DB::table('personas')->whereRaw('dni =' . $request->dni )->value('id');

        $user = User::create([
            'nombre_user' => $request->nombre_user,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
            'persona_id' => $persona,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        return response()->json([
            'status' => true,
            'user' => $user,
            'message' => 'User Created Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
