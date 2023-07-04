<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="cont home full">
    <header class="header">
        <section class="flex">
            <a href="/" class="logo">Eventia.</a>
            <nav class="customNavbar">
                @auth
                    <a href="{{ url('/eventos/crear') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Crear
                        Evento</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Cerrar
                        sesión</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="contact.html">Servicio al cliente</a>
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Ingresar</a>
                @endauth
            </nav>
            <div id="menu-btn" class="fas fa-bars"></div>
        </section>
    </header>
    <section class="flex blurry">
        <div class="event-details fcolum">
            <form action="{{ url('/pago') }}" method="POST" class="formPayment">
                @csrf
                <h2 class="tituloForm">Formulario de Pago</h2>
                <div class="entradasForm">
                    <div class="colForm">
                        <div class="form-group">
                            <label for="name" class="form-label">Nombre Completo:</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cedula" class="form-label">Cedula:</label>
                            <input type="text" id="cedula" name="cedula" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Correo electrónico:</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tickets" class="form-label">Número de Boletos:</label>
                            <input type="text" id="tickets" name="tickets" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address" class="form-label">Dirección:</label>
                            <input type="text" id="address" name="address" class="form-control">
                        </div>
                    </div>
                    <div class="colForm">
                        <div class="form-group">
                            <label for="nombreTarjeta" class="form-label">Nombre en la tarjeta:</label>
                            <input type="text" id="nombreTarjeta" name="nombreTarjeta" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="numeroTarjeta" class="form-label">Número de la tarjeta:</label>
                            <input type="text" id="numeroTarjeta" name="numeroTarjeta" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="mesExp" class="form-label">Mes de Expiración:</label>
                            <input type="text" id="mesExp" name="mesExp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="anoExp" class="form-label">Año de Expiración:</label>
                            <input type="text" id="anoExp" name="anoExp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="cvv" class="form-label">CVV:</label>
                            <input type="text" id="cvv" name="cvv" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="total" class="form-label">Total a Pagar:</label>
                    <input type="text" id="total" name="total" class="form-control" disabled>
                </div>
                <input type="hidden" name="idEvento" value="{{ $event['id'] }}">
                <button type="submit" class="submit-btn">Realizar Pago</button>
            </form>
        </div>
    </section>
    <script>
        let ticketPrice = @json($event['precioBoleta']);
        // Escucha el evento de cambio en el campo de entrada de boletos
        document.getElementById('tickets').addEventListener('change', function(e) {
            // Obtiene el número de boletos
            let ticketCount = parseInt(e.target.value, 10);

            // Verifica si ticketCount es un número válido
            if (isNaN(ticketCount)) {
                alert("Por favor, ingresa un número válido");
                return;
            }

            // Calcula el precio total
            let totalPrice = ticketCount * ticketPrice;

            // Muestra el precio total
            document.getElementById('total').value = totalPrice;
        });
    </script>

</body>

</html>
