@php use App\Models\Personal; @endphp

@extends('main')

@section('title', 'Crear Personal')

@section('content')

    <div class="bg-gray-900 text-white mt-5">
        <section>
            <div class="container">
                <div class="section-title">
                    <h2>Crear Personal</h2>
                </div>

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
                <div class="d-flex justify-content-center">
            <form action="{{ route("personal.store") }}" method="post">
                @csrf
                @method('POST')
                <div class="form-group mt-5">
                    <label for="nombre">Nombre:</label>
                    <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" required>
                </div>
                <div class="form-group mt-3">
                    <label for="puesto">Apellidos:</label>
                    <input class="form-control" id="apellidos" name="apellidos" type="text" placeholder="Apellidos" required>
                </div>
                <div class="form-group mt-3">
                    <label for="puesto">Fecha de Nacimiento:</label>
                    <input class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" type="text" placeholder="dd/mm/aaaa" required>
                </div>
                <div class="form-group mt-3">
                    <label for="puesto">DNI:</label>
                    <input class="form-control" id="dni" name="dni" type="text" placeholder="12345678X" required>
                </div>
                <div class="form-group mt-3">
                    <label for="puesto">Dirección:</label>
                    <input class="form-control" id="direccion" name="direccion" type="text" placeholder="Direccion" required>
                </div>
                <div class="form-group mt-3">
                    <label for="puesto">Teléfono:</label>
                    <input class="form-control" id="telefono" name="telefono" type="text" placeholder="666666666" required>
                </div>
                <div class="form-group mt-3">
                    <label for="puesto">Sueldo:</label>
                    <input class="form-control" id="sueldo" name="sueldo" type="text" placeholder="Sueldo" required>
                </div>
                <div class="form-group mt-3">
                    <label for="puesto">IBAN:</label>
                    <input class="form-control" id="iban" name="iban" type="text" placeholder="ES000000000000000000" required>
                </div>
                <div class="form-group mt-3">
                    <label for="puesto">Email:</label>
                    <input class="form-control" id="email" name="email" type="text" placeholder="email@email.com" required>
                </div>
                <div class="form-group mt-3">
                    <label for="puesto">Contraseña:</label>
                    <input class="form-control" id="password" name="password" type="text" placeholder="Password" required>
                </div>
                <div class="form-group mt-3 col-5">
                    <label for="puesto">Rol:</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="Admin">Admin</option>
                        <option value="Personal">Personal</option>
                    </select>
                </div>
                <!--Botones-->
                <div class="botones mt-4">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <a class="btn btn-secondary mx-2" href="{{ route('personal.search') }}">Volver</a>
                </div>
                <!--Fin Botones-->
            </form>
                </div>
        </div>
        </section>
    </div>

@endsection
