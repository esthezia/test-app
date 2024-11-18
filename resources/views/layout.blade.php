<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />

    <title>{{ config('app.name') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="description" content="" />

    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="format-detection" content="address=no" />
    <meta http-equiv="cleartype" content="on" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
</head>
<body>
    <div class="container">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">{{ config('app.name') }}</span>
                </a>

                @auth
                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <div class="hidden fixed top-0 right-0 px-6 py-2">
                        <span class="me-3 py-2 text-dark text-decoration-none">Welcome, {{ auth()->user()->name }}!</span>
                        <a href="{{ route('logout') }}" class="me-3 py-2 text-dark text-decoration-none">&rsaquo; Logout</a>
                    </div>
                </nav>
                @endauth
            </div>
        </header>

        @auth
            @if (Request::is('app*'))
            <div class="row">
                <div class="col-md-3 col-lg-2 p-3 bg-light bd1">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{ route('app') }}" class="nav-link<?php echo Request::is('app') ? ' active' : ''; ?>">&rsaquo; Dashboard</a>
                        </li>
                        @if (Auth::user()->hasRole('user') || Auth::user()->hasRole('agent'))
                        <li class="nav-item">
                            <a href="{{ route('app.issues') }}" class="nav-link<?php echo Request::is('app/issues*') ? ' active' : ''; ?>">&rsaquo; Issues</a>
                        </li>
                        @endif
                        @if (Auth::user()->hasRole('admin'))
                        <li class="nav-item">
                            <a href="{{ route('app.users') }}" class="nav-link<?php echo Request::is('app/users*') ? ' active' : ''; ?>">&rsaquo; Users</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('app.reports') }}" class="nav-link<?php echo Request::is('app/reports*') ? ' active' : ''; ?>">&rsaquo; Reports</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </div>
            </div>
            @endif
        @endauth

        @if (!Request::is('app*'))
            @yield('content')
        @endif
    </div>
    <footer class="footer mt-auto py-3 fixed-footer bdt1">
        <div class="container">
            <span class="text-muted">{{ config('app.name') }} &copy; <?php echo date('Y'); ?></span>
        </div>
    </footer>

    <div class="modal fade" id="delete-confirmation" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancel</button>
                    <a href="#" class="btn btn-success">Yes, do it</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>
