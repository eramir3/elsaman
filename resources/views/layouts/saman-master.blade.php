<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'El Saman')}}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/saman/shared/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/saman/shared.css') }}">
    <link rel="stylesheet" href="{{ asset('css/saman/components/lang-dropdown.css') }}">
    <link rel="stylesheet" href="{{ asset('css/saman/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/saman/components/footer.css') }}">
    @yield('styles')
</head>
<body>

    <x-saman.header></x-saman.header>

        @yield('content')
        
    <x-saman.footer></x-saman.footer>
    
</body>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/saman/components/header.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/saman/components/lang-dropdown.js') }}" type="text/javascript"></script>
@yield('scripts')
</html>