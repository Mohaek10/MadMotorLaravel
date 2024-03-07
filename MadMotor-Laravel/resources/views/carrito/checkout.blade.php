@extends('main')
@section('title', 'Checkout')
@section('content')
    <section class="bg-gray-900 ">
        <div class="h-screen flex items-center bg-gray-700">

            <form method="POST" action="{{ route('pedido.checkout') }}" id="checkout"
                  class="w-full max-w-xl mx-auto bg-white rounded shadow-xl relative py-4">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                @csrf
                <div class="text-gray-900 font-medium text-xs text-center flex flex-col items-center justify-center">
                    <img class="h-20 w-20 rounded-full shadow-xl border-4 border-gray-400"
                         src="https://cdn.iconscout.com/icon/free/png-512/free-checkout-1553147-1314013.png?f=webp&w=256"
                         alt="logo">
                    <p class="mx-2 my-3 text-lg">
                        Información del pedido
                    </p>
                    <div class="hidden lg:flex font-medium text-xs flex text-gray-500">
                        <div class="mx-2">Seleccionar Producto</div>
                        <div class="mx-2">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="mx-2">
                            Ver carrito
                        </div>
                        <div class="mx-2">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="mx-2 text-gray-800 font-bold">Checkout</div>
                    </div>
                </div>
                <div class="py-2 px-4 md:px-8">

                    <div class="bg-gray-200 rounded py-2">

                        <div
                            class="rounded-t-lg text-xs text-gray-800 w-full flex items-center justify-between border-b border-gray-300">
                            <span class="block ml-2 font-semibold">Datos del pedido</span>
                            <div class="flex">
                                <img class="h-10 w-10 object-contain mr-2"
                                     src="https://upload.wikimedia.org/wikipedia/commons/1/16/Former_Visa_%28company%29_logo.svg"
                                     alt="Visa">
                                <img class="h-10 w-10 object-contain mr-2"
                                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/1280px-Mastercard-logo.svg.png"
                                     alt="Master card">
                            </div>
                        </div>

                        <div class="mb-1 p-2">
                            <label for="direccion" class="text-xs text-gray-700">Dirección de envío</label>
                            <input id="direccion" name="direccion" type="text"
                                   placeholder="Dirección (Pais, Poblado, Municipio, Calle, Numero)" required
                                   class="w-full px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-gray-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white">
                        </div>

                        <div class="w-full">
                            <div class=" my-1 p-2">
                                <label for="datosTarjeta" class="text-xs text-gray-700">Información de la
                                    tarjeta</label>
                                <input type="text" name="datosTarjeta" id="datosTarjeta" required
                                       class="w-full px-2 py-1 lg:px-4 lg:py-2 text-gray-700 bg-gray-100 text-xs lg:text-sm border border-gray-300 rounded-lg focus:outline-none focus:bg-white"
                                       placeholder="Numero de Tarjeta">

                            </div>
                        </div>

                    </div>
                    <div class="mt-4">
                        <div class="w-full">
                            <button
                                class="h-auto lg:h-12 text-xs py-1 lg:py-2 px-2 lg-px-4 text-white font-light tracking-wider bg-gray-900 rounded-lg uppercase w-full focus:outline-none focus:shadow-outline"
                                type="submit">Pay
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <section>
@endsection
