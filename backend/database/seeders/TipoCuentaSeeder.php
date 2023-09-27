<?php

namespace Database\Seeders;

use App\Models\TipoCuenta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoCuentaSeeder extends Seeder
{
        Private $arrayTipoCuenta = (array(
        array('acronimo'=>'CA', 'descripcion'=>'Caja de Ahorro', 'moneda_id'=> 1),
        array('acronimo'=>'CC $', 'descripcion'=>'Cuenta Corriente', 'moneda_id'=> 1),
        array('acronimo'=>'CC(Sueldo)', 'descripcion'=>'Cuenta Sueldo', 'moneda_id'=> 1),
        array('acronimo'=>'CC s$s', 'descripcion'=>'Cuenta Corriente', 'moneda_id'=> 2),
        ));

    public function run(): void
    {
        foreach ($this->arrayTipoCuenta as $c)
        {
            $tc = new TipoCuenta();
            $tc->acronimo = $c['acronimo'];
            $tc->descripcion = $c['descripcion'];
            $tc->moneda_id = $c['moneda_id'];
            $tc->save();
        }
    }
}
