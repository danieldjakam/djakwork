<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Djakwork') }} | trouver facilement le job.</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            [x-cloak]{
                display: none;
            }
        </style>
        <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
        @livewireStyles
    </head>
    <body>
        <div class="container mx-auto px-4">
            @include('partials.navbar')
            <livewire:flash/>
            @yield('content')
        </div>
      @livewireScripts
    </body>
</html>
