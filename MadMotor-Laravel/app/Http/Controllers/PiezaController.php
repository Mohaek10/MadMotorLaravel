<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pieza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PiezaController extends Controller
{
    public function index(Request $request)
    {
        $piezas = Pieza::search($request->search)->orderBy('id', 'asc')->paginate(3);
        return view('piezas.index')->with('piezas', $piezas);
    }

    public function show($id)
    {
        $pieza = Pieza::find($id);
        if ($pieza) {
            return view('piezas.show')->with('pieza', $pieza);
        } else {
            return redirect()->route('piezas.index');
        }
    }

    public function store()
    {
        $categorias = Categoria::where('isDeleted', 0)->orderBy('nombre', 'asc')->get();
        return view('piezas.create')->with('categorias', $categorias);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|unique:piezas|max:255|min:3|string',
            'precio' => 'required|numeric|min:0.01',
            'descripcion' => 'required|max:255|min:3|string',
            'cantidad' => 'required|integer|min:0',
            'categoria_id' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], $this->messages());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $imagen = $request->file('imagen');
        $extension = $imagen->getClientOriginalExtension();
        $nombre = time() . '.' . $extension;
        $nombrefich= $imagen->storeAs('piezas', $nombre, 'public');

        $pieza = new Pieza();
        $pieza->nombre = $request->nombre;
        $pieza->descripcion = $request->descripcion;
        $pieza->precio = $request->precio;
        $pieza->cantidad = $request->cantidad;
        $pieza->imagen = $nombrefich;
        $pieza->categoria_id = $request->categoria_id;
        $pieza->save();
        return redirect()->route('piezas.index');
    }

    /*UPDATE*/
    public function edit($id)
    {
        $pieza = Pieza::find($id);
        if ($pieza) {
            $categorias = Categoria::all();
            return view('piezas.edit')->with('pieza', $pieza)->with('categorias', $categorias);
        } else {
            return response()->json(['message' => 'Pieza not found.'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $pieza = Pieza::find($id);
        if ($pieza) {
            $validator = Validator::make($request->all(), [
                'nombre' => 'max:255|min:3|string',
                'descripcion'=>'max:255|min:3|string',
                'precio' => 'numeric',
                'cantidad' => 'integer',
                'categoria_id' => 'string',
                'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ], $this->messages());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $pieza->nombre = $request->nombre;
            $pieza->descripcion = $request->descripcion;
            $pieza->precio = $request->precio;
            $pieza->cantidad = $request->cantidad;
            $pieza->categoria_id = $request->categoria_id;
            if ($request->hasFile('imagen')) {

                $imagen = $request->file('imagen');
                $extension = $imagen->getClientOriginalExtension();
                $nombre = time() . '.' . $extension;
                $nombrefich= $imagen->storeAs('piezas', $nombre, 'public');
                $pieza->imagen = $nombrefich;
            }

            $pieza->save();
            return redirect()->route('piezas.index');
        } else {
            return redirect()->route('piezas.index');
        }
    }





    /*DELETE*/
    public function destroy($id)
    {
        $pieza = Pieza::find($id);
        if ($pieza) {

            $pieza->delete();
            return redirect()->route('piezas.index');
        } else {
            return redirect()->route('piezas.index');
        }
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.unique' => 'El nombre ya está en uso.',
            'nombre.max' => 'El nombre es demasiado largo.',
            'nombre.min' => 'El nombre es demasiado corto.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.max' => 'La descripción es demasiado larga.',
            'descripcion.min' => 'La descripción es demasiado corta.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto.',

            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio debe ser al menos 0.01.',
            'cantidad.required' => 'El cantidad es obligatorio.',
            'cantidad.integer' => 'El cantidad debe ser un número entero.',
            'cantidad.min' => 'El cantidad debe ser al menos 0.',
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.string' => 'La categoría debe ser una cadena de texto.',
            'imagen.imagen' => 'La imagenn debe ser una imagenn.',
            'imagen.mimes' => 'La imagenn debe ser un archivo de tipo: jpeg, png, jpg, gif, svg.',
            'imagen.max' => 'La imagenn no puede ser mayor de 2048 kilobytes.',
            'imagen.required' => 'La imagen es obligatoria.',
        ];
    }
    public function indexAdmin( Request $request )
    {
        $piezas = Pieza::search($request->search)->orderBy('id', 'asc')->paginate(3);
        return view('admin.piezas.index')->with('piezas', $piezas);
    }
    public function adminShow($id)
    {
        $pieza = Pieza::find($id);
        if ($pieza) {
            return view('admin.piezas.show')->with('pieza', $pieza);
        } else {
            return redirect()->route('piezas.adminIndex');
        }
    }
}

