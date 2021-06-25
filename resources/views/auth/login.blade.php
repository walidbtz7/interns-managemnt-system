<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/Logo.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestion Stage</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>


<body style="background-color:#00008B">
    <div id="app">
        <main class="py-4">
            <section class="h-100">
                <div class="container h-100">
                    <div class="row justify-content-sm-center h-100">
                        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                            <div class="text-center my-5">
                                <img src="img/Logo.png" alt="logo" width="100">
                            </div>
                            <div class="card shadow-lg">
                                <div class="card p-5" style="background-color:#151B54">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-2 text-muted" for="email"></label>
                                            <input id="email" type="email" class="form-control" name="email" value=""
                                                placeholder="Identifent" required autofocus>
                                            <div class="invalid-feedback">
                                                Email is invalid
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="mb-2 w-100">
                                                <label class="text-muted" for="password"></label>
                                                <a href="forgot.html" class="float-end">
                                                </a>
                                            </div>
                                            <input id="password" type="password" class="form-control"
                                                placeholder="mot de passe" name="password" required>
                                            <div class="invalid-feedback">
                                                Password is required
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <button type="submit" class="btn btn-warning ms-auto text-50">
                                                Se connecter
                                            </button>
                                        </div>
                                        <br>
                                        <div class="form-check">
                                            <input type="checkbox" name="remember" id="remember"
                                                class="form-check-input">
                                            <label for="remember" class="form-check-label text-white">Se souvernir de
                                                moi</label>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="text-center mt-5 text-white">
                                Copyright &copy; 2021 &mdash; COSUMAR
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>
