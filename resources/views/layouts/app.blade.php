<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light bg_nav shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo_laravel">
                        <img width="150" src="/img/logobool.png" alt="">
                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

            
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>

<style lang="scss">
   
    *{
        font-family: 'Unbounded' 
    }
    .bg_nav {
        background-color: #ff9e45;;
    }
    
    .add_shadow {
        box-shadow: red 0 0 10px 0;
    }
    
    a {
        padding: 0.5rem !important;
        font-family: 'Unbounded', cursive;
        border-radius: 5px;
        transition: 0.5s;    
    }
    a:hover {
            color: #f5612c !important;
            background-color: #f1f1f1;
            font-family: 'Unbounded', cursive;
            border-radius: 5px;
    }
    
    </style>
