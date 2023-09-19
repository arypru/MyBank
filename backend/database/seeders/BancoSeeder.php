<?php

namespace Database\Seeders;

use App\Models\Banco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BancoSeeder extends Seeder
{
    Private $arrayBanco = array (
        array('nombre' => 'MyBank', 'virtual'=>false, 'logoUrl'=>'banCo.png'),
        array('nombre' => 'BanCo', 'virtual'=>false, 'logoUrl'=>'banCo.png'),
        array('nombre' => 'Santander Rio', 'virtual'=>false, 'logoUrl'=>'santander.png'),
        array('nombre' => 'Patagonia', 'virtual'=>false, 'logoUrl'=>'patagonia.png'),
        array('nombre' => 'Galicia', 'virtual'=>false, 'logoUrl'=>'galicia.png'),
        array('nombre' => 'HSBC', 'virtual'=>false, 'logoUrl'=>'hsbc.png'),
        array('nombre' => 'Mercado Pago', 'virtual'=>true, 'logoUrl'=>'mercado-pago.png'),
        array('nombre' => 'Ualá', 'virtual'=>true, 'logoUrl'=>'patagonia.png'),
        array('nombre' => 'Brubank', 'virtual'=>true, 'logoUrl'=>'brubank.png'),
        );

    public function run(): void
    {
        foreach ($this->arrayBanco as $b)
        {
            $banco = new Banco();
            $banco->nombre = $b['nombre'];
            $banco->virtual = $b['virtual'];
            $banco->logoUrl = $b['logoUrl'];
            $banco->save();
        }
    }
}
