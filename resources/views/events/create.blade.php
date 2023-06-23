<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- custom css file link  -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body style="overflow: hidden;">

    <!-- header section starts  -->

    <header class="header" data-aos="fade-down">

        <section class="flex">

            <a href="/" class="logo">Eventia.</a>

            <nav class="customNavbar">
                @auth
                    <a href="{{ url('/eventos/crear') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Crear
                        Evento</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="contact.html">servicio al cliente</a>
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Ingresar</a>

                    {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif --}}
                @endauth
            </nav>

            <div id="menu-btn" class="fas fa-bars"></div>

        </section>

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <div class="cont home full">

        <section class="flex">

            <form action="{{ url('/eventos') }}" method="POST" class="event-form">
                @csrf
                <h3 class="form-title">Crear Evento</h3>
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre del evento:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="fecha" class="form-label">Fecha del evento:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="descripcion" class="form-label">Descripcion del evento:</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="ubicacion" class="form-label">Ubicacion del evento:</label>
                    <input type="text" name="ubicacion" id="ubicacion" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="precioBoleta" class="form-label">Precio Boleta:</label>
                    <input type="text" name="precioBoleta" id="precioBoleta" class="form-control">
                </div>

                <div class="form-group">
                    <label for="maximoBoletas" class="form-label">Maximo Boletas:</label>
                    <input type="text" name="maximoBoletas" id="maximoBoletas" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="linkImagen" class="form-label">URL Imagen:</label>
                    <input type="text" name="linkImagen" id="linkImagen" class="form-control" required>
                </div>


                <!-- Agrega más campos del formulario según tus necesidades -->

                <button type="submit" class="btn">Crear Evento</button>
            </form>
        </section>

    </div>


    <!-- home section ends -->

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>


</body>

</html>
