<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\User;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
class ClientesControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }

    public function testStore()
    {
        $response = $this->post('/register', [
            'nombre' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'apellido' => 'Test User',
            'dni' => '12345678A',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function testRemoveSoft()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);

        $response = $this->get('/perfil/' . $user->id . '/soft');
        $response->assertRedirect('/');
    }

    public function testShowSuccess()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);

        $response = $this->get('/perfil/' . $user->id);
        $response->assertStatus(200);
    }

    public function testShowUnauthorized()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);

        $response = $this->get('/perfil/1');
        $response->assertStatus(302);
    }


    public function testUpdate()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);
        $response = $this->put('/perfil/' . $user->id, [
            'nombre' => 'Cambiazo',
            'email' => $user->email,
            'apellido' => $user->apellido,
            'dni' => $user->dni,
        ]);
        $response->assertRedirect('/perfil/' . $user->id);
        $response->assertStatus(302);
    }

    public function testIndex()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $response = $this->get('/clientes');
        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $user = Clientes::factory()->create([
            'role' => 'admin',
        ]);
        $this->actingAs($user);
        $response = $this->get('/perfil/' . $user->id . '/edit');
        $response->assertStatus(200);
    }

    public function testEditUnauthorized()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);
        $response = $this->get('/perfil/1/edit');
        $response->assertStatus(302);
    }

    public function testRemoveSoftUnauthorized()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);
        $response = $this->get('/perfil/1/soft');
        $response->assertStatus(302);
        self::assertNotEquals(1, $user->id);
    }

    public function testUpdateUnauthorized()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);
        $response = $this->put('/perfil/1', [
            'nombre' => 'Cambiazo',
            'email' => $user->email,
            'apellido' => $user->apellido,
            'dni' => $user->dni,
        ]);
        $response->assertStatus(302);
    }

    public function testIndexUnauthorized()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);
        $response = $this->get('/clientes');
        $response->assertStatus(302);
    }
    public function testRemoveSoftSuccessByCliente()
    {
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $this->actingAs($user);
        $response = $this->get('/perfil/' . $user->id . '/soft');
        $response->assertRedirect('/');
    }
    public function testLogin(){

        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $user->password,
        ]);
        $response->assertRedirect(RouteServiceProvider::HOME);
        $response->assertStatus(302);
    }
    public function testLoginFail(){
        $user = Clientes::factory()->create([
            'role' => 'cliente',
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrongpassword',
        ]);
        $this->assertInvalidCredentials(['email' => $user->email, 'password' => 'wrongpassword']);
        $response->assertStatus(302);
    }
}


