@extends('main')

@section('title', 'Ver Perfil')

@section('content')
    <section class="bg-gray-900 font text-white pt-5 h-screen">
        <div class="container mx-auto pt-5">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-8">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">
                        Hola {{ $cliente->nombre}} {{ $cliente->apellido}}</h3>
                    <p class="text-sm text-gray-600 mb-4">Detalles e información de tu cuenta</p>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="bg-gray-100 px-4 py-3 rounded-lg">
                            <p class="text-gray-600 font-medium">Nombre:</p>
                            <p class="text-gray-800">{{ $cliente->nombre }} {{ $cliente->apellido }}</p>
                        </div>
                        <div class="bg-gray-100 px-4 py-3 rounded-lg">
                            <p class="text-gray-600 font-medium">Dirección de correo electrónico:</p>
                            <p class="text-gray-800">{{ $cliente->email }}</p>
                        </div>
                        <div class="bg-gray-100 px-4 py-3 rounded-lg">
                            <p class="text-gray-600 font-medium">Fecha de creación de la cuenta:</p>
                            <p class="text-gray-800">{{ $cliente->created_at }}</p>
                        </div>
                        <div class="bg-gray-100 px-4 py-3 rounded-lg">
                            <p class="text-gray-600 font-medium">Fecha de última actualización de la cuenta:</p>
                            <p class="text-gray-800">{{ $cliente->updated_at }}</p>
                        </div>
                        <div class="bg-gray-100 px-4 py-3 rounded-lg col-span-2">
                            <p class="text-gray-600 font-medium">Número de DNI:</p>
                            <p class="text-gray-800">{{ $cliente->dni }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center py-4 bg-gray-100">
                    <a href="{{ route('pedido.historial') }}"
                       class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded-lg mr-2">Historial
                        de Pedidos</a>
                    <a href="{{ route('cliente.edit', $cliente->id) }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg mr-2">Editar</a>
                    <a href="{{ route('vehiculos.hero') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-2 rounded-lg">Volver</a>
                </div>
            </div>
        </div>
    </section>
@endsection
