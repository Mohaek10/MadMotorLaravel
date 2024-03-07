<?php

namespace Tests\Feature;

namespace App\Http\Controllers;

use Tests\TestCase;
use App\Models\Clientes;
use App\Models\Vehiculo;

class VehiculoControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }

    public function testDestroyWithAuth()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $vehiculo = Vehiculo::factory()->create();
        $response = $this->delete(route('vehiculos.destroy', $vehiculo->id));
        $response->assertStatus(302);
        $response->assertRedirect('http://localhost/vehiculos/admin/panel/vehiculos');


    }

    public function testDestroyWithoutAuth()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);
        $vehiculo = Vehiculo::factory()->create();
        $response = $this->delete(route('vehiculos.destroy', $vehiculo->id));
        $response->assertStatus(302);
        $response->assertRedirect('http://localhost/home');
        $vehiculo = Vehiculo::find($vehiculo->id);
        $this->assertNotNull($vehiculo);
    }

    public function testStoreAuthorizedWithoutErrors()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $vehiculos = Vehiculo::factory()->count(5)->make();
        $response = $this->post(route('vehiculos.store'), $vehiculos->toArray());
        $response->assertStatus(302);
        $response->assertRedirect('http://localhost');
        $vehiculo = Vehiculo::where('marca', $vehiculos->first()->marca)->first();
        $this->assertNull($vehiculo);


    }

    public function testStoreAuthorizedWithErrors()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $vehiculos = Vehiculo::factory()->count(5)->make();
        $response = $this->post(route('vehiculos.store'), $vehiculos->toArray());
        $response->assertStatus(302);
        $response->assertRedirect('http://localhost');

        $vehiculo = Vehiculo::where('marca', $vehiculos->first()->marca)->first();
        $this->assertNull($vehiculo);
        $data = [
            'marca' => '',
            'modelo' => '',
            'year' => 1000,
            'km' => -4000,
            'precio' => -44,
            'cantidad' => -4,
            'categoria_id' => -4,
        ];

        $response = $this->post('/vehiculos', $data);
        $response->assertSessionHasErrors([
            'marca',
            'modelo',
            'year',
            'km',
            'precio',
            'cantidad',
            'categoria_id',

        ]);

    }

    public function testStoreUnauthorized()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);
        $vehiculos = Vehiculo::factory()->count(5)->make();
        $response = $this->post(route('vehiculos.store'), $vehiculos->toArray());
        $response->assertStatus(302);
        $response->assertRedirect('http://localhost/home');
    }

    public function testShow()
    {
        $response = $this->get('/vehiculos/1');
        $response->assertViewIs('vehiculos.show');
        $vehiculo = Vehiculo::find(1);
        $response->assertViewHas('vehiculo', $vehiculo);

    }

    public function testCreateWithoutAuthorization()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);
        $response = $this->get('/vehiculos/create');
        $response->assertStatus(302);
        $response->assertRedirect('http://localhost/vehiculos');


    }

    public function testCreateWithAutorization()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $response = $this->get('/vehiculos/admin/create');


    }

    public function testHero()
    {


    }

    public function testIndex()
    {
        $response = $this->get('/vehiculos');
        $response->assertViewIs('vehiculos.index');
        $vehiculos = Vehiculo::all();
        $this->assertEquals(20, $vehiculos->count());

    }

    public function testUpdateWithoutAuth()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);
        $vehiculo = Vehiculo::factory()->create();
        $response = $this->put(route('vehiculos.update', $vehiculo->id), $vehiculo->toArray());
        $response->assertStatus(302);
        $response->assertRedirect('http://localhost/home');
        $vehiculo = Vehiculo::find($vehiculo->id);
        $this->assertNotNull($vehiculo);

    }
    public function testUpdateWithAuth(){
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $vehiculo = Vehiculo::factory()->create();
        $response = $this->put(route('vehiculos.update', $vehiculo->id), $vehiculo->toArray());
        $response->assertStatus(302);
        $response->assertRedirect('http://localhost/vehiculos');
        $vehiculo = Vehiculo::find($vehiculo->id);
        $this->assertNotNull($vehiculo);
    }


    public function testEditAuth()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $vehiculo = Vehiculo::factory()->create();
        $response = $this->get(route('vehiculos.edit', $vehiculo->id));
        $response->assertViewIs('vehiculos.edit');
        $response->assertViewHas('vehiculo', $vehiculo);

    }
    public function testEditUnauthorized()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);
        $vehiculo = Vehiculo::factory()->create();
        $response = $this->get(route('vehiculos.edit', $vehiculo->id));
        $response->assertStatus(302);
        $response->assertRedirect('http://localhost/home');

    }

    public function testAdminPanelVehiculosWithAuth()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $response = $this->get('/vehiculos/admin/panel/vehiculos');
        $response->assertViewIs('vehiculos.admin');

    }
    public function testAdminPanelVehiculosWithoutAuth()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);
        $response = $this->get('/vehiculos/admin/panel/vehiculos');
        $response->assertStatus(302);
        $response->assertRedirect('http://localhost/home');

    }
}
