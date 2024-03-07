@extends('main')

@section('title', 'ver Perfil')

@section('content')
    <div class="flex justify-center items-center h-screen bg-dark mt-5 p-5">
        <div class="bg-white max-w-2xl shadow overflow-hidden sm:rounded-lg mt-5 pt-5">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Hola {{ $cliente->nombre}} {{ $cliente->apellido}}
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Detalles y informacion de tu cuenta
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Nombre :
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$cliente->nombre}} {{$cliente->apellido}}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Dirección de correo electrónico :
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$cliente->email}}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Fecha de creacion de la cuenta:
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$cliente->created_at}}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Fecha de ultima actualizacion de la cuenta:
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$cliente->updated_at}}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Numero de dni :
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$cliente->dni}}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center bg-dark">
        <a class="btn btn-primary mb-5" href="{{ route('cliente.adminEdit', $cliente->id) }}">Editar</a>
        <a class="btn btn-secondary mx-2 mb-5" href="{{ route('vehiculos.hero') }}">Volver</a>
    </div>
@endsection
