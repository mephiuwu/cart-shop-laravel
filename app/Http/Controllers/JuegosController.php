<?php

namespace App\Http\Controllers;

use App\Models\Juegos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class JuegosController extends Controller
{
    public function index()
    {
        $juegos = Juegos::all();
        return view('juegos.index', compact('juegos'));
    }

    public function getAll()
    {
        $data = Juegos::all();
        return DataTables::of($data)->make(true);
    }

    public function crear()
    {
        return view('juegos.crear');
    }

    public function processCreate(Request $request)
    {
        try {
            $validacion = $this->validar($request);

            if($validacion){
                return response()->json(['status' => 500, 'message' => $validacion->errors()->first()]);
            }

            if ($request->hasFile('imagen')) {
                $path = $request->imagen->store('public/images/games');
                $request->imagen = \Storage::url($path);
            }

            //pasa la validación
            $juego = Juegos::create([
                'nombre' => $request->nombre,
                'url' => $request->url,
                'descripcion' => $request->descripcion,
                'estado' => $request->estado,
                'imagen' => $request->imagen
            ]);
            return response()->json(['status' => 200, 'juego' => $juego, 'message' => 'Juego creado exitosamente.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 500, 'message' => 'Ha ocurrido un error interno', 'th' => $th->getMessage()]);
        }
    }

    public function editar($id)
    {
        $juego = Juegos::findOrFail($id);
        return view('juegos.editar', compact('juego'));
    }

    public function processEdit(Request $request)
    {
        try {
            $validacion = $this->validar($request);
            
            if($validacion){
                return response()->json(['status' => 500, 'message' => $validacion->errors()->first()]);
            }

            if ($request->hasFile('imagen')) {
                $path = $request->imagen->store('public/images/games');
                $request->imagen = \Storage::url($path);
            }

            //pasa la validación
            $juego = Juegos::find($request->id)->update([
                'nombre' => $request->nombre,
                'url' => $request->url,
                'descripcion' => $request->descripcion,
                'estado' => $request->estado,
                'imagen' => $request->imagen
            ]);
            return response()->json(['status' => 200, 'juego' => $juego, 'message' => 'Juego editado exitosamente.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 500, 'message' => 'Ha ocurrido un error interno', 'th' => $th->getMessage()]);
        }
    }

    public function eliminar(Request $request)
    {
        if (Juegos::destroy($request->id)) {
            return response()->json(['status' => 200, 'message' => 'Juego eliminado exitosamente.']);
        } else {
            return response()->json(['status' => 500, 'message' => 'Error el ejecutar la acción.']);
        }
    }
    
    public function validar($request)
    {
        if($request->radio_imagen == 1){
            $imagenValidar = ['required', 'string'];
        }else{
            $imagenValidar = ['required', 'file' ,'image'];
        }

        $validacion = Validator::make($request->all(), [
            'nombre' => ['required', 'string', 'max:100'],
            'url' => ['required', 'string'],
            'descripcion' => ['required', 'string'],
            'estado' => ['required', Rule::in([1, 0])],
            'imagen' => $imagenValidar,
        ], [], [
            'nombre' => 'Nombre',
            'url' => 'Url',
            'descripcion' => 'Descripción',
            'estado' => 'Estado',
        ]);

        if ($validacion->fails()) {
            return $validacion;
        }else{
            return 0;
        }
    }
}
