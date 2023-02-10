<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 d-flex align-items-center ps-5"
                href="{{ url('/') }}"> <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path
                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                </svg>
                Home page</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav me-5">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3 d-flex align-items-center" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-power me-1" viewBox="0 0 16 16">
                            <path d="M7.5 1v7h1V1h-1z" />
                            <path
                                d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                        </svg>Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </header>

        <main class="col-md-9 ms-sm-auto col-lg-10">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            @if (Auth::user()->restaurants)
                                <a class="nav-link {{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : '' }}"
                                    href="{{ url('admin') }}">{{ __('Dashboard') }}</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (Auth::user()->restaurants && Auth::id() != 1)
                                <a class="nav-link {{ Route::currentRouteName() === 'admin.plates.index' ? 'active' : '' }}"
                                    href="{{ url('admin/plates') }}">{{ __('Plates') }}</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (Auth::user()->restaurants && Auth::id() != 1)
                                <a class="nav-link {{ Route::currentRouteName() === 'admin.orders.index' ? 'active' : '' }}"
                                    href="{{ url('admin/orders') }}">{{ __('Orders') }}</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (Auth::id() === 1)
                                <a class="nav-link {{ Route::currentRouteName() === 'admin.types.index' ? 'active' : '' }}"
                                    href="{{ url('admin/types') }}">{{ __('Types') }}</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            @if (!Auth::user()->restaurants)
                                <a class="nav-link {{ Route::currentRouteName() === 'admin.restaurants.create' ? 'active' : '' }}"
                                    href="{{ url('admin/restaurants/create') }}">{{ __('Add Restaurant') }}</a>
                            @endif
                        </li>
                        <li class="nav-item">

                            @if (Auth::user()->restaurants && Auth::id() != 1)
                                <a class="nav-link {{ Route::currentRouteName() === 'admin.restaurants.edit' ? 'active' : '' }}"
                                    href="{{ route('admin.restaurants.edit', Auth::user()->restaurants['slug']) }}">{{ __('Restaurant Info') }}</a>
                            @endif

                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content')
        </main>
    </div>
</body>

</html>
