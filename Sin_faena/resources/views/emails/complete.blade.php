<!DOCTYPE html>
<html>
<head>
    <title>{{ $details['title'] }}</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p><strong>Nombre:</strong> {{ $details['name'] }}</p>
    <p><strong>Email:</strong> {{ $details['email'] }}</p>
    <p><strong>Teléfono:</strong> {{ $details['phone'] }}</p>
    <p><strong>Asunto:</strong> {{ $details['subject'] }}</p>
    <p><strong>Mensaje:</strong></p><p>{{ $details['message'] }}</p>
</body>
</html>