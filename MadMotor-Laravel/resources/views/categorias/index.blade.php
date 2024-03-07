@php use App\Models\Categoria; @endphp
@extends('main')
@section('title', 'Categorías')
@section('content')
    <section class="bg-gray-900 font text-white">
        <div class="container rounded-4 pt-5 shadow-lg bg-gray-700 ">
            <div class="container mx-auto pt-20 mt-5">
                <h1 class="text-3xl font-bold ">Categorías</h1>
                <form action="{{ route('categorias.index') }}" class="mb-1" method="get">
                    @csrf
                    <div class="container mx-auto pt-20 mt-5">
                        <input type="text" class="form-control" id="search" name="search">
                        <div>
                            <button class="bg-black rounded-lg text-white text-lg text-center self-center px-4 py-2 my-2 mx-2"
                                    style="background-color: #000; border-radius: 8px;
                             color: #fff; font-size: 14px; padding: 10px 20px;
                              transition: background-color 0.3s ease-in-out;"
                                    onmouseover="this.style.backgroundColor='#333'"
                                    onmouseout="this.style.backgroundColor='#000'"
                                    type="submit">
                                Buscar
                            </button>
                        </div>
                    </div>
                </form>

                @if(count($categorias) > 0)
                    <div class="categoria-container" >
                        @foreach($categorias as $categoria)
                            <div class="card-categoria mb-3 rounded-lg" style="border: 2px solid white; padding: 10px;">
                                @if($categoria->isDeleted)
                                    <h2 class="text-[25px]">{{ $categoria->nombre }} - Borrado Lógico</h2>
                                @else
                                    <h2 class="text-[25px]">{{ $categoria->nombre }} - Activo</h2>
                                @endif

                                <div class="categoria-actions">
                                    <a href="{{ route('categorias.show', $categoria->id) }}">
                                        <button class="bg-blue-700 rounded-lg text-white text-lg
                                text-center self-center px-4 py-2 my-2 mx-2"
                                                style="transition: background-color 0.3s ease-in-out;"
                                                onmouseover="this.style.backgroundColor='#4d4fff'"
                                                onmouseout="this.style.backgroundColor='#1d4ed8'">
                                            Detalles
                                        </button>
                                    </a>

                                    <a href="{{ route('categorias.edit', $categoria->id) }}">
                                        <button class="bg-yellow-400 rounded-lg text-black text-lg
                                 text-center self-center px-4 py-2 my-2 mx-2"
                                                style="transition: background-color 0.3s ease-in-out;"
                                                onmouseover="this.style.backgroundColor='#ffd43b'"
                                                onmouseout="this.style.backgroundColor='#facc15'">
                                            Editar
                                        </button>
                                    </a>


                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST"
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-700 rounded-lg text-white text-lg
                                 text-center self-center px-4 py-2 my-2 mx-2"
                                                style="transition: background-color 0.3s ease-in-out;"
                                                onmouseover="this.style.backgroundColor='#ff4444'"
                                                onmouseout="this.style.backgroundColor='#b91c1c'"
                                                onclick="return confirm('Vas a eliminar una categoria, ¿Estas seguro?')"
                                                type="submit">
                                            Eliminar
                                        </button>

                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">No se han encontrado categorías</div>
                @endif

                <br/>
                <div class="pagination-container">
                    {{ $categorias->links('pagination::bootstrap-4') }}
                </div>



                <a class="btn btn-success rounded-lg text-lg mt-7 mb-3" href="{{ route('categorias.create') }}">Crear Nueva Categoría</a>



            </div>
        </div>
    </section>
@endsection
