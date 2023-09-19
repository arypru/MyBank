<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    Private $arrayPersona = array (
        array(
            'nombre' => 'Maria Itati',
            'apellido'=>'Perez',
            'dni'=>20789456,
            'celular'=>'+37947845152',
            'cuil'=>27207894564,
            'direccion'=>'Pedro Araoz 1501'),
    );

    public function run(): void
    {
        foreach ($this->arrayPersona as $p)
        {
            $persona = new Persona();
            $persona->nombre = $p['nombre'];
            $persona->apellido = $p['apellido'];
            $persona->dni = $p['dni'];
            $persona->celular = $p['celular'];
            $persona->cuil = $p['cuil'];
            $persona->direccion = $p['direccion'];
            $persona->save();
        }
    }
}
