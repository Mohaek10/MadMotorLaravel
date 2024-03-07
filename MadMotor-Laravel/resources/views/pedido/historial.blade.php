@extends('main')

@section('content')
    <section class="bg-gray-900 font text-white pt-5 h-screen">
        <div class="container mx-auto">
            <div class=" justify-center items-center h-screen p-5 text-white">
                <h1 class="text-4xl font-bold mb-8 pt-5">Historial de Pedidos</h1>
                <table class="w-full table-auto">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">ID del Pedido</th>
                        <th class="px-4 py-2">Fecha del Pedido</th>
                        <th class="px-4 py-2">Dirección de Entrega</th>
                        <th class="px-4 py-2">Total del Pedido</th>
                        <th class="px-4 py-2">Estado del Pedido</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td class="border px-4 py-2">{{ $pedido->id }}</td>
                            <td class="border px-4 py-2">{{ date_format($pedido->created_at, 'd-m-y') }}</td>
                            <td class="border px-4 py-2">{{ $pedido->direccion }}</td>
                            <td class="border px-4 py-2">{{ $pedido->total }}</td>
                            <td class="border px-4 py-2">{{ $pedido->estado }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="flex justify-center py-4 bg-gray-800">
                    <a href="{{route('cliente.perfil', $pedidos->first()->idCliente )}}"
                       class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded-lg mr-2">Volver</a>
                    <a href="{{route('pedido.historial.download')}}">
                        <div class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-2 rounded-lg">
                            Imprimir
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
