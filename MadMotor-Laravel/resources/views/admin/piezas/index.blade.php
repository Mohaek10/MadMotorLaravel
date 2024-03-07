@php use App\Models\Pieza; @endphp

@extends('main')

@section('title', 'peizas')

@section('content')


    <section id="team" class="team bg-gray-900">
        <div class="container">
            <div class="section-title">
                <span>Personal</span>
                <h2>Personal</h2>e
            </div>
            <
            <div class="row mt-5 justify-content-end">
                <div class="col-lg-6">
                    <form action="{{ route('piezas.adminIndex') }}" method="GET" class="d-flex justify-content-end">
                        <input type="text" class="form-control bg-secondary text-white me-2" placeholder="Buscar..." id="search" name="search">
                        <button class="btn btn-secondary" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="row mt-3">

                @foreach($piezas as $peiza)
                    <div class="col-lg-3 mt-5">
                        <a href="{{ route( 'piezas.adminShow', $peiza->id) }}">
                            <div class="card bg-secondary" style="width: 18rem;">
                                @if( $peiza->imagen != Pieza::$IMAGE_DEFAULT)
                                    <img src="{{ asset('storage/' . $peiza->imagen) }}" class="card-img-top" alt="...">
                                @else
                                    <img src="https://th.bing.com/th/id/OIP.KfJHc987dlOGUVkAhwwcGAHaE8?rs=1&pid=ImgDetMain" class="card-img-top" alt="...">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title text-white">{{ $peiza->nombre }}</h5>
                                    <p class="card-text text-white">{{ $peiza->precio }}</p>
                                    <p class="card-text text-white">{{ $peiza->descripcion }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{ $piezas->links() }}
        </div>
    </section>

@endsection


