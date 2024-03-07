<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pieza;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehiculoController extends Controller
{
    public function hero()
    {
        $vehiculos = Vehiculo::all()->take(8); //take(6) para que solo muestre 6 vehiculos (para que no se vea tan cargado el home
        $piezas = Pieza::all()->take(8); //take(6) para que solo muestre 6 piezas (para que no se vea tan cargado el home
        return view('hero')->with('vehiculos', $vehiculos)->with('piezas', $piezas);
    }

    public function index(Request $request)
    {
        $query = Vehiculo::query();

        if ($request->has('marca')) {
            $query->marca($request->marca);
        }

        if ($request->has('modelo')) {
            $query->modelo($request->modelo);
        }

        if ($request->has('yearMin')) {
            $query->yearMin($request->yearMin);
        }

        if ($request->has('yearMax')) {
            $query->yearMax($request->yearMax);
        }

        if ($request->has('kmMin')) {
            $query->kmMin($request->kmMin);
        }

        if ($request->has('kmMax')) {
            $query->kmMax($request->kmMax);
        }

        if ($request->has('precioMin')) {
            $query->precioMin($request->precioMin);
        }

        if ($request->has('precioMax')) {
            $query->precioMax($request->precioMax);
        }

        if ($request->has('orden')) {
            $orden = $request->orden;
            switch ($orden) {
                case 'precioAsc':
                    $query->orderByPrecioAsc();
                    break;
                case 'yearAcs':
                    $query->orderByYearAcs();
                    break;
                case 'yearDesc':
                    $query->orderByYearDesc();
                    break;
                case 'kmAcs':
                    $query->orderByKmAcs();
                    break;
                case 'kmDesc':
                    $query->orderByKmDesc();
                    break;
                default:
                    $query->orderByPrecioDesc();
                    break;
            }
        }
        //isDeleted and paginate 10
        $query->isDeleted();
        //links paginate
        $vehiculos = $query->paginate(10)->appends($request->all());

        return view('vehiculos.index')->with('vehiculos', $vehiculos);
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            return redirect()->route('vehiculos.index');
        }
        $vehiculo = Vehiculo::find($id);
        return view('vehiculos.show')->with('vehiculo', $vehiculo);
    }

    function create()
    {
        $categorias = Categoria::all();
        return view('vehiculos.create')->with('categorias', $categorias);
    }

    public function rules()
    {
        return [
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'km' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ];

    }

    public function store(Request $request)
    {
        $messages = [
            'marca.required' => 'El campo marca es obligatorio.',
            'modelo.required' => 'El campo modelo es obligatorio.',
            'year.required' => 'El campo año es obligatorio.',
            'year.integer' => 'El campo año debe ser un número entero.',
            'year.min' => 'El campo año no puede ser menor a 1900.',
            'year.max' => 'El campo año no puede ser mayor al año actual.',
            'km.required' => 'El campo kilómetros es obligatorio.',
            'km.integer' => 'El campo kilómetros debe ser un número entero.',
            'km.min' => 'El campo kilómetros no puede ser negativo.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El campo precio debe ser un número.',
            'precio.min' => 'El campo precio no puede ser negativo.',
            'cantidad.required' => 'El campo cantidad es obligatorio.',
            'cantidad.integer' => 'El campo cantidad debe ser un número entero.',
            'cantidad.min' => 'El campo cantidad no puede ser negativo.',
        ];
        $request->validate($this->rules(), $messages);

        $request->validate(
            ['imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
            ['imagen.required' => 'La imagen es obligatoria.',
                'imagen.image' => 'El archivo debe ser una imagen.',
                'imagen.mimes' => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg, gif, svg.',
                'imagen.max' => 'La imagen no debe pesar más de 2048 kilobytes.']
        );
        try {
            $imagen = $request->file('imagen');
            $extension = $imagen->getClientOriginalExtension();
            $nombre = time() . '.' . $extension;
            $nombreFich = $imagen->storeAs('vehiculos', $nombre, 'public');
            $vehiculo = new Vehiculo();
            $vehiculo->marca = $request->marca;
            $vehiculo->modelo = $request->modelo;
            $vehiculo->year = $request->year;
            $vehiculo->km = $request->km;
            $vehiculo->precio = $request->precio;
            $vehiculo->cantidad = $request->cantidad;
            $vehiculo->categoria_id = $request->categoria_id;
            $vehiculo->imagen = $nombreFich;
            $vehiculo->save();
        } catch (\Exception $e) {
            return redirect()->route('vehiculos.create')->with('error', 'Error al crear el vehículo.');
        }
        return redirect()->route('vehiculos.index');
    }

    public function edit($id)
    {
        if (!is_numeric($id)) {
            return redirect()->route('vehiculos.index');
        }
        $vehiculo = Vehiculo::find($id);
        $categorias = Categoria::all();
        return view('vehiculos.edit')->with('vehiculo', $vehiculo)->with('categorias', $categorias);
    }

    public function update(Request $request, $id)
    {
        if (!is_numeric($id)) {
            return redirect()->route('vehiculos.index');
        }
        $messages = [
            'marca.required' => 'El campo marca es obligatorio.',
            'modelo.required' => 'El campo modelo es obligatorio.',
            'year.required' => 'El campo año es obligatorio.',
            'year.integer' => 'El campo año debe ser un número entero.',
            'year.min' => 'El campo año no puede ser menor a 1900.',
            'year.max' => 'El campo año no puede ser mayor al año actual.',
            'km.required' => 'El campo kilómetros es obligatorio.',
            'km.integer' => 'El campo kilómetros debe ser un número entero.',
            'km.min' => 'El campo kilómetros no puede ser negativo.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.numeric' => 'El campo precio debe ser un número.',
            'precio.min' => 'El campo precio no puede ser negativo.',
            'cantidad.required' => 'El campo cantidad es obligatorio.',
            'cantidad.integer' => 'El campo cantidad debe ser un número entero.',
            'cantidad.min' => 'El campo cantidad no puede ser negativo.',
        ];
        $request->validate($this->rules(), $messages);
        $vehiculo = Vehiculo::find($id);
        $vehiculo->marca = $request->marca;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->year = $request->year;
        $vehiculo->km = $request->km;
        $vehiculo->precio = $request->precio;
        $vehiculo->cantidad = $request->cantidad;
        $vehiculo->categoria_id = $request->categoria_id;
        if ($request->hasFile('imagen')) {
            $request->validate(
                ['imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
                ['imagen.required' => 'La imagen es obligatoria.',
                    'imagen.image' => 'El archivo debe ser una imagen.',
                    'imagen.mimes' => 'La imagen debe ser un archivo de tipo: jpeg, png, jpg, gif, svg.',
                    'imagen.max' => ' La imagen no debe pesar más de 2048 kilobytes.']
            );
            $imagen = $request->file('imagen');
            $extension = $imagen->getClientOriginalExtension();
            $nombre = time() . '.' . $extension;
            $nombreFich = $imagen->storeAs('vehiculos', $nombre, 'public');
            $vehiculo->imagen = $nombreFich;
        }
        $vehiculo->save();
        return redirect()->route('vehiculos.index');
    }

    public function adminPanelVehiculos(Request $request)
    {

        $vehiculos = Vehiculo::marca(request('marca'))->paginate(10);

        return view('vehiculos.admin')->with('vehiculos', $vehiculos);

    }

    public function destroy($id)
    {
        if (!is_numeric($id)) {
            return redirect()->route('vehiculos.index');
        }
        $vehiculo = Vehiculo::find($id);
        try {
            if ($vehiculo->imagen != Vehiculo::$IMAGEN_DEFAULT && Storage::exists($vehiculo->imagen)) {
                Storage::delete($vehiculo->imagen);
            }
            $vehiculo->isDeleted = true;
            $vehiculo->save();
            return redirect()->route('vehiculos.adminIndex')->with('success', 'Vehículo eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('vehiculos.adminIndex')->with('error', 'Error al eliminar el vehículo.');
        }
    }


}
