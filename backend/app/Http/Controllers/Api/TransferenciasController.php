<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transferencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferenciasController extends Controller
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
    public function show(Transferencias $transferencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transferencias $transferencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transferencias $transferencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transferencias $transferencias)
    {
        //
    }


    public function verCuentasMyBank($userId){

        $cuentas = DB::table('cuentas')
                    ->whereRaw('persona_id =' . $userId )
                    ->whereRaw('banco_id =' . 1)
                    ->get();

        return response()->json([$cuentas], 200);
    }

    public function verCuentasPropias($userId){

        $cuentasPropias = DB::table('cuentas')
            ->whereRaw('persona_id =' . $userId )
            ->whereRaw('isCuentaPropia =' . 1)
            ->get();

        return response()->json([$cuentasPropias], 200);
    }
}
