@php use App\Models\Categoria; @endphp
@extends('main')
@section('title', 'Editar categoría')

@section('content')
    <section class="bg-gray-900 font text-white">
        <div class="container rounded-4 pt-5 shadow-lg bg-gray-700 h-screen">
            <div class="container mx-auto pt-20 mt-5">
                <h1 class="text-3xl font-bold mb-3">Editar Categoría</h1>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br/>
                @endif

                <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categoria->nombre }}">
                    </div>

                    <button class="bg-blue-700 rounded-lg text-white text-lg
                                text-center self-center px-4 py-2 my-2 mx-2"
                            style="transition: background-color 0.3s ease-in-out;"
                            onmouseover="this.style.backgroundColor='#4d4fff'"
                            onmouseout="this.style.backgroundColor='#1d4ed8'"
                            type="submit">
                        Actualizar
                    </button>
                    <a href="{{ route('categorias.index') }}" class="btn btn-secondary self-center rounded-lg text-lg
            px-4 py-2 my-2 mx-2">
                        Cancelar
                    </a>
                </form>
            </div>
        </div>
    </section>
@endsection

