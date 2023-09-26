<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\accesos;
use Illuminate\Http\Request;

class AccesosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($idUser)
    {
        $accesoUsuarios = accesos::buscarDevicesUser($idUser);
        return response()->json($accesoUsuarios,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(accesos $accesos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, accesos $accesos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(accesos $accesos)
    {
        //
    }

    public function accesoActivo($idUser){
        $activo = accesos::buscarDevicesUser($idUser)->first();
        return response()->json($activo,200);
    }
}
