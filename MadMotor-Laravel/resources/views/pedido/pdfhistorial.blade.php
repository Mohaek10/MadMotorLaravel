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
            <h1>Historial de Pedidos</h1>
            <table>
                <thead>
                <tr>
                    <th>ID del Pedido</th>
                    <th>Fecha del Pedido</th>
                    <th>Dirección de Entrega</th>
                    <th>Total del Pedido</th>
                    <th>Estado del Pedido</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ date_format($pedido->created_at, 'd-m-y') }}</td>
                        <td>{{ $pedido->direccion }}</td>
                        <td>{{ $pedido->total }}</td>
                        <td>{{ $pedido->estado }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <footer>
        <h1> Gracias por confiar en nosotros</h1>
    </footer>

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
