<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use Illuminate\Http\Request;
use App\Mail\CorreoDePrueba;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function enviarCorreo()
    {
        $correoDestino = "pruyasaraceli@gmail.com";

        Mail::to($correoDestino)->send(new CorreoDePrueba());

        return "Correo electrónico enviado con éxito";
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
    public function show(Mail $mail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
