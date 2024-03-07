<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2f1c2e;
            color: white;
            text-align: center;
            line-height: 30px;
        }
        h2{
            color: #1a202c;
            font-size: 18px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2f1c2e;
            color: white;
            text-align: center;
            line-height: 35px;
        }
    </style>
</head>
<body>
<main>
    <header>
        <h1>MADMOTOR </h1>
        <h2> C/ La Mancha, 1, 28915 Leganés, Madrid</h2>
    </header>
    <section>

        <div>
            <h1>Pedido Confirmado</h1>
            <p>Gracias por tu compra, {{ $pedido->cliente->nombre }}!</p>
            <p>Tu pedido ha sido confirmado y está siendo procesado. Te enviaremos un correo
                electrónico
                con la información de seguimiento una vez que tu pedido sea enviado.</p>
            <div>
                <h2>Detalles del Pedido</h2>
                <ul>
                    <li>Número de pedido: {{ $pedido->id }}</li>
                    <li>Fecha: {{ $pedido->created_at->format('d/m/Y') }}</li>
                    <li>Total: {{ $pedido->total }} €</li>
                    <li>Dirección de envío: {{ $pedido->direccion }}</li>
                    <li>Estado: {{ $pedido->estado }}</li>
                </ul>
            </div>
            <div>
                <h2>Productos Comprados</h2>
                <table>
                    <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pedido->lineasDePedido as $linea)
                        <tr>
                            <td>
                                @if ($linea->idVehiculo)
                                    {{ $linea->vehiculo->marca }}
                                @else
                                    {{ $linea->pieza->nombre }}
                                @endif
                            </td>
                            <td>
                                @if ($linea->idVehiculo)
                                    {{ $linea->cantidadVehi }}
                                @else
                                    {{ $linea->cantidadPieza }}
                                @endif
                            </td>
                            <td>
                                @if ($linea->idVehiculo)
                                    {{ $linea->precioVehiculo }} €
                                @else
                                    {{ $linea->precioPieza }} €
                                @endif
                            </td>
                            <td>
                                {{ $linea->totalLinea }} €
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>
        <footer>
            <h1> Gracias por confiar en nosotros</h1>
        </footer>
    </section>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>


    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 730, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>
</main>


</body>
</html>
