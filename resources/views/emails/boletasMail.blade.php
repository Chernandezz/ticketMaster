<!DOCTYPE html>
<html>

<head>
    <title>{{ $mailData['title'] }}</title>
</head>

<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>Hola {{ $mailData['nombre'] }},</p>
    <p>¡Gracias por tu compra! Aquí están los códigos de tus boletas:</p>
    <ul>
        @foreach ($mailData['codigoBoletas'] as $codigo)
            <li>{{ $codigo }}</li>
        @endforeach
    </ul>
    <p>Por favor, asegúrate de guardar estos códigos de boleta, ya que los necesitarás para entrar al evento.</p>
    <p>Tus detalles:</p>
    <p>Email: {{ $mailData['email'] }}</p>
    <p>Cédula: {{ $mailData['cedula'] }}</p>
    <p>Dirección: {{ $mailData['direccion'] }}</p>
    <p>Si tienes alguna pregunta, no dudes en contactarnos.</p>
    <p>¡Esperamos verte en el evento!</p>
    <p>Gracias,</p>
    <p>[Your Company]</p>
</body>

</html>
