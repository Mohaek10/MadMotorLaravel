<?php use App\Models\Pieza?>
@extends('main')
@section('content')

    <div
        class="min-w-screen h-screen animated fadeIn faster bg-gray-700  fixed  left-0 top-0 flex justify-center items-center inset-0  outline-none focus:outline-none bg-no-repeat bg-center bg-cover"
        id="modal-id">
        {!! $piezas->links()  !!}
        @foreach($piezas as $pieza)
            <div class="relative min-h-screen flex flex-col items-center justify-center grid- grid-col-3 ">
                <div class="container">
                    <div class="max-w-md w-full bg-gray-900 shadow-lg rounded-xl p-6">
                        <div class="flex flex-col ">
                            <div class="">
                                <div class="relative h-62 w-full mb-3">
                                    <div class="absolute flex flex-col top-0 right-0 p-3">
                                        <button
                                            class="transition ease-in duration-300 bg-gray-800  hover:text-purple-500 shadow hover:shadow-md text-gray-500 rounded-full w-8 h-8 text-center p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    @if ($pieza->imagen != Pieza::$IMAGE_DEFAULT)
                                        <img src="{{ asset('storage/'.$pieza->imagen) }}"
                                             class="img-sm border"
                                             alt="pieza">
                                    @else
                                        <img src="{{ $pieza->imagen }}" class="img-sm border"
                                             alt="pieza">
                                    @endif
                                </div>
                                <div class="flex-auto justify-evenly">
                                    <div class="flex flex-wrap ">
                                        <div class="w-full flex-none text-sm flex items-center text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 mr-1"
                                                 viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <span
                                                class="text-gray-400 whitespace-nowrap mr-3">{{value:rand(2,5)}}</span><span
                                                class="mr-2 text-gray-400">MadMotor</span>
                                        </div>
                                        <div class="flex items-center w-full justify-between min-w-0 ">
                                            <h2 class="text-lg mr-auto cursor-pointer text-gray-200 hover:text-purple-500 truncate ">
                                                {{$pieza->nombre}}</h2>
                                            @auth()
                                                @if(Auth::user()->role === 'admin')
                                                    <form action="{{ route('piezas.destroy', $pieza->id) }}"
                                                          method="POST"
                                                          class="formBorrar">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$pieza->id}}" class="inline-flex items-center justify-center space-x-2 py-1 px-4 border border-transparent text-sm font-medium rounded text-white-600 hover:text-white-700 bg-red-400 hover:bg-green-100 transition-colors">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"/>
                                                            </svg>
                                                            <div>Eliminar</div>
                                                        </button>

                                                    </form>

                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                    <div class="text-xl text-white font-semibold mt-1">{{$pieza->precio}}€</div>
                                    <div
                                        class="text-xl text-white font-semibold mt-1">{{$pieza->categoria->nombre}}</div>

                                    <div class="lg:flex  py-4  text-sm text-gray-600">
                                        <div class="flex-1 inline-flex items-center  mb-3">
                                            <div class="w-full flex-none text-sm flex items-center text-gray-600">
                                                <ul class="flex flex-row justify-center items-center space-x-2">
                                                    <li class="">
                        <span
                            class="block p-1 border-2 border-gray-900 hover:border-blue-600 rounded-full transition ease-in duration-300">
                          <a href="#blue" class="block w-3 h-3 bg-blue-600 rounded-full"></a>
                        </span>
                                                    </li>
                                                    <li class="">
                        <span
                            class="block p-1 border-2 border-gray-900 hover:border-yellow-400 rounded-full transition ease-in duration-300">
                          <a href="#yellow" class="block w-3 h-3  bg-yellow-400 rounded-full"></a>
                        </span>
                                                    </li>
                                                    <li class="">
                        <span
                            class="block p-1 border-2 border-gray-900 hover:border-red-500 rounded-full transition ease-in duration-300">
                          <a href="#red" class="block w-3 h-3  bg-red-500 rounded-full"></a>
                        </span>
                                                    </li>
                                                    <li class="">
                        <span
                            class="block p-1 border-2 border-gray-900 hover:border-green-500 rounded-full transition ease-in duration-300">
                          <a href="#green" class="block w-3 h-3  bg-green-500 rounded-full"></a>
                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="flex space-x-2 text-sm font-medium  justify-content-center">
                                        @if(auth()->user())
                                            <a href="{{route('carrito.add', ['id' => $pieza->id, 'type' => 'pieza'])}}"
                                                class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-purple-500 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-purple-600 ">
                                                <span>Añadir al carrito</span>
                                            </a>
                                        @endif
                                        <a href="{{route('piezas.show',$pieza->id)}}">
                                            <button
                                                class="transition ease-in duration-300 bg-gray-700 hover:bg-gray-800 border hover:border-gray-500 border-gray-700 hover:text-white  hover:shadow-lg text-gray-400 rounded-full w-9 h-9 text-center p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </button>

                                        </a>
                                        @auth()
                                            @if(Auth::user()->role === 'admin')
                                                <a href="{{route('piezas.edit',$pieza->id)}}">
                                                    <button
                                                        class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-blue-500 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-blue-600 ">
                                                        <span>Editar</span>
                                                    </button>
                                                </a>
                                            @endif
                                        @endauth


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        @auth()
            @if(Auth::user()->role === 'admin')
                <a href="{{route('piezas.create')}}">
                    <button
                        class="inline-flex items-center justify-center space-x-2 border border-transparent text-sm font-medium rounded-full w-12 h-12 text-white bg-green-600 hover:bg-green-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>

                    </button>
                </a>

            @endif
        @endauth


    </div>
    @foreach ($piezas as $pieza)
        <div class="modal fade " id="exampleModal{{$pieza->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$pieza->id}}" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content bg-secondary text-white">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel{{$pieza->id}}">¿Desea borrar esta pieza?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('piezas.destroy', $pieza->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Sí, borrar</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
