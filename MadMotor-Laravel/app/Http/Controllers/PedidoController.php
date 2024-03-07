<?php

namespace App\Http\Controllers;

use App\Models\LineaDePedido;
use App\Models\Pedido;
use App\Models\Pieza;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class PedidoController extends Controller
{
    public function checkout(Request $request)
    {
        //Reglas de validación
        $rules = [
            'datosTarjeta' => 'required|string',
            'direccion' => 'required|string',
        ];
        $messages = [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser un texto.',
        ];
        $this->validate($request, $rules, $messages);

        // Obtener el carrito de la sesión
        $cart = session()->get('cart');

        // Crear un nuevo pedido
        $pedido = new Pedido();
        $pedido->idCliente = auth()->user()->id;
        $pedido->datosTarjeta = $request->input('datosTarjeta');
        $pedido->direccion = $request->input('direccion');
        $pedido->total = array_sum(array_column($cart, 'line_total'));
        $pedido->estado = 'confirmado';
        $pedido->save();

        // Crear una línea de pedido para cada artículo en el carrito
        foreach ($cart as $item) {
            $lineaDePedido = new LineaDePedido();
            $lineaDePedido->idPedido = $pedido->id;
            if ($item['type'] == 'vehiculo') {
                $lineaDePedido->idVehiculo = $item['product']->id;
                $lineaDePedido->precioVehiculo = $item['price'];
                $lineaDePedido->cantidadVehi = $item['quantity'];
            } else {
                $lineaDePedido->idPieza = $item['product']->id;
                $lineaDePedido->precioPieza = $item['price'];
                $lineaDePedido->cantidadPieza = $item['quantity'];
            }
            $lineaDePedido->totalLinea = $item['line_total'];
            $lineaDePedido->save();
        }

        //Una vez que todos los productos estén en la línea de pedido, restar cantidad de stock
        foreach ($cart as $item) {
            if ($item['type'] == 'vehiculo') {
                $vehiculo = Vehiculo::find($item['product']->id);
                $vehiculo->cantidad -= $item['quantity'];
                $vehiculo->save();
            } else {
                $pieza = Pieza::find($item['product']->id);
                $pieza->cantidad -= $item['quantity'];
                $pieza->save();
            }
        }

        // Vaciar el carrito
        session()->forget('cart');

        // Redirigir al usuario a la página de confirmación
        return redirect()->route('pedido.confirmacion', ['id' => $pedido->id]);
    }

    public function confirmacion($id)
    {
        if (!uuid_is_valid($id)) {
            return redirect()->route('vehiculos.hero');
        }

        $pedido = Pedido::find($id);
        $this->authorize('view', $pedido);
        return view('pedido.confirmacion')->with('pedido', $pedido);
    }

    public function historial()
    {
        $pedidos = Pedido::where('idCliente', auth()->user()->id)->get();
        return view('pedido.historial')->with('pedidos', $pedidos);
    }
    public function downloadHistorial(){
        $pdf = App::make('dompdf.wrapper');
        $pedidos = Pedido::where('idCliente', auth()->user()->id)->get();
        $pdf = \PDF::loadView('pedido.pdfhistorial', compact('pedidos'));
        return $pdf->download('historial.pdf');
    }

    //generar pdf
    public function download($id){
        //comprobacion del id si es un uuid
        if (!uuid_is_valid($id)) {
            return redirect()->route('vehiculos.hero');
        }
        $pdf = App::make('dompdf.wrapper');

        $data =[
          'title' => 'Pedido confirmado',
        ];
        $pedido = Pedido::find($id);
        $pdf = \PDF::loadView('pedido.pdf', compact('pedido'));
        return $pdf->download('pedido.pdf');
    }



}
