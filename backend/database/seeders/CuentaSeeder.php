<?php

namespace Database\Seeders;

use App\Models\Cuenta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuentaSeeder extends Seeder
{
    Private $arrayCuenta = array (
        array(
            'CBU' => '7679828111100097889798',
            'alias'=>'DIENTE.PUMA',
            'numeroCuenta'=>124578,
            'saldoDisponible'=>'24520',
            'persona_id'=>1,
            'banco_id'=>1,
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
            $cuenta->numeroCuenta = $c['numeroCuenta'];
            $cuenta->saldoDisponible = $c['saldoDisponible'];
            $cuenta->persona_id = $c['persona_id'];
            $cuenta->banco_id = $c['banco_id'];
            $cuenta->tipocuenta_id = $c['tipocuenta_id'];
            $cuenta->estado_id = $c['estado_id'];
            $cuenta->save();
        }
    }
}
