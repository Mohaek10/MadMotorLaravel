<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use App\Models\Vehiculo;
use Tests\TestCase;

class CarritoControllerTest extends TestCase
{

    public function testRemoveFromCart()
    {

    }

    public function testCheckout()
    {

    }

    /*public function testIndex()
    {
        session()->put('cart', [
            'vehiculo-1' => [
                'type' => 'vehiculo',
                'product' => [
                    'id' => 1,
                    'precio' => 100,
                    'imagen' => 'https://www.motorsgear.com/wp-content/uploads/2019/08/15354402196447.jpg',
                ],
                'quantity' => 2,
                'line_total' => 200,
            ],
            'pieza-2' => [
                'type' => 'pieza',
                'product' => [
                    'id' => 2,
                    'precio' => 50,
                    'imagen' => 'https://www.motorsgear.com/wp-content/uploads/2019/08/15354402196447.jpg',
                ],
                'quantity' => 1,
                'line_total' => 50,
            ],
        ]);

        $response = $this->get('/carrito/index');
        $response->assertStatus(200);
        $response->assertViewIs('carrito.index');

        $response->assertViewHas('cart');
        $this->assertEquals(session()->get('cart'), $response->viewData('cart'));

        $response->assertViewHas('totalDelCarrito');
        $this->assertEquals(250, $response->viewData('totalDelCarrito'));

        $response->assertViewHas('totalItems');
        $this->assertEquals(3, $response->viewData('totalItems'));
    }

    public function testAddToCartVehiculoSuccess()
    {
        $this->withoutMiddleware([Authenticate::class]);

        $vehiculo = Vehiculo::factory()->create(['cantidad' => 1]);

        $response = $this->post('/carrito/add/' . $vehiculo->id, ['type' => 'vehiculo']);

        $response->assertRedirect('/vehiculos/index');
        $response->assertSessionHas('success', 'Vehiculo añadido al carrito');

        $cart = session()->get('cart');
        $key = 'vehiculo-' . $vehiculo->id;

        $this->assertArrayHasKey($key, $cart);
        $this->assertEquals($vehiculo->precio, $cart[$key]['price']);
        $this->assertEquals(1, $cart[$key]['quantity']);
        $this->assertEquals($vehiculo->precio, $cart[$key]['line_total']);
    }
    public function testAddToCartPiezaSuccess()
    {
        $this->withoutMiddleware([Authenticate::class]); // Bypass authentication middleware

        $pieza = Pieza::factory()->create(['cantidad' => 1]); // Create a pieza with stock

        $response = $this->post('/carrito/add/' . $pieza->id, ['type' => 'pieza']);

        $response->assertRedirect('/piezas/index');
        $response->assertSessionHas('success', 'Pieza añadida al carrito');

        $cart = session()->get('cart');
        $key = 'pieza-' . $pieza->id;

        $this->assertArrayHasKey($key, $cart);
        $this->assertEquals($pieza->precio, $cart[$key]['price']);
        $this->assertEquals(1, $cart[$key]['quantity']);
        $this->assertEquals($pieza->precio, $cart[$key]['line_total']);
    }
    */

}
