<?php

namespace Database\Seeders;

use App\Models\Moneda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonedaSeeder extends Seeder
{
     Private $arrayMonedas = array (
        array('simbolo' => '$', 'descripcion' => 'pesos'),
        array('simbolo' => 's$s', 'descripcion' => 'dolares'),
    );

    public function run()
    {
        foreach ($this->arrayMonedas as $m)
        {
            $moneda = new Moneda();
            $moneda->simbolo = $m['simbolo'];
            $moneda->descripcion = $m['descripcion'];
            $moneda->save();
        }
    }
}
