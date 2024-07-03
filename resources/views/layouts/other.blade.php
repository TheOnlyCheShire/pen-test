<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>@yield('title')</title>
            @vite(['resources/js/app.js'])
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body class="d-flex flex-column min-vh-100">

            @hasSection('header')
                <header>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        @yield('header')
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav ms-auto">
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">{{ Auth::user()->first_name }} {{ Auth::user()->second_name }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-link nav-link">Выйти</button>
                                        </form>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </nav>
                </header>
            @endif

            <main class="flex-grow-1 d-flex justify-content-center align-items-center">
                <div class="container text-center">
                    @yield('content')
                </div>
            </main>

            <footer class="d-flex justify-content-center py-3 mt-auto">
                <p>@yield('footer')</p>
            </footer>
            @stack('scripts')
        </body>
    </html>