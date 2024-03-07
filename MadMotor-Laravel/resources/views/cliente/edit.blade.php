@extends('main')

@section('title', 'Actualizar Perfil')

@section('content')
    <div class="mt-5 p-5">
    <div class="container mx-auto p4-10">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-xl">
            <div class="md:flex">
                <div class="w-full px-6 py-8 md:p-8">
                    <h2 class="text-2xl font-bold text-gray-800">Estás editando tu perfil</h2>
                    <p class="mt-4 text-gray-600">Modifica los datos en el formulario</p>
                    <form action="{{ route("cliente.update", $cliente->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label class="block text-gray-800 font-bold mb-2" for="name">
                                Name
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('nombre') is-invalid @enderror" id="nombre" name="nombre" type="text" value="{{$cliente->nombre}}" minlength="2" maxlength="50">
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-800 font-bold mb-2" for="name">
                                Apellido
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="apellido" name="apellido" type="text" value="{{$cliente->apellido}}" minlength="2" maxlength="50">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-800 font-bold mb-2" for="email">
                                Email
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{$cliente->email}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Enviar
                        </button>
                    </form>
                    <form action="{{ route("cliente.removeSoft", $cliente->id) }}" method="get">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Borrar cuenta
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
