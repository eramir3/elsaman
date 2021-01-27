<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'El home')}}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/home/shared/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/home/shared.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/components/lang-dropdown.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/components/footer.css') }}">
    @yield('styles')
</head>
<body>

    <x-home.header></x-home.header>

        @yield('content')
        
    <x-home.footer></x-home.footer>
    
</body>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/home/components/header.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/home/components/lang-dropdown.js') }}" type="text/javascript"></script>
@yield('scripts')
</html>