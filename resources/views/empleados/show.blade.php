<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empleados') }}
        </h2>
        <div class="mb-4">
            <a class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded"
                href="{{ URL::to('/employee/pdf'. $employee->id) }}">Export to PDF</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <p>Nombre: {{ $employee->nombre }}</p>
                <p>Email: {{ $employee->email }}</p>
                <p>Teléfono: {{ $employee->phone_number }}</p>
                <p>Fecha: {{ $employee->dob }}</p>
                <p>Dirección: {{ $employee->address }}</p>
                <a class="bg-yellow-500 hover:bg-yellow-800 text-white font-bold py-2 px-4 rounded"
                                    href="{{ URL::to('/employee/pdf/'. $employee->id ) }}">PDF</a>
                                    
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <div class="d-flex justify-content-end mb-4">
            <p>Copyright 2021</p>
        </div>
    </x-slot>

</x-app-layout>