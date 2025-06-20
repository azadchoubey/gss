<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'inspection') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        :root {
            --gss-primary: #2e86de;
            --gss-primary-dark: #0abde3;
            --gss-secondary: #5f27cd;
            --gss-secondary-dark: #341f97;
            --gss-accent: #ff9f43;
            --gss-accent-hover: #ee8d2d;
            --gss-light: #f8f9fa;
            --gss-light-blue: #f5f9ff;
            --gss-light-purple: #f5f0ff;
        }
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
        }
        .btn-gss-primary {
            background-color: var(--gss-accent);
            border-color: var(--gss-accent);
            color: white;
        }
        .btn-gss-primary:hover {
            background-color: var(--gss-accent-hover);
            border-color: var(--gss-accent-hover);
            color: white;
        }
        .btn-gss-secondary {
            background-color: var(--gss-secondary);
            border-color: var(--gss-secondary);
            color: white;
        }
        .btn-gss-secondary:hover {
            background-color: var(--gss-secondary-dark);
            border-color: var(--gss-secondary-dark);
            color: white;
        }
        .text-gss-primary {
            color: var(--gss-primary) !important;
        }
        .text-gss-secondary {
            color: var(--gss-secondary) !important;
        }
        .text-gss-accent {
            color: var(--gss-accent) !important;
        }
        .form-control:focus {
            border-color: rgba(46, 134, 222, 0.25);
            box-shadow: 0 0 0 0.25rem rgba(46, 134, 222, 0.25);
        }
    </style>
</head>
<body>
<main class="">
@yield('content')
</main>

</body>
</html>