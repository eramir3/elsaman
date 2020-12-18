<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name', 'El Saman')}}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/shared/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/errors/404.css') }}">
</head>
<body>
<div>
    <a href="/">
        <img src="{{ asset('images/errors/404.png') }}" alt="">
        <span>Click here to return to homepage</span>
    </a>
</div>
</body>
</html>

