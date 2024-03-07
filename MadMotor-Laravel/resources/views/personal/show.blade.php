@php
    use App\Models\Personal;
@endphp

@extends('main')

@section('title', 'Mostrar Personal')

@section('content')
    <div class="bg-gray-900 text-white">
        <section>
            < class="container">
            <div class="section-title">
                <h2>Detalles Personal</h2>
            </div>

            <div class="form-group mt-5">
                <dl class="row">
                    <dt class="col-sm-3">ID:</dt>
                    <dd class="col-sm-9">{{ $personal->id }}</dd>

                    <dt class="col-sm-3">Nombre:</dt>
                    <dd class="col-sm-9">{{ $personal->nombre }}</dd>

                    <dt class="col-sm-3">Apellidos:</dt>
                    <dd class="col-sm-9">{{ $personal->apellidos }}</dd>

                    <dt class="col-sm-3">Fecha de Nacimiento:</dt>
                    <dd class="col-sm-9">{{ $personal->fecha_nacimiento }}</dd>

                    <dt class="col-sm-3">DNI:</dt>
                    <dd class="col-sm-9">{{ $personal->dni }}</dd>

                    <dt class="col-sm-3">Dirección:</dt>
                    <dd class="col-sm-9">{{ $personal->direccion }}</dd>

                    <dt class="col-sm-3">Teléfono:</dt>
                    <dd class="col-sm-9">{{ $personal->telefono }}</dd>

                    <dt class="col-sm-3">Sueldo:</dt>
                    <dd class="col-sm-9">{{ $personal->sueldo }} {{ '€' }}</dd>

                    <dt class="col-sm-3">IBAN:</dt>
                    <dd class="col-sm-9">{{ $personal->iban }}</dd>

                    <dt class="col-sm-3">Email:</dt>
                    <dd class="col-sm-9">{{ $personal->email }}</dd>

                    <dt class="col-sm-3">Rol:</dt>
                    <dd class="col-sm-9">{{ $personal->role }}</dd>
                </dl>
            </div>
            <!--Botones-->
            <div class="botones d-flex mt-5">
                <div class="form-group mx-2">
                    <a class="btn btn-secondary" href="{{ route('personal.search') }}">Volver</a>
                </div>
                <div class="form-group mx-2">
                    <a class="btn btn-black text-white border-white" href="{{ route('personal.edit', $personal->id) }}">Editar</a>
                </div>
                <form action="{{ route('personal.destroy', $personal->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="form-group mx-2">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $personal->id }}" class="btn btn-danger" href="{{ route('personal.search') }}">Borrar
                        </button>
                    </div>
                </form>
                <!--Fin Botones-->
                <div class="modal fade" id="exampleModal{{$personal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$personal->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-gray-900 text-white">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel{{$personal->id}}">¿Desea borrar este emplead@?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('personal.destroy', $personal->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Sí, borrar</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
