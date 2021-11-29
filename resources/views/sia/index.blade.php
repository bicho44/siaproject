<x-app-layout>
    <x-slot name="header" class="flex align-items">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex">
            {{ __('SIA WEB') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Bienvenidos a SIA
                </div>
            </div>
        </div>
    </div>

    <x-slot name="footer">
        <div class="d-flex justify-content-end mb-4">
            <p>IMGDigital - Copyright 2021</p>
        </div>
    </x-slot>

</x-app-layout>