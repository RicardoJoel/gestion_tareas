<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!--meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style52.css') }}">
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
</head>
<body>
<div id="container">
    <main class="container">
        <div class="fila">
            <div class="columna columna-1">
                @if (count($errors) > 0)
                <div class="alert alert-danger fade in">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>¡Atención!</strong> Revisa los campos obligatorios.
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::has('status'))
                <div class="alert alert-info fade in">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>¡Excelente!</strong> {{ Session::get('status') }}
                </div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger fade in">
                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>¡Atención!</strong> {{ Session::get('error') }}
                </div>
                @endif
            </div>
        </div>
        @yield('content')
        <div class="space2"></div>
    </main>
</div>
<footer>
    <p>Gestión de tareas | Noviembre 2024 | Desarrollado por <a href="mailto:ricardo.jbl2011@gmail.com"><b>Ricardo Joel Béjar Luque</b></a></p>
</footer>
@yield('script')
</body>
</html>