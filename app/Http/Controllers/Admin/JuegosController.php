<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consoles;
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
        return view('admin.juegos.index', compact('juegos'));
    }

    public function getAll()
    {
        $data = Juegos::all();
        return DataTables::of($data)->make(true);
    }

    public function crear()
    {
        $consoles = Consoles::all();
        return view('admin.juegos.crear', compact('consoles'));
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
                'descripcion' => $request->descripcion,
                'imagen' => $request->imagen,
                'quantity' => intval($request->quantity),
                'price' => $request->price,
                'estado' => $request->estado,
                'console_id' => $request->console,
            ]);

            return response()->json(['status' => 200, 'juego' => $juego, 'message' => 'Juego creado exitosamente.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 500, 'message' => 'Ha ocurrido un error interno', 'th' => $th->getMessage()]);
        }
    }

    public function editar($id)
    {
        $juego = Juegos::with('consola')->findOrFail($id);
        $consoles = Consoles::all();
        return view('admin.juegos.editar', compact('juego', 'consoles'));
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
                'descripcion' => $request->descripcion,
                'imagen' => $request->imagen,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'estado' => $request->estado,
                'console_id' => $request->console,
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
            'descripcion' => ['required', 'string'],
            'imagen' => $imagenValidar,
            'quantity' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'estado' => ['required', Rule::in([1, 0])],
            'console' => ['required'],
        ], [], [
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'quantity' => 'Cantidad',
            'price' => 'Precio',
            'estado' => 'Estado',
            'console' => 'Consola',
        ]);

        if ($validacion->fails()) {
            return $validacion;
        }else{
            return 0;
        }
    }
}
