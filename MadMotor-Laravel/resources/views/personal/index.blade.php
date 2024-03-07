@php use App\Models\Personal; @endphp

@extends('main')

@section('title', 'Personal')

@section('content')

    <!-- ======= Team Section ======= -->
    <section id="team" class="team bg-gray-900">
        <div class="container">
            <div class="section-title">
                <span>Personal</span>
                <h2>Personal</h2>e
            </div>
            <!--Buscador-->
            <div class="row mt-5 justify-content-end">
                <div class="col-lg-6">
                    <form action="{{ route('personal.search') }}" method="GET" class="d-flex justify-content-end">
                        <input type="text" class="form-control bg-secondary text-white me-2" placeholder="Buscar..." id="search" name="search">
                        <button class="btn btn-secondary" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            <!--Fin Buscador-->
            <!--Crear Personal-->
            <div class="row mt-3">
                <div class="col-lg-3 mt-5">
                    <a href="{{ route( 'personal.create') }}">
                        <div class="card bg-secondary" style="width: 18rem;">
                            <img src="https://cdn-icons-png.flaticon.com/512/25/25304.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="text-white">Crear nuevo personal</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <!--Fin Crear Personal-->
                <!--Listado Personal-->
                @foreach($personals as $personal)
                    <div class="col-lg-3 mt-5">
                        <a href="{{ route( 'personal.show', $personal->id) }}">
                        <div class="card bg-secondary" style="width: 18rem;">
                            <img src="https://cdn-icons-png.flaticon.com/512/868/868951.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-white">{{ $personal->nombre }} {{ $personal->apellidos }}</h5>
                                <p class="card-text"></p>
                                <a href="https://github.com" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
                                    </svg>
                                </a>
                                <a href="https://www.linkedin.com/" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{ $personals->links()}}
        </div>
    </section><!-- End Team Section -->

@endsection


