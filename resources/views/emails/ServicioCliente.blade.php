<!DOCTYPE html>
<html>

<head>
    <title>Peticion Ayuda</title>
</head>

<body>
    <h1></h1>
    <p>Hola Admin, Buen dia. </p>
    <p>{{ $mailData['nombre'] }}, con correo {{ $mailData['correo'] }} tiene un problema</p>
    <p>El problema es el siguiente: {{ $mailData['mensaje'] }}</p>
</body>

</html>
