@php use App\Models\Vehiculo; @endphp
@extends('main')
@section('content')

    <!-- Hero -->
    <section class="landing-section bg-black h-screen w-screen text-center overflow-hidden relative">
        <div class="z-30 relative h-full flex flex-col">
            <header class="">
                <h2 class="text-white pt-40 text-[59px] font-bold font-mono">MADMOTOR</h2>
                <p class=" text-white text-sm">TU CONCESIONARIO DE CONFIANZA

                </p>
            </header>
            <footer class="flex flex-col flex-grow justify-end w-1/4 mx-auto pb-20">
                <a class="border-3 border-white bg-white/5 backdrop-blur-sm text-sm rounded font-medium text-white px-12 py-2 inline-block hover:bg-white hover:text-black transition-colors my-hover-class"
                   href="#coches">Descubre nuestros productos</a>
            </footer>
        </div>
        <video class="absolute top-0 bottom-0 h-full w-full z-10 object-center object-cover" autoplay muted loop
               src="{{asset('images/video2.webm')}}"></video>
    </section>

    <!-- Vehiculos -->
    <section class="bg-gray-900 text-center overflow-hidden relative" id="coches">
        <h2 class="text-center text-white text-4xl font-bold mt-10">Nuestros vehículos</h2>
        <p class="text-center text-white text-sm mb-10">Descubre nuestra amplia gama de vehículos</p>
        @if(count($vehiculos)>0)
            <div class="flex flex-wrap justify-center">
                @foreach($vehiculos as $vehiculo)
                    <a href="{{route('vehiculos.show',$vehiculo->id)}}">
                        <div class="row flex overflow-x-auto">
                            <div
                                class="m-4 border-gray-700 bg-gray-800  shadow-md bg-clip-border rounded-xl ring-2 ring-white ring-opacity-20 max-w-sm hover:bg-gray-700">
                                <div
                                    class="relative mx-4 mt-4 overflow-hidden  bg-white bg-clip-border rounded-xl h-80">
                                    @if ($vehiculo->imagen != Vehiculo::$IMAGEN_DEFAULT)
                                        <img src="{{ asset('storage/'.$vehiculo->imagen) }}"
                                             class="object-cover w-full h-full"
                                             alt="coche">
                                    @else
                                        <img src="{{ $vehiculo->imagen }}" class="object-cover w-full h-full"
                                             alt="coche">
                                    @endif
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-2">
                                        <p class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                            {{$vehiculo->marca}}  {{$vehiculo->modelo}}
                                        </p>

                                        <p class="block font-sans text-white text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                            {{number_format($vehiculo->precio, 0,0 )}}€
                                        </p>
                                    </div>
                                    <div class="flex items-center justify-between mb-2">
                                        <p class="block font-sans text-white text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                            {{$vehiculo->year}}
                                        </p>
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{$vehiculo->km}} KM</span>

                                    </div>
                                </div>

                                <!-- Boton de carrito -->
                                <div class="relative inline-flex  group pb-2">
                                    <a href="{{ route('carrito.add', ['id' => $vehiculo->id, 'type' => 'vehiculo']) }}"
                                       class="relative inline-flex items-center justify-start px-4 py-2 overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group">
                                        <span
                                            class="w-48 h-48 rounded rotate-[-40deg] bg-gray-900 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                        </svg>
                                        <span
                                            class="relative w-full text-left text-black transition-colors duration-300 ease-in-out group-hover:text-white">Añadir al carrito </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        <div class="flex flex-row justify-center pb-3">
            <div class="flex flex-row justify-center">
                <a href="{{route('vehiculos.index')}}"
                   class="border-3 border-white bg-white/5 backdrop-blur-sm text-sm rounded font-medium text-white px-12 py-2 inline-block hover:bg-white hover:text-black transition-colors my-hover-class">
                    Ver todos los vehículos
                </a>
            </div>
        </div>
        @else
            <p class="
            text-white text-2xl font-bold mt-10"
            > No hay vehículos</p>
        @endif
    </section>


    <div class="h-5 w-full bg-black/50  " ></div>


    <!-- Piezas -->
    <section class="bg-gray-900 text-center overflow-hidden relative">
        <h2 class="text-center text-white text-4xl font-bold mt-10">Nuestras piezas</h2>
        @if(count($piezas)>0)
            <div class="flex flex-wrap justify-center">
                @foreach($piezas as $pieza)
                    <a href="#">
                        <div class="row flex overflow-x-auto">
                            <div
                                class="m-4 border-gray-700 bg-gray-800  shadow-md bg-clip-border rounded-xl ring-2 ring-white ring-opacity-20 max-w-sm hover:bg-gray-700">
                                <div
                                    class="relative mx-4 mt-4 overflow-hidden  bg-white bg-clip-border rounded-xl h-80">
                                    <img
                                        src="{{$pieza->imagen}}"
                                        alt="card-image" class="object-cover w-full h-full"/>
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-2">
                                        <p class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                            {{$pieza->nombre}}
                                        </p>

                                        <p class="block font-sans text-white text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                            {{number_format($pieza->precio, 0,0 )}}€
                                        </p>
                                    </div>
                                    <div class="flex items-center justify-between mb-2">
                                        <p class="block font-sans text-white text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                            {{$pieza->cantidad}}
                                        </p>

                                    </div>
                                    <span
                                        class="text-warning text-xs font-semibold px-4 py-0.5 rounded flex justify-center   ">{{$pieza->descripcion}}</span>

                                </div>
                                <div class="relative inline-flex  group pb-2">
                                    <a href="{{ route('carrito.add', ['id' => $pieza->id, 'type' => 'pieza']) }}"
                                       class="relative inline-flex items-center justify-start px-4 py-2 overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group">
                                        <span
                                            class="w-48 h-48 rounded rotate-[-40deg] bg-gray-900 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                        </svg>
                                        <span
                                            class="relative w-full text-left text-black transition-colors duration-300 ease-in-out group-hover:text-white">Añadir al carrito </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
        <div class="flex flex-row justify-center mb-5">
            <div class="flex flex-row justify-center">
                <a href="{{route('piezas.index')}}"
                   class="border-3 border-white bg-white/5 backdrop-blur-sm text-sm rounded font-medium text-white px-12 py-2 inline-block hover:bg-white hover:text-black transition-colors my-hover-class">
                    Ver todas las piezas
                </a>
            </div>
        </div>

    </section>




    <style>
        .my-hover-class:hover {
            color: black !important;
        }
    </style>

@endsection
