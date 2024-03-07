<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class CategoriaController extends Controller
{

    public function index(Request $request)
    {
        $categorias = Categoria::search($request->search)->orderBy('nombre', 'asc')->paginate(5);

        return view('categorias.index', compact('categorias'));
    }

    public function show($id)
    {
        $categoria = Categoria::find($id);

        return view('categorias.show')->with('categoria', $categoria);
    }

    public function create()
    {
        return view('categorias.create')->with('categorias');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'min:5|max:120|required',
        ]);
        try {
            $categoria = new Categoria($request->all());
            $categoria->save();


            return redirect()->route('categorias.index');
        } catch(Exception $e) {

            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);
        $categorias = Categoria::all();
        return view('categorias.edit')
            ->with('categoria', $categoria);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' =>'min:5|max:120|required',
        ]);
        try {
            $categoria = Categoria::find($id);
            $categoria->update($request->all());
            $categoria->save();


            return redirect()->route('categorias.index');
        } catch(Exception $e) {

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $categoria = Categoria::find($id);

            $categoria->isDeleted = true;

            $categoria->save();


            return redirect()->route('categorias.index');
        } catch (Exception $e) {

            return redirect()->back();

        }
    }

}
