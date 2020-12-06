<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><strong>Name: </strong>{{ $mail['name'] }}</p>
    <p><strong>Telephone: </strong>{{ $mail['telephone'] }}</p>
    <p><strong>Mail: </strong>{{ $mail['email'] }}</p>
    <br>
    <strong>Message: </strong><br>
    {{ $mail['message'] }}
</body>
</html>