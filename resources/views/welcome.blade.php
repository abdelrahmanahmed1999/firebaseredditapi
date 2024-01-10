<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

        <!-- Modify these lines to include the package directly from node_modules -->
        <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                {{--<a class="navbar-brand" href="{{route('index.student')}}">Product</a>--}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>

                    <li>
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                            <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                    </li>
                </ul>

                </div>
            </div>
        </nav>
                @yield("list")

                @yield("content")

                @yield("about")

        <!-- Footer -->
        <footer class="text-center text-white" style="background-color: #3f51b5">
            <!-- Section: Social -->
            <section class="text-center">
                <a href="" class="text-white me-4">
                <i class="fa fa-facebook-f"></i>
                </a>
                <a href="" class="text-white me-4">
                <i class="fa fa-twitter"></i>
                </a>
                <a href="" class="text-white me-4">
                <i class="fa fa-google"></i>
                </a>
                <a href="" class="text-white me-4">
                <i class="fa fa-instagram"></i>
                </a>
                <a href="" class="text-white me-4">
                <i class="fa fa-linkedin"></i>
                </a>
                <a href="" class="text-white me-4">
                <i class="fa fa-github"></i>
                </a>
            </section>
            <!-- Section: Social -->

            <!-- Copyright -->
            <div
                class="text-center p-3"
                style="background-color: rgba(0, 0, 0, 0.2)"
                >
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/"
                >MDBootstrap.com</a
                >
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

        @stack('scripts')


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <!-- Add these lines to your Blade layout -->
        <script src="{{ asset('js/toastr.js') }}"></script>
        {!! Toastr::message() !!}

        <script>
    $(document).ready(function() {
        toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-left",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
    });
</script>
    </body>
</html>
