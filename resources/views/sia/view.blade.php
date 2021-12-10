<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $employee['nombres'] }} #{{ $employee['datos_usuario']['nro'] }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="grid grid-cols-4 gap-4 lg:max-w-7xl max-w mx-auto px-6 lg:px-8">

            <div class="col-span-2 bg-white overflow-hidden shadow-sm p-5 mb-4 border-1 border-gray-300 rounded-lg">
                <h3 class="text-xl font-bold">Datos Cliente</h3>
                <p><strong>ID:</strong>{{ $employee['datos_usuario']['id'] }}</p>
                <p><strong>Nombres:</strong> {{ $employee['nombres_aux'] }}</p>

                <p><strong>Junta Vecinal:</strong> {{ $employee['junta_vecinal'] }}</p>
                <p>{{ $employee['texto_pie_izquierdo'] }}</p>
                <p><strong>Dirección:</strong> {{ $employee['direccion'] }}</p>
                <p><strong>CUIT: </strong>{{ $employee['datos_usuario']['nombres'] }}</p>
                <p><strong>Designación Catastral: </strong>
                    ${{ $employee['datos_usuario']['designacion_catastral'] }}
                </p>

            </div>

            <div class="col-span-2 bg-white overflow-hidden shadow-sm p-5 mb-4 border-1 border-gray-300 rounded-lg">

                <h3 class="text-xl font-bold">Datos Liquidación</h3>
                <ul>
                    <li> <strong>Periodo: </strong> {{ $employee['datos_liquidacion']['perdiodo'] }}</li>
                    <li> <strong>Comprobante: </strong> {{ $employee['datos_liquidacion']['comprobante'] }}</li>
                    <li> <strong>Proximo Vencimiento: </strong> {{ $employee['datos_liquidacion']['prox_vencimiento'] }}
                    </li>
                    <li> <strong>Lecturas: </strong>
                        <ul class="ml-4">
                            <li><strong>Anterior: </strong>
                                Fecha: {{ $employee['datos_liquidacion']['lecturas']['anterior']['fecha'] }} - Consumo:
                                {{ $employee['datos_liquidacion']['lecturas']['anterior']['consumo'] }}</li>
                            <li><strong>Actual: </strong>
                                Fecha: {{ $employee['datos_liquidacion']['lecturas']['actual']['fecha'] }} - Consumo:
                                {{ $employee['datos_liquidacion']['lecturas']['actual']['consumo'] }}</li>
                            <li><strong>Consumo: </strong>
                                {{ $employee['datos_liquidacion']['lecturas']['consumo'] }}
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>

            <div class="col-span-2 bg-white overflow-hidden shadow-sm p-5 mb-4 border-1 border-gray-300 rounded-lg">

                <h3 class="text-xl font-bold">Detalle Liquidación</h3>
                <ul>
                    @foreach ($employee['detalle_liquidacion'] as $detalle )
                    <li>{{ $detalle['concepto'] }}: {{ $detalle['importe'] }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="col-span-2 bg-white overflow-hidden shadow-sm p-5 mb-4 border-1 border-gray-300 rounded-lg">

                <h3 class="text-xl font-bold">Datos Talón Liquidación</h3>
                <ul>
                    @foreach ($employee['detalle_liquidacion'] as $detalle )
                    <li>{{ $detalle['concepto'] }}: {{ $detalle['importe'] }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="col-span-4">
                <a class="bg-yellow-500 hover:bg-yellow-800 text-white font-bold py-2 px-4 rounded "
                    href="{{ URL::to('/employee/pdf/'. $employee['datos_usuario']['id'] ) }}">PDF</a>
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <div class="d-flex justify-content-end mb-4">
            <p>Copyright 2021</p>
        </div>
    </x-slot>

</x-app-layout>