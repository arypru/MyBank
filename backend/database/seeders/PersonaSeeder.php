<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PersonaSeeder extends Seeder
{

    Private $arrayPersona = array(
        array(
            'nombre' => 'Maria Itati',
            'apellido'=>'Perez',
            'dni'=>20789456,
            'telefono'=>'+37947845152',
            'cuil'=>27207894564,
            'direccion'=>'Pedro Araoz 1501',
            'sexo'=>'Femenino',
            'edad'=>'24'
        )
    );

    public function run(): void
    {

        $fecha_nacimiento = Carbon::createFromFormat('d/m/Y','15/04/1999');

        foreach ($this->arrayPersona as $p)
        {
            $persona = new Persona();
            $persona->nombre = $p['nombre'];
            $persona->apellido = $p['apellido'];
            $persona->dni = $p['dni'];
            $persona->telefono = $p['telefono'];
            $persona->cuil = $p['cuil'];
            $persona->direccion = $p['direccion'];
            $persona->fecha_nacimiento = $fecha_nacimiento;
            $persona->sexo = $p['sexo'];
            $persona->edad = $p['edad'];
            $persona->save();
        }
    }
}
