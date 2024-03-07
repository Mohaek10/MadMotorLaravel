<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClientesController extends Controller
{

    public function index(Request $request)
    {
        try {
            $clientes = Clientes::search($request->search)->orderBy('id', 'asc')->paginate(10);
            Log::info('Se han obtenido los clientes correctamente');
            return view('admin.cliente.index')->with('clientes', $clientes);
        } catch (\Exception $e) {
            Log::error('Error al obtener los clientes: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * @throws AuthorizationException
     */
    public function show($id)
    {
        try {
            $cliente = Clientes::find($id);
            try {
            $this->authorize('view', $cliente);
                if ($cliente == null) {
                    Log::error('No se ha encontrado el cliente con el id: ' . $id);
                    return redirect()->back();
                }
                Log::info('Se ha obtenido el cliente correctamente');
                return view('cliente.show')->with('cliente', $cliente);
            } catch (AuthorizationException $e) {
                Log::error('Error al obtener el cliente: ' . $e->getMessage());
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Log::error('Error al obtener el cliente: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $cliente = Clientes::find($id);
            try {
            $this->authorize('update', $cliente);
                if ($cliente == null || $cliente->isDeleted) {
                    Log::error('No se ha encontrado el cliente con el id: ' . $id);
                    return redirect()->back();
                }
                Log::info('Se ha obtenido el cliente para actualizar correctamente');
                return view('cliente.edit')->with('cliente', $cliente);
            } catch (AuthorizationException $e) {
                Log::error('Error al obtener el cliente para actualizar : ' . $e->getMessage());
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Log::error('Error al obtener el cliente para actualizar : ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, string $id)
    {
        Log::info('Se ha pedido actualizar el cliente con id: ' . $id);
        $request->validate([
            'nombre' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:clientes,email,' . $id,
            'apellido' => 'required|string|max:255|min:3',
        ]);
        Log::info('Se ha validado correctamente el cliente');
        try {
            $cliente = Clientes::find($id);
            if ($cliente == null || $cliente->isDeleted) {
                Log::error('No se ha encontrado el cliente con el id: ' . $id);
                return redirect()->back();
            }
            Log::info('Se ha encontrado el cliente correctamente');
            $cliente->update($request->all());
            Log::info('Se va a actualizar el cliente con los siguientes datos: ' . json_encode($cliente));
            $cliente->save();
            Log::info('Se ha actualizado el cliente correctamente');
            return redirect()->route('cliente.perfil', ['id' => $id]);
        } catch (\Exception $e) {
            Log::error('Error al actualizar el cliente: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $cliente = Clientes::find($id);
            if ($cliente == null) {
                Log::error('No se ha encontrado el cliente con el id: ' . $id);
                return redirect()->back();
            }
            Log::info('Se ha encontrado el cliente correctamente');
            $cliente->delete();
            Log::info('Se ha eliminado el cliente correctamente');
            return redirect()->route('hero');
        } catch (\Exception $e) {
            Log::error('Error al eliminar el cliente: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function removeSoft(string $id)
    {
        try {
            $cliente = Clientes::find($id);
            if ($cliente == null) {
                Log::error('No se ha encontrado el cliente con el id: ' . $id);
                return response()->json(['error' => 'No se ha encontrado el cliente'], 404);
            }
            Log::info('Se ha encontrado el cliente correctamente');
            $cliente->isDeleted = true;
            $cliente->save();
            Log::info('Se ha eliminado el cliente correctamente');
            Auth::logout();
            return redirect()->route('/');
        } catch (\Exception $e) {
            Log::error('Error al eliminar el cliente: ' . $e->getMessage());
            return redirect()->back();
        }
    }
    public function adminShow($id)
    {
        try {
                $cliente = Clientes::find($id);
                if ($cliente == null) {
                    Log::error('No se ha encontrado el cliente con el id: ' . $id);
                    return redirect()->back();
                }
                Log::info('Se ha obtenido el cliente correctamente');
                return view('admin.cliente.adminshow')->with('cliente', $cliente);
            } catch (\Exception $e) {
                Log::error('Error al obtener el cliente: ' . $e->getMessage());
                return redirect()->back();
            }
    }
    public function adminEdit($id)
    {
        try {
                $cliente = Clientes::find($id);
                if ($cliente == null) {
                    Log::error('No se ha encontrado el cliente con el id: ' . $id);
                    return redirect()->back();
                }
                Log::info('Se ha obtenido el cliente para actualizar correctamente');
                return view('cliente.edit')->with('cliente', $cliente);
        } catch (\Exception $e) {
            Log::error('Error al obtener el cliente para actualizar : ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
