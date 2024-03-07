@extends('main')

@section('title', 'Vehículos - Panel de Administración')

@section('content')
    <section class="bg-gray-900 font text-white">
        <div class="container rounded-4 pt-5 mt-3 shadow-lg bg-gray-700 ">
            <h1 class="text-3xl text-center font-bold mt-5">Listado de Vehículos</h1>
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                    <h2 class="text-2xl">Errores</h2>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-200">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('vehiculos.adminIndex') }}" method="GET" class="mb-6">
                <div class="flex items-center">
                    <input type="text" name="marca" placeholder="Buscar por marca"
                           class="border border-gray-300 px-4 py-2 rounded-lg mr-4 focus:outline-none focus:border-indigo-500">
                    <button type="submit"
                            class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">
                        Buscar
                    </button>
                    <!-- Create button -->
                    <a href="{{ route('vehiculos.create') }}"
                       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg ml-auto">Crear
                        Vehículo</a>
                </div>
            </form>

            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">Marca</th>
                        <th class="px-4 py-2">Modelo</th>
                        <th class="px-4 py-2">Año</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($vehiculos as $vehiculo)
                        <tr>
                             <td class="border px-4 py-2">{{ $vehiculo->marca }}</td>
                            <td class="border px-4 py-2">{{ $vehiculo->modelo }}</td>
                            <td class="border px-4 py-2">{{ $vehiculo->year }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('vehiculos.edit', $vehiculo->id) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg mr-2">Editar</a>
                                <a href="{{ route('vehiculos.show', $vehiculo->id) }}"
                                   class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-lg mr-2">Ver
                                    detalles</a>
                                   <a class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                            data-id="{{ $vehiculo->id }}">Eliminar Vehiculo </a>


                            </td>
                        </tr>
                        <div class="modal fade text-dark" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Eliminar Vehiculo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de que quieres eliminar este Vehiculo?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn text-white bg-gray-800" data-bs-dismiss="modal">Cancelar
                                        </button>
                                        <form action="{{ route('vehiculos.destroy', $vehiculo->id )  }}" id="deleteForm"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn  text-white bg-red-800">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
                {{ $vehiculos->links()}}
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $('.btn-danger').on('click', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#deleteForm').attr('action', '/vehiculos/admin/' + id + '/delete/vehiculo');
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection
