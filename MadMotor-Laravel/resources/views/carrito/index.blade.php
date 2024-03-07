@php use App\Models\Vehiculo; @endphp
@php use App\Models\Pieza; @endphp

@extends('main')
@section('title', 'Carrito de compra')
@section('content')
    <section class="bg-gray-900 ">
        <div class=" pt-5 h-screen py-8">
            <div class="container mx-auto mt-5 px-4">
                <h1 class="text-2xl font-semibold text-white mb-4">Carrito de compra</h1>
                <div class="flex flex-col md:flex-row gap-4">
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="md:w-3/4">
                        <div class="bg-white rounded-lg shadow-md p-6 mb-4 overflow-y-auto" style="max-height: 60vh;">
                            @if(session('success'))
                                <div id="success-alert"
                                     class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4"
                                     role="alert">
                                    <p class="font-bold">Success</p>
                                    <p>{{ session('success') }}</p>
                                </div>
                            @endif
                            <table class="w-full">
                                <thead>
                                <tr>
                                    <th class="text-left font-semibold">Producto</th>
                                    <th class="text-left font-semibold">Precio</th>
                                    <th class="text-left font-semibold">Cantidad</th>
                                    <th class="text-left font-semibold">Total</th>
                                    <th class="text-left font-semibold">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $item)
                                    <tr>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                @if($item['type'] == 'vehiculo')
                                                    @if ($item['product']->imagen != Vehiculo::$IMAGEN_DEFAULT )
                                                        <img src="{{ asset('storage/'.$item['product']->imagen) }}"
                                                             class="h-16 w-16 mr-4"
                                                             alt="coche">
                                                    @else
                                                        <img src="{{ $item['product']->imagen }}" class="h-20 w-20 mr-4"
                                                             alt="coche">
                                                    @endif
                                                @else
                                                    @if ($item['product']->imagen != Pieza::$IMAGE_DEFAULT  )
                                                        <img src="{{ asset('storage/'.$item['product']->imagen) }}"
                                                             class="h-16 w-16 mr-4"
                                                             alt="coche">
                                                    @else
                                                        <img src="{{ $item['product']->imagen }}" class="h-20 w-20 mr-4"
                                                             alt="coche">
                                                    @endif
                                                @endif
                                                <span class="font-semibold">@if($item['type'] == 'vehiculo')
                                                        {{ $item['product']->marca }} {{ $item['product']->modelo }}
                                                    @else
                                                        {{ $item['product']->nombre }}
                                                    @endif
                                                </span>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            {{ $item['price'] }}€
                                        </td>
                                        <td class="py-4">
                                            {{ $item['quantity'] }}

                                        </td>
                                        <td class="py-4">
                                            {{ $item['line_total'] }} €
                                        </td>
                                        <td class="py-4">
                                            @if($item['type'] == 'vehiculo')
                                                <a class="btn btn-danger"
                                                   href="{{route('carrito.delete',['id' => $item['product']->id, 'type' => 'vehiculo'] )}}">Borrar
                                                    Item</a>
                                            @else
                                                <a class="btn btn-danger"
                                                   href="{{route('carrito.delete',['id' => $item['product']->id, 'type' => 'pieza'] )}}">Borrar
                                                    Item</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="md:w-1/4">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-lg font-semibold mb-4">Summary</h2>
                            <div class="flex justify-between mb-2">
                                <span>Cantidad total</span>
                                <span>{{$totalItems}}</span>
                            </div>
                            <hr class="my-2">
                            <div class="flex justify-between mb-2">
                                <span class="font-semibold">Total</span>
                                <span class="font-semibold">{{number_format($totalDelCarrito, 2, ',', '.')}}</span>
                            </div>
                            <a href="{{route('carrito.checkout')}}">
                            <button  class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Checkout</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach($cart as $item)
        <tr>
            <td>
                @if($item['type'] == 'vehiculo')
                    {{ $item['product']->marca }} {{ $item['product']->modelo }}
                @else
                    {{ $item['product']->nombre }}
                @endif
            </td>
            <td>{{ ucfirst($item['type']) }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td> {{ $item['price'] }} </td>
        </tr>
        <!-- Scrip de borrado de success alert -->
        <script>
            window.setTimeout(function () {
                var alert = document.getElementById('success-alert');
                if (alert) alert.style.display = 'none';
            }, 2000);
        </script>
    @endforeach
@endsection

