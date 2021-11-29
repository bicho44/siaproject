<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-header-html />
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <x-header :header="$header"/>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            
            <x-footer />
        </div>
    </body>
</html>
