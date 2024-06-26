<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="{{ asset('resources/css/profile.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.ably.io/lib/ably.min-1.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        @vite('resources/css/app.css')
        {{-- モーダル --}}
        @livewireStyles
    </head>
    <body >
    

        <header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
           
        </nav>
    </header>

     <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</div>


@yield('content')
   </body>

</html>

