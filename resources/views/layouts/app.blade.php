<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) 


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />


</head>
<style>
    body {
        font-family: 'Roboto';
        /* @import url(https://fonts.googleapis.com/css?family=Roboto:400,700); */
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    body:before {
        content: ' ';
        background-image:  url({{ asset('/storage/img/cover1.png') }});
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        display: block;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: -1;


    }

    .navbar {
        background-image: url({{ asset('/storage/img/baaziz_header.png') }});
        background-size:cover; 
        background-position: center;
        /* Center the background image */
        background-repeat: no-repeat;
        min-height: 15vh;
    }

    .navbar {
        background-image: url({{ asset('/storage/img/baaziz_header_2000.png') }});
        background-size:cover; 
        background-position: center;
        /* Center the background image */
        background-repeat: no-repeat;
        min-height: 15vh;
    }
    @media only screen and (min-width: 300px) and (max-width: 900px) {
        .navbar {
        background-image: url({{ asset('/storage/img/baaziz_header_mobile.png') }});
        background-size:cover; 
        background-position: center;
        /* Center the background image */
        background-repeat: no-repeat;
        min-height: 15vh;
    }
}
    footer {
        background-image: url({{ asset('/storage/img/footer.png') }});
        background-size: cover;
        background-position: center;
        /* Center the background image */
        background-repeat: no-repeat;
        margin-top: auto;

    }
</style>


<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <b><a class="nav-link" href="{{ route('login') }}">{{ __('Identification') }}</a></b>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <b><a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a></b>
                                </li>
                            @endif
                        @else
                            @canany(['create-role', 'edit-role', 'delete-role'])
                                <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Roles</a></li>
                            @endcanany
                            @canany(['create-user', 'edit-user', 'delete-user'])
                                <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                            @endcanany
                            @canany(['create-product', 'edit-product', 'delete-product'])
                                <li><a class="nav-link" href="{{ route('products.index') }}">Manage Products</a></li>
                            @endcanany
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 <b>{{ Auth::user()->name }}</b> 
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="locale/en">
                                        {{ __('Anglais') }}
                                    </a>
                                    <a class="dropdown-item" href="locale/fr">
                                        {{ __('Français') }}
                                    </a>
                                    <a class="dropdown-item" href="locale/ar">
                                        {{ __('Arabe') }}
                                    </a>
                                    
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
                </div>
            </div>
        </nav>

        <main class="py-4">
        @if ($message = Session::get('success'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ $message }}
                            </div>
                        @endif
            @yield('content')
        </main>
 
    </div>
    <br>
    <footer class="bg-light text-center">

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © {{ date('Y') }} Copyright:
            <b><a class="text-dark" href="https:/www.mf.gov.dz/">جميع الحقوق محفوظة المديرية العامة للخزينة و التسيير
                المحاسبي للعمليات المالية للدولة</a></b>
        </div>
        <!-- Copyright -->
    </footer>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>


</body>

</html>
