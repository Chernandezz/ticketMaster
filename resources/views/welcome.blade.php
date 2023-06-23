</html>
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

    <!-- custom css file link  -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body style="overflow: hidden;">

    <!-- header section starts  -->

    <header class="header" data-aos="fade-down">

        <section class="flex">

            <a href="/" class="logo">Eventia.</a>

            <nav class="customNavbar">
                <a href="contact.html">servicio al cliente</a>
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </nav>

            <div id="menu-btn" class="fas fa-bars"></div>

        </section>

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <div class="cont home">

        <section class="flex">

            <form action="" method="post">
                <h3>buscador de eventos</h3>
                <input type="text" name="location" required maxlength="50" placeholder="ingresar nombre del evento"
                    class="box">
                <input type="submit" value="buscar evento" name="search" class="btn">
            </form>

        </section>

    </div>

    ...
    <section class="grid-container">
        @foreach ($events as $event)
            <div class="card">
                <img src="{{ $event->url_imagen }}" alt="Evento">
                <div class="card-content">
                    <h2>{{ $event->nombre }}</h2>
                    <p>{{ $event->fecha }}</p>
                    <button class="buy-button">Comprar</button>
                </div>
            </div>
        @endforeach
    </section>
    ...



    <!-- home section ends -->

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

</body>

</html>
