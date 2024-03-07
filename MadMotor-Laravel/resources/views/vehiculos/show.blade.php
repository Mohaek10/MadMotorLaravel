@php use App\Models\Vehiculo; @endphp

@extends('main')

@section('title', 'Vehículos - Ver detalles')

@section('content')
    <section class="bg-gray-900 text-white font-sans">
        <div class="container rounded-4 pt-4  shadow-lg  ">
            <h1 class="text-3xl text-center font-bold mt-5"></h1>
        </div>
        <div class="container py-5 rounded-4 shadow-lg">
            <h1 class="text-3xl text-center font-bold pb-5">Detalles del Vehículo</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="relative overflow-hidden bg-cover bg-no-repeat md:col-span-1">
                    @if ($vehiculo->imagen != Vehiculo::$IMAGEN_DEFAULT)
                        <img src="{{ asset('storage/' . $vehiculo->imagen) }}"
                             alt="Vehículo {{ $vehiculo->marca }} {{ $vehiculo->modelo }}"
                             class="h-full w-full rounded-lg shadow-none transition-shadow duration-300 ease-in-out hover:shadow-lg hover:shadow-black/30">
                    @else
                        <img src="{{ $vehiculo->imagen }}"
                             alt="Vehículo {{ $vehiculo->marca }} {{ $vehiculo->modelo }}"
                             class="h-full w-full rounded-lg shadow-none transition-shadow duration-300 ease-in-out hover:shadow-lg hover:shadow-black/30">
                    @endif
                </div>

                <div class="p-6 md:col-span-1">
                    <h2 class="mb-2 text-2xl font-medium leading-tight">
                        {{ $vehiculo->marca }} {{ $vehiculo->modelo }}
                    </h2>

                    <ul class="list-none space-y-4">
                        <li>
                            <span class="font-bold text-gray-400">Año:</span>
                            <span>{{ $vehiculo->year }}</span>
                        </li>
                        <li>
                            <span class="font-bold text-gray-400">Kilómetros:</span>
                            <span>{{ $vehiculo->km }}</span>
                        </li>
                        <li>
                            <span class="font-bold text-gray-400">Precio:</span>
                            <span>{{ number_format($vehiculo->precio, 2, '.', ',') }}</span>
                        </li>
                        <li>
                            <span class="font-bold text-gray-400">Cantidad disponible:</span>
                            <span>{{ $vehiculo->cantidad }}</span>
                        </li>
                        <li v-if="vehiculo.categoria">
                            <span class="font-bold text-gray-400">Categoría:</span>
                            <span>{{ $vehiculo->categoria->nombre }}</span>
                        </li>
                    </ul>

                    <div class="mt-4">
                        <a href="{{route('carrito.add',['id' => $vehiculo->id, 'type' => 'vehiculo'])}}" class="btn btn-primary">Añadir al carrito</a>
                        <a href="{{route('vehiculos.index')}}" class="btn btn-secondary">Ver más vehículos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
