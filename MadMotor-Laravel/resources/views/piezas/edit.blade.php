@php use App\Models\Pieza; @endphp
@extends('main')
@section('content')
    <section class="max-w-4xl p-6 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-20 pt-20 mb-20">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        <h1 class="text-xl font-bold text-white capitalize dark:text-white">Edicion de Pieza </h1>
        <form action="{{ route('piezas.update', $pieza->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div class="form-group">
                    <label class="text-white dark:text-gray-200" for="nombre">Nombre</label>
                    <input class="form-control" name="nombre"  value="{{$pieza->nombre}}" type="text"
                           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div class="form-group">
                    <label class="text-white dark:text-gray-200" for="descripcion">Descripcion</label>
                    <input id="descripcion" name="descripcion" value="{{$pieza->descripcion}}" class="form-control"
                           placeholder="{{$pieza->descripcion}}" type="text"
                           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                <div class="form-group">
                    <label class="text-white dark:text-gray-200" for="precio" id="precio">Precio</label>
                    <input id="precio" class="form-control" name="precio"  value="{{$pieza->precio}}" type="number"
                           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div class="form-group">
                    <label class="text-white dark:text-gray-200" for="cantidad" id="cantidad">Cantidad</label>
                    <input id="cantidad" class="form-control" name="cantidad"  value="{{$pieza->cantidad}}"
                           type="number"
                           class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>


                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Select</label>
                    <select class="form-control" id="categoria_id" name="categoria_id"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        <option>Categoria</option>
                        @foreach($categorias as $categoria)
                            <option @if($pieza->categoria->id == $categoria->id) selected
                                    @endif value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>
            </div>
            <button class="btn btn-primary h-50 w-25 mt-3" type="submit">Actualizar</button>
            <a href="{{route('piezas.index')}}">
                <button class="btn btn-primary mt-3">Volver</button>
            </a>
            </div>
        </form>
    </section>
@endsection
