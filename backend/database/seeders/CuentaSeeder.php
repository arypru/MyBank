<?php

namespace Database\Seeders;

use App\Models\Cuenta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuentaSeeder extends Seeder
{
    Private $arrayCuenta = array (

        //Cuentas propias banco (usuario de maria)
        array(
            'CBU' => '7679828111100097889798',
            'alias'=>'DIENTE.PERRO',
            'descripcion'=>'Cuenta Sueldo',
            'numeroCuenta'=>789456,
            'saldoDisponible'=>'50000',
            'persona_id'=>1,
            'user_id'=>1,
            'banco_id'=>1,
            'tipocuenta_id'=>1,
            'estado_id'=>1,
            'isCuentaPropia'=>true),

        array(
            'CBU' => '8484828111100097887498',
            'alias'=>'DIENTE.PUMA',
            'descripcion'=>'Cuenta Ahorro',
            'numeroCuenta'=>124578,
            'saldoDisponible'=>'25000',
            'persona_id'=>1,
            'user_id'=>1,
            'banco_id'=>1,
            'tipocuenta_id'=>1,
            'estado_id'=>1,
            'isCuentaPropia'=>true),

        //cuentas propias de otros bancos
        array(
            'CBU' => '1212458111100097889999',
            'alias'=>'GUITARRA.PUMA',
            'descripcion'=>'Cuenta',
            'numeroCuenta'=>741369,
            'saldoDisponible'=>'80000',
            'persona_id'=>1,
            'user_id'=>1,
            'banco_id'=>2,
            'tipocuenta_id'=>1,
            'estado_id'=>1,
            'isCuentaPropia'=>true
        ),

        array(
            'CBU' => '1212458111100097889999',
            'alias'=>'GUITARRA.PUMA',
            'descripcion'=>'Cuenta',
            'numeroCuenta'=>753257,
            'saldoDisponible'=>'15000',
            'persona_id'=>1,
            'user_id'=>1,
            'banco_id'=>5,
            'tipocuenta_id'=>1,
            'estado_id'=>1,
            'isCuentaPropia'=>true),

        //cuentas a terceros
        array(
            'CBU' => '1212458111100097889999',
            'alias'=>'GUITARRA.PERA',
            'descripcion'=>'Cuenta',
            'numeroCuenta'=>152222,
            'saldoDisponible'=>'145000',
            'persona_id'=>3,
            'user_id'=>null,
            'banco_id'=>2,
            'tipocuenta_id'=>1,
            'estado_id'=>1),

        array(
            'CBU' => '1212458111100097889999',
            'alias'=>'MANZANA.PUMA',
            'descripcion'=>'Cuenta',
            'numeroCuenta'=>444555,
            'saldoDisponible'=>'78000',
            'persona_id'=>2,
            'user_id'=>null,
            'banco_id'=>3,
            'tipocuenta_id'=>1,
            'estado_id'=>1),
    );

    public function run(): void
    {
        foreach ($this->arrayCuenta as $c)
        {
            $cuenta = new Cuenta;
            $cuenta->CBU = $c['CBU'];
            $cuenta->alias = $c['alias'];
            $cuenta->descripcion = $c['descripcion'];
            $cuenta->numeroCuenta = $c['numeroCuenta'];
            $cuenta->saldoDisponible = $c['saldoDisponible'];
            $cuenta->persona_id = $c['persona_id'];
            $cuenta->banco_id = $c['banco_id'];
            $cuenta->tipocuenta_id = $c['tipocuenta_id'];
            $cuenta->estado_id = $c['estado_id'];
            $cuenta->user_id = $c['user_id'];
            $cuenta->save();
        }
    }
}
