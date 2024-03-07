@extends('main')
@section('title', 'Confirmación de compra')
@section('content')
    <main>
        <section class="bg-gray-900 font ">

            <div class="container rounded-4 pt-5 shadow-lg bg-gray-700 ">
                <h1 class="text-2xl font-bold mb-4 pt-5 text-white">Pedido Confirmado</h1>
                <p class="text-lg mb-4 text-white">Gracias por tu compra, {{ $pedido->cliente->nombre }}!</p>
                <p class="mb-4 text-white">Tu pedido ha sido confirmado y está siendo procesado. Te enviaremos un correo
                    electrónico
                    con la información de seguimiento una vez que tu pedido sea enviado.</p>
                <div class="bg-white shadow-sm rounded p-4 mb-4">
                    <h2 class="text-xl font-bold mb-2">Detalles del Pedido</h2>
                    <ul class="list-disc">
                        <li>Número de pedido: {{ $pedido->id }}</li>
                        <li>Fecha: {{ $pedido->created_at->format('d/m/Y') }}</li>
                        <li>Total: {{ $pedido->total }} €</li>
                        <li>Dirección de envío: {{ $pedido->direccion }}</li>
                        <li>Estado: {{ $pedido->estado }}</li>
                    </ul>
                </div>
                <div class="bg-white shadow-sm rounded p-4">
                    <h2 class="text-xl font-bold mb-2">Productos Comprados</h2>
                    <table class="w-full table-auto">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Producto</th>
                            <th class="px-4 py-2">Cantidad</th>
                            <th class="px-4 py-2 text-right">Precio</th>
                            <th class="px-4 py-2 text-right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($pedido->lineasDePedido as $linea)
                            <tr>
                                <td class="px-4 py-2">
                                    @if ($linea->idVehiculo)
                                        {{ $linea->vehiculo->marca }}
                                    @else
                                        {{ $linea->pieza->nombre }}
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-center">
                                    @if ($linea->idVehiculo)
                                        {{ $linea->cantidadVehi }}
                                    @else
                                        {{ $linea->cantidadPieza }}
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-right">
                                    @if ($linea->idVehiculo)
                                        {{ $linea->precioVehiculo }} €
                                    @else
                                        {{ $linea->precioPieza }} €
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-right">
                                    {{ $linea->totalLinea }} €
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('pedido.historial') }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">Ver historial de
                    pedidos</a>
                <!-- Descargar pdf-->
                <a href="{{ route('pedido.download', $pedido->id)}}"
                   class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4">Descargar PDF</a>

            </div>
        </section>
    </main>
    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 730, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>

@endsection
