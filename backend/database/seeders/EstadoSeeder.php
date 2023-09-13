<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class EstadoSeeder extends Seeder
{
    Private $arrayEstado = array (
        array('simbolo' => 'H', 'descripcion' => 'Habilitado'),
        array('simbolo' => 'D', 'descripcion' => 'Deshabilitado'),
    );

    public function run()
    {
        foreach ($this->arrayEstado as $e)
        {
            $moneda = new Estado();
            $moneda->simbolo = $e['simbolo'];
            $moneda->descripcion = $e['descripcion'];
            $moneda->save();
        }
    }
}
