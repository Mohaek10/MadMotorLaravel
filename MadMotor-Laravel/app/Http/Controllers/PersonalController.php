<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;

class PersonalController extends Controller
{
    public function index(Request $request) {
        try {
            $personals = Personal::search($request->search)->orderBy('id', 'asc')->paginate(10);
            return view('personal.index')->with('personals', $personals);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $personal = Personal::find($id);
        return view('personal.show')->with('personal', $personal);
    }

    public function create()
    {
        return view('personal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'min:2|max:20|required',
            'apellidos' => 'min:5|max:100|required',
            'fecha_nacimiento' => 'required',
            'dni' => 'min:9|max:9|required',
            'direccion' => 'min:5|max:200|required',
            'telefono' => 'min:9|max:12|required',
            'sueldo' => 'min:3|max:10|required',
            'iban' => 'min:20|max:20|required',
            'email' => 'required',
            'password' => 'min:8|required',
            'role' => 'required',
        ]);
        try {
            $personal = new Personal($request->all());
            $personal->password = bcrypt($request->password);
            $personal->save();
            return redirect()->route('personal.search');
        } catch (Exception $e) {
            flash('Error al crear el personal')->error()->important();
            return redirect()->back();
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $personal = Personal::find($id);
            if ($personal == null || $personal->isDeleted) {
                return response()->json(['error' => 'No se ha encontrado el cliente'], 404);
            }
            $personal->update($request->all());
            return view('personal.edit')->with('personal', $personal);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'direccion' => 'min:5|max:200',
            'telefono' => 'min:9|max:12',
            'sueldo' => 'min:3|max:10',
            'iban' => 'min:20|max:20',
            'email' => '',
        ]);
        try {
            $personal = Personal::find($id);
            $personal->update($request->all());
            $personal->save();
            return redirect()->route('personal.search');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $personal = Personal::find($id);
            $personal->delete();
            return redirect()->route('personal.search');
        } catch (Exception $e) {
            return redirect()->back();
        }
    }
}
