@php use App\Models\Vehiculo; @endphp

@extends('main')
@section('title', 'Vehiculos')
@section('content')
    <section class="bg-gray-900 font text-white">
        <div class="container rounded-4 pt-5 shadow-lg bg-gray-700 ">
            <div class="pt-20">
                <h1 class="text-3xl  font-bold text-center underline decoration-sky-500">
                    {{count($vehiculos) }} Vehículos de MadMotor
                </h1>
                <div class="grid grid-cols-4 gap-4 pt-3 text-black">

                    <div class="col-span-1">
                        <form action="{{ route('vehiculos.index') }}" method="GET" class="form">
                            <div class="flex flex-col gap-2">
                                <div class="flex-1">
                                    <label for="marca" class="block mb-2 text-xl font-bold text-gray-900 text-white">Marca:</label>
                                    <input type="text" id="marca" name="marca"
                                           class="block w-full p-3 ps-10 text-xl text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="BMW" value="{{request('marca')}}">
                                </div>
                                <div class="flex-1">
                                    <label for="modelo" class="block mb-2 text-xl font-bold text-gray-900 text-white">Modelo:</label>
                                    <input type="text" id="modelo" name="modelo"
                                           class="block w-full p-3 ps-10 text-xl text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="Serie 3" value="{{request('modelo')}}">

                                </div>
                                <div class="flex-1">
                                    <div class="card">
                                        <div class="card-body bg-gray-300">
                                            <h3 class="h5 card-title">Rango de año</h3>
                                            <div class="d-flex mb-3">
                                                <div class="col-md-6 me-2">
                                                    <label for="yearMin">Min</label>
                                                    <input class="form-control" id="yearMin" placeholder="2000"
                                                           name="yearMin"
                                                           type="number" min="1900" max="{{ date('Y') }}"
                                                           value="{{request('yearMin')}}">
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <label for="yearMax">Max</label>
                                                    <input class="form-control" id="yearMax" name="yearMax"
                                                           placeholder="{{ date('Y') }}"
                                                           type="number" min="1900" max="{{ date('Y') }}"
                                                           value="{{request('yearMax')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="card">
                                        <div class="card-body bg-gray-300">
                                            <h3 class="h5 card-title">Rango de kilómetros</h3>
                                            <div class="d-flex mb-3">
                                                <div class="col-md-6 me-2">
                                                    <label for="kmMin">Min</label>
                                                    <input class="form-control" id="kmMin" placeholder="0" name="kmMin"
                                                           type="number" min="0" value="{{request('kmMin')}}">
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <label for="kmMax">Max</label>
                                                    <input class="form-control" id="kmMax" name="kmMax"
                                                           placeholder="1000000"
                                                           type="number" min="0" value="{{request('kmMax')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="card ">
                                        <div class="card-body bg-gray-300">
                                            <h3 class="h5 card-title">Rango de precio</h3>
                                            <div class="d-flex mb-3">
                                                <div class="col-md-6 me-2">
                                                    <label for="precioMin">Min</label>
                                                    <input class="form-control" id="precioMin" placeholder="0€"
                                                           name="precioMin"
                                                           type="number" min="0" value="{{request('precioMin')}}">

                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <label for="precioMax">Max</label>
                                                    <input class="form-control" id="precioMax" name="precioMax"
                                                           placeholder="1000000€"
                                                           type="number" min="0" value="{{request('precioMax')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit"
                                        class="text-white mt-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Buscar
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="col-span-3 mt-3">

                        <div class="relative ">
                            <div class=" absolute  bottom-4 right-0 w-25">
                                <form action="{{ route('vehiculos.index') }}" method="GET" class="form">
                                    <label for="orden"
                                           class="text-xl font-bold text-gray-900 text-white"></label>
                                    <select id="orden" name="orden"
                                            class="block w-full p-3 ps-10 text-xl text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="default" {{ request('orden') == 'default' ? 'selected' : '' }}>
                                            Ordenar por:
                                        </option>
                                        <option
                                            value="precioDesc" {{ request('orden') == 'precioDesc' ? 'selected' : '' }}>
                                            Precio Descendente
                                        </option>
                                        <option value="yearAcs" {{ request('orden') == 'yearAcs' ? 'selected' : '' }}>
                                            Año
                                            Ascendente
                                        </option>
                                        <option value="yearDesc" {{ request('orden') == 'yearDesc' ? 'selected' : '' }}>
                                            Año
                                            Descendente
                                        </option>
                                        <option value="kmAcs" {{ request('orden') == 'kmAcs' ? 'selected' : '' }}>
                                            Kilómetros
                                            Ascendente
                                        </option>
                                        <option value="kmDesc" {{ request('orden') == 'kmDesc' ? 'selected' : '' }}>
                                            Kilómetros
                                            Descendente
                                        </option>
                                        <option
                                            value="precioAsc" {{ request('orden') == 'precioAcs' ? 'selected' : '' }}>
                                            Precio
                                            Ascendente
                                        </option>
                                    </select>
                                </form>
                            </div>
                        </div>

                        <div class="flex flex-col gap-4">
                            @if(count($vehiculos) > 0)
                                @foreach ($vehiculos as $vehiculo)
                                    <div class="card shadow rounded-lg p-4">
                                        <div class="row align-items-center">
                                            <aside class="col-md-4">
                                                <a href="{{route('vehiculos.show',$vehiculo->id)}}">
                                                    @if ($vehiculo->imagen != Vehiculo::$IMAGEN_DEFAULT)
                                                        <img src="{{ asset('storage/'.$vehiculo->imagen) }}"
                                                             class="h-auto rounded-lg shadow-none transition-shadow duration-300 ease-in-out hover:shadow-lg hover:shadow-black/30"
                                                             alt="coche">
                                                    @else
                                                        <img src="{{ $vehiculo->imagen }}" class="h-auto rounded-lg shadow-none transition-shadow duration-300 ease-in-out hover:shadow-lg hover:shadow-black/30"
                                                             alt="coche">
                                                    @endif
                                                </a>
                                            </aside>
                                            <div class="col-md-5">
                                                <div class="bg-white p-4 rounded-md shadow-lg">
                                                    <a href="{{route('vehiculos.show',$vehiculo->id)}}" class="h3 title text-2xl relative inline cursor-pointer text-xl font-medium before:bg-violet-600  before:absolute before:-bottom-1 before:block before:h-[2px] before:w-full before:origin-bottom-right before:scale-x-0 before:transition before:duration-300 before:ease-in-out hover:before:origin-bottom-left hover:before:scale-x-100">
                                                        {{$vehiculo->marca}} {{$vehiculo->modelo}}
                                                    </a>

                                                    <div class="flex flex-wrap mt-4">
                                                        <div class="flex items-center mr-4">
                                                            <span class="text-gray-500 text-sm">Año:</span>
                                                            <span
                                                                class="ml-1 text-gray-900 font-medium">{{$vehiculo->year}}</span>
                                                        </div>

                                                        <div class="flex items-center mr-4">
                                                            <span class="text-gray-500 text-sm">Kilómetros:</span>
                                                            <span
                                                                class="ml-1 text-gray-900 font-medium">{{$vehiculo->km}}</span>
                                                        </div>

                                                        <div class="flex items-center">
                                                            <span class="text-gray-500 text-sm">Categoría:</span>
                                                            <span
                                                                class="ml-1 text-gray-900 font-medium">{{$vehiculo->categoria->nombre}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-3">
                                                <div
                                                    class=" items-center justify-between py-8 px-8 bg-gray-100 rounded-xl shadow-xl">
                                                    <span class="text-2xl font-bold text-red-500">{{number_format($vehiculo->precio, 2, ',', '.')}}€</span>

                                                    @if ($vehiculo->cantidad > 0)
                                                        <span class="text-green-500 text-sm m-2"> Disponible</span>
                                                    @else
                                                        <span class="text-red-500 text-sm m-2"> No Disponible</span>
                                                    @endif
                                                </div>

                                                <div class=" justify-end mt-4">
                                                    <a href="#" class="btn btn-outline-secondary text-sm mr-2">
                                                        Detalles
                                                    </a>
                                                    @if($vehiculo->cantidad > 0)
                                                        <a href="{{ route('carrito.add', ['id' => $vehiculo->id, 'type' => 'vehiculo']) }}" class=" btn btn-primary text-sm">
                                                            Añadir al carrito

                                                        </a>
                                                    @else
                                                        <a href="#"
                                                           class="btn btn-danger text-sm disabled">
                                                            Agotado
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center">
                                    <h1 class="text-3xl font-bold text-gray-900 text-white">No se encontraron
                                        vehículos</h1>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center pt-5">
            {{ $vehiculos->links() }}
        </div>
    </section>
    <script>
        document.getElementById('orden').addEventListener('change', function () {
            this.form.submit();
        });
    </script>
@endsection
