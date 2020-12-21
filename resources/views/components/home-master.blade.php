<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'El Saman')}}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/shared/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/shared.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/lang-dropdown.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
    @yield('assets-css')
</head>
<body>

    <x-header></x-header>

        @yield('content')
        
    <x-footer></x-footer>
    
</body>

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/components/header.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/components/lang-dropdown.js') }}" type="text/javascript"></script>
@yield('assets-js')
</html>