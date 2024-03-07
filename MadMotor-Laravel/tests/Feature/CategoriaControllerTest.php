<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Clientes;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
class CategoriaControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }
    public function testIndex()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $response = $this->get('/categorias');
        $response->assertStatus(200);
    }
    public function testIndexNoAuth()
    {
        $response = $this->get('/categorias');
        $response->assertStatus(302);
    }
    public function testShow()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $categoria = Categoria::factory()->create();
        $response = $this->get('/categorias/' . $categoria->id);
        $response->assertStatus(200);
    }
    public function testShowNoAuth()
    {
        $categoria = Categoria::factory()->create();
        $response = $this->get('/categorias/' . $categoria->id);
        $response->assertStatus(302);
    }
    public function testCreate()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $response = $this->get('/categorias/create');
        $response->assertStatus(200);
    }
    public function testCreateNoAuth()
    {
        $response = $this->get('/categorias/create');
        $response->assertStatus(302);
    }
    public function testStore()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);

        $response = $this->post('/categorias', [
            'nombre' => 'Test Categoria',
        ]);

        $response->assertRedirect('/home');
    }
    public function testStoreNoauth()
    {
        $response = $this->post('/categorias', [
            'nombre' => 'Test Categoria',
        ]);

        $response->assertStatus(302);
    }
    public function testEdit()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $categoria = Categoria::factory()->create();
        $response = $this->get('/categorias/' . $categoria->id . '/edit');
        $response->assertStatus(200);
    }
    public function testEditNoAuth()
    {
        $categoria = Categoria::factory()->create();
        $response = $this->get('/categorias/' . $categoria->id . '/edit');
        $response->assertStatus(302);
    }
    public function testUpdate()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $categoria = Categoria::factory()->create();

        $response = $this->put('/categorias/' . $categoria->id.'/update', [
            'nombre' => 'Test Categoria',
        ]);
        $response->assertRedirect('/categorias');
    }
    public function testUpdateNoAuth()
    {
        $categoria = Categoria::factory()->create();
        $response = $this->put('/categorias/' . $categoria->id.'/update', [
            'nombre' => 'Test Categoria',
        ]);
        $response->assertStatus(302);
    }
    public function testDestroy()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $categoria = Categoria::factory()->create();
        $response = $this->delete('/categorias/' . $categoria->id);
        $response->assertRedirect('/categorias');
    }
    public function testDestroyNoAuth()
    {
        $categoria = Categoria::factory()->create();
        $response = $this->delete('/categorias/' . $categoria->id);
        $response->assertStatus(302);
    }
}
