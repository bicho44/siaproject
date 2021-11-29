<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table-auto border-collapse w-full">
                    <thead>
                        <tr style="" class="rounded-lg text-sm bg-gray-200 font-medium text-gray-700 text-left">
                            <th class="px-4 py-3 " scope="col">ID</th>
                            <th class="px-4 py-3 " scope="col">Nombre</th>
                            <th class="px-4 py-3 " scope="col">Email</th>
                            <th class="px-4 py-3 " scope="col">Tel&eacute;fono</th>
                            <th class="px-4 py-3 " scope="col">Fecha</th>
                            <th class="px-4 py-3" scope="col">Accion</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($employee ?? '' as $data)
                        <tr class="text-sm font-normal text-gray-800 border-b-1 border-gray-100 py-2">
                            <th class="border-b-2 border-gray-100 py-2" scope="row">{{ $data->id }}</th>
                            <td class="border-b-2 border-gray-100 py-2">{{ $data->name }}</td>
                            <td class="border-b-2 border-gray-100 py-2">{{ $data->email }}</td>
                            <td class="border-b-2 border-gray-100 py-2">{{ $data->phone_number }}</td>
                            <td class="border-b-2 border-gray-100 py-2">{{ $data->dob }}</td>
                            <td class="border-b-2 border-gray-100 py-2">
                                <a class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded"
                                    href="{{ URL::to('/employee/' . $data->id) }}">Ver</a>
                                <a class="bg-yellow-500 hover:bg-yellow-800 text-white font-bold py-2 px-4 rounded"
                                    href="{{ URL::to('/employee/pdf/' . $data->id) }}">PDF</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>