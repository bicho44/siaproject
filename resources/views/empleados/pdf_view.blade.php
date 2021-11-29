<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }}</title>

    {{-- <link href="{{ public_path('css/bootstrap.min.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        @page {
            /* top | horizontal | bottom */
            margin: 110px 30px 100px;
        }

        body {
            font-family: "Open Sans", Verdana, Geneva, Tahoma, sans-serif;
            position: relative;
        }

        table {
            font-size: .8rem;
        }

        header {
            position: fixed;
            left: 0;
            top: -70px;
            margin-bottom: 5px;
        }

        footer {
            position: fixed;
            left: 0;
            bottom: -70px;
            height: 90px;
            padding: 10px 0;
        }

        footer .pagina::after {
            content: counter(page);
            font-style: bold;
        }
    </style>

</head>

<body>
    <header class="bg-light mw-100 p-3 mb-2">
        <div class="logo">
            <h3>{{ $title ?? '[titulo]' }}</h3>
        </div>
    </header>
    <footer class="footer bg-light text-center">
        <!--<p>Página <span class="pagina"></span></p>-->
        <p class="copy">@Copyright 2021 - <a href="https://imgdigital.com.ar">IMGDigital</a></p>
        <script type="text/php">
            if (isset($pdf)) {
                

                    $text = "Página {PAGE_NUM} de {PAGE_COUNT}";
                    $font = $fontMetrics->get_font("Open Sans", "bold");
                    $size = 11;

                    $color = array(0,0,0); // negro
                    $word_space = 0.0;  //  default
                    $char_space = 0.0;  //  default
                    $angle = 0.0;   //  default

                    // Compute text width to center correctly
                    $textWidth = $fontMetrics->getTextWidth($text, $font, $size);

                    $x = ($pdf->get_width() - ($textWidth - 60)) / 2;
                    $y = $pdf->get_height() - 60;

                    $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);

               
            }
        </script>
    </footer>
    <div class="contenido">
        <table class="table table-bordered table-sm">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tel&eacute;fono</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($employee as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone_number }}</td>
                    <td>{{ $data->dob }}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>