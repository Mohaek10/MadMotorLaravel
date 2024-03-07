<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarritoController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $totalDelCarrito = array_sum(array_column($cart, 'line_total'));
        $totalItems = array_sum(array_column($cart, 'quantity'));
        return view('carrito.index')->with([
            'cart' => $cart,
            'totalDelCarrito' => $totalDelCarrito,
            'totalItems' => $totalItems
        ]);
    }

    public function addToCart($id, $type)
    {
        //si no hay sesion iniciada auth que mande al login
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        // Inicializar el carrito si no existe
        if (!session()->has('cart')) {
            session()->put('cart', []);
        }

        $product = null;
        if ($type == 'vehiculo') {
            $product = Vehiculo::find($id);
        } else if ($type == 'pieza') {
            $product = Pieza::find($id);
        }
        //comprobar si hay stock
        if ($product->cantidad <= 0) {
            return redirect()->route('vehiculos.index')->with('error', 'No hay stock');
        }

        if ($product) {
            $cart = session()->get('cart');
            $key = $type . '-' . $id;

            if (isset($cart[$key])) {
                $cart[$key]['quantity']++;
                $cart[$key]['line_total'] = $cart[$key]['price'] * $cart[$key]['quantity'];
            } else {
                $cart[$key] = [
                    'type' => $type,
                    'product' => $product,
                    'price' => $product->precio,
                    'quantity' => 1,
                    'line_total' => $product->precio
                ];
            }
            // Guardar el carrito en la sesión
            session()->put('cart', $cart);

            // Si es vehiculo redirigir a vehiculos.index y si es pieza a piezas.index
            if ($type == 'vehiculo') {
                return redirect()->route('vehiculos.index')->with('success', 'Vehiculo añadido al carrito');
            } else if ($type == 'pieza') {
                return redirect()->route('piezas.index')->with('success', 'Pieza añadida al carrito');
            }

        }
    }

    public function removeFromCart($id, $type)
    {
        // Obtener el carrito de la sesión
        $cart = session()->get('cart');

        // Crear la clave del producto
        $key = $type . '-' . $id;


        //Borrado de un articulo si ese articulo tiene mas de 1 cantidad se resta una adicha cnatida
        if (isset($cart[$key]) && $cart[$key]['quantity'] > 1) {
            $cart[$key]['quantity']--;
            $cart[$key]['line_total'] = $cart[$key]['price'] * $cart[$key]['quantity'];
        } else {
            // Eliminar el producto del carrito
            unset($cart[$key]);
        }

        session()->put('cart', $cart);

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');
    }

    //Obtener formulario del carrito.checkout
    public function checkout()
    {
        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->route('carrito.index');
        }

        // Verificar la cantidad de cada artículo en la base de datos
        foreach ($cart as $item) {
            $product = null;
            if ($item['type'] == 'vehiculo') {
                $product = Vehiculo::find($item['product']->id);
            } else if ($item['type'] == 'pieza') {
                $product = Pieza::find($item['product']->id);
            }

            if ($product && $product->cantidad < $item['quantity']) {
                // No hay suficientes en la base de datos, redirigir con un mensaje de error
                return redirect()->route('carrito.index')->with('error', 'No hay suficiente cantidad de ' . ($item['type'] == 'vehiculo' ?
                        $product->marca . ' ' . $product->modelo : $product->nombre) . ' en stock');
            }
        }
        return view('carrito.checkout');
    }


}
