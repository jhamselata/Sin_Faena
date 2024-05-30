<!DOCTYPE html>
<html>
<head>
    <title>Nuevo mensaje de contacto</title>
</head>
<body>
    <h2>{{ $details['subject'] }}</h2>
    <p><strong>Nombre:</strong> {{ $details['name'] }}</p>
    <p><strong>Correo electrónico:</strong> {{ $details['email'] }}</p>
    <p><strong>Teléfono:</strong> {{ $details['phone'] }}</p>
    <p><strong>Mensaje:</strong> {{ $details['message'] }}</p>
</body>
</html>
