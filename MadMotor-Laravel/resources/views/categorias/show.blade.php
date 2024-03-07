@php use App\Models\Categoria; @endphp
@extends('main')
@section('title', 'Detalles Categoría')
@section('content')
    <section class="bg-gray-900 font text-white">
        <div class="container rounded-4 pt-5 shadow-lg bg-gray-700 h-screen">
            <div class="container mx-auto pt-20 mt-5">
                <h1 class="text-3xl font-bold mb-3">Detalles</h1>
                <div class="card text-black">
                    <div class="card-body">
                        <h5 class="card-title">{{ $categoria->nombre }}</h5>
                        <br/>
                        <p class="card-text">Fecha de creación: {{ $categoria->created_at }}</p>
                    </div>
                </div>

                <br/>

                <a href="{{ route('categorias.index') }}">
                    <button class="bg-blue-700 rounded-lg text-white text-lg
                                text-center self-center px-4 py-2 my-2 mx-2"
                            style="transition: background-color 0.3s ease-in-out;"
                            onmouseover="this.style.backgroundColor='#4d4fff'"
                            onmouseout="this.style.backgroundColor='#1d4ed8'">
                        Volver
                    </button>
                </a>
            </div>
        </div>
    </section>
@endsection
