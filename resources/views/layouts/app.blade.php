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
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Ni Bootstrap untuk front end --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Ni kita create external css sendiri ade di public ext.css --}}
    <link rel="stylesheet" href="{{ asset('ext.css') }}">
    <link rel="stylesheet" href="{{ asset('dycalendar.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    {{-- <a class="dropdown-item" href="">Admin</a> --}}

                                    @can('isAdmin')
                                        <a class="dropdown-item" href="/AdminManage/admin">Admin </a>
                                        <a class="dropdown-item" href="/AdminManage/editor">Club Admin</a>
                                        <a class="dropdown-item" href="/AdminManage/student">Student </a>
                                        <a class="dropdown-item" href="/AdminManage/club">Club</a>
                                    @endcan

                                    @can('isUser')
                                        <a class="dropdown-item" href="/StudentManage/joinclub">Club</a>
                                    @endcan

                                    @can('isEditor')
                                        <a class="dropdown-item" href="/EditorManage/event">Club</a>
                                        <a class="dropdown-item" href="/EditorManage/joinclub">Join club </a>
                                        <a class="dropdown-item" href="/EditorManage/attendance">Join event </a>
                                    @endcan

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link">Uniten Sport Club</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('dycalendar.js') }}"></script>
    <script>
        dycalendar.draw({
            target: '#dycalendar',
            type: 'month',
            highlighttargetdate: true,
            prevnextbutton: 'show'
        })
    </script>
</body>

</html>
