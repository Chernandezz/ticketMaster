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
            <form action="{{ url('/servicioAlCliente') }}" method="POST" class="formPayment">
                @csrf
                <h2 class="tituloForm">Contacto Servicio Al Cliente</h2>
                <div class="entradasForm">
                    <div class="colForm">
                        <div class="form-group">
                            <label for="name" class="form-label">Nombre Completo:</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Correo electrónico:</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="queja" class="form-label">Problema:</label>
                            <textarea name="queja" id="queja" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Hacer Consulta</button>
            </form>
        </div>
    </section>

</body>

</html>
