<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    /**
     * Muestra todas las personas.
     */
    public function index()
    {
        $personas = DB::table('personas')->get();

        return response()->json([
            'status' => true,
            'persona' => $personas
        ], 200);
    }

    /**
     * Inserta una nueva persona
     */
    public function store(Request $request)
    {
        $persona = DB::table('personas')->insertGetId([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'dni' => $request->dni,
            'celular' => $request->celular,
            'cuil'=>$request->cuil,
            'direccion' => $request->direccion,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return response()->json([
            'persona_id' => $persona,
            'JSON' => $this->show($persona),
            'msg' => 'Persona creada con exito'
        ], 200);
    }

    /**
     * Muestra los datos de una persona en especifico segun ID.
     */

    public function show(string $id)
    {
        $unaPersona = DB::table('personas')->whereRaw('id =' . $id )->get();
        return response()->json($unaPersona,200);
    }


    /**
     * Modifica los datos de direccion
     */
    public function update(Request $request, string $id)
    {
        if ($request->celular == ""){

            $personaDireccion = DB::table('personas')
                ->where('id', $id)
                ->update(['direccion' => $request->direccion]
                );

            return response()->json([
                'persona_id' => $personaDireccion,
                'msg' => 'datos actualizados con éxito'
            ], 200);
        }

        if ($request->direccion == ""){

            $personaCelular = DB::table('personas')
                ->where('id', $id)
                ->update(['celular' => $request->celular]
                );

            return response()->json([
                'persona_id' => $personaCelular,
                'msg' => 'datos actualizados con éxito'
            ], 200);

        } else {

            $personaUpdate = DB::table('personas')
                ->where('id', $id)
                ->update([
                        'celular' => $request->celular,
                        'direccion' => $request->direccion]
                );

            return response()->json([
                'persona_id' => $personaUpdate,
                'msg' => 'datos actualizados con éxito'
            ], 200);

        }


    }

    /**
     * Da de baja logica a la persona
     */
    public function destroy(string $id)
    {
        $personaDelete = DB::table('persona')->whereRaw('id =' . $id )->update(['baja' => true]);

        return response()->json([
            'persona_id' => $personaDelete,
            'msg' => 'Persona dado de baja'
        ], 200);
    }

    /**
     * Busca el telefono de una persona por su DNI y devuelve su telefono
     */
    public function verificar_dni(string $dni){
        $persona = DB::table('personas')->whereRaw('dni =' . $dni )->get('celular');
        return response()->json($persona, 200);
    }

}
