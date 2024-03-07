@extends('main')

@section('title', 'Crear Vehículo')

@section('content')
    <section class="bg-gray-900 font text-white">
        <div class="container rounded-4 pt-5 mt-5 shadow-lg bg-gray-700 ">
            @if ($errors->any())
                <div class=" mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2 class="text-2xl font-semibold  mt-5 mb-6">Crear Vehículo</h2>
            <form class="text-gray-900" action="{{ route('vehiculos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div >
                    <label for="marca" class="block text-sm font-medium text-white">Marca</label>
                    <input type="text" name="marca" id="marca"
                           class="mt-1 w-25  rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           required>
                    @error('marca')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="modelo" class="block text-sm font-medium text-white">Modelo</label>
                    <input type="text" name="modelo" id="modelo"
                           class="mt-1 block w-25 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           required>
                    @error('modelo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="year" class="block text-sm font-medium text-white">Año</label>
                    <input type="number" name="year" id="year"
                           class="mt-1 block w-25 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           required>
                    @error('año')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="precio" class="block text-sm font-medium text-white">Precio</label>
                    <input type="number" name="precio" id="precio"
                           class="mt-1 block w-25 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           required>
                    @error('precio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="km" class="block text-sm font-medium text-white">Kilometraje</label>
                    <input type="number" name="km" id="km"
                           class="mt-1 block w-25 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           required>
                    @error('km')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="cantidad" class="block text-sm font-medium text-white">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad"
                           class="mt-1 block w-25 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           required>
                    @error('cantidad')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="categoria_id" class="block text-sm font-medium text-white">Categoría</label>
                    <select name="categoria_id" id="categoria_id"
                            class="mt-1 block w-25 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                        <option class="text-dark" value="">Seleccione una categoría</option>
                        @foreach($categorias as $categoria)
                            <option class="text-dark" value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="imagen" class="block text-sm font-medium text-white">Imagen</label>
                    <input type="file" name="imagen" id="imagen"
                           class="mt-1 block w-full text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                           accept="image/*" required>
                    @error('imagen')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Crear Vehículo
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
