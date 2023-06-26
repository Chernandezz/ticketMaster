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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    <div class="cont home">

        <section class="flex">

            <form id="searchForm">
                <h3 class="tituloForm">buscador de eventos</h3>
                <input type="text" id="search" required maxlength="50" placeholder="ingresar nombre del evento"
                    class="inputEventos">
                <input type="submit" value="buscar evento" id="searchButton" class="btn">
            </form>

        </section>

    </div>

    <section class="grid-container" id="eventResults">
    </section>



    <!-- home section ends -->

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
        async function buscarEventos(query = "") {
            const response = await fetch(`/api/eventos/buscar?search=${query}`);
            const data = await response.json();
            mostrarEventos(data.eventos);
        }

        function mostrarEventos(eventos) {
            const eventsRow = document.getElementById('eventResults');
            eventsRow.innerHTML = '';

            for (let evento of eventos) {
                eventsRow.innerHTML += `
        <div class="card">
            <img src="${ evento.url_imagen }" alt="Evento">
            <div class="card-content">
                <h2>${ evento.nombre }</h2>
                <p>${ evento.fecha }</p>
                <div class="btnsEvento">
                    <a href="/eventos/${ evento.id }" class="buy-button">Mas Info</a>
                    @auth
                        <a href="/eventos/${ evento.id }/editar" class="buy-button editarbtn"><i class="fa-solid fa-pencil"></i></a>
                        <form action="/eventos/${ evento.id }" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="buy-button eliminarbtn"><i class="fa-solid fa-trash"></i></button>
                    @endauth
                </div>

            </div>
        </div>
    `;
            }
        }

        document.getElementById('search').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // añade esto
                buscarEventos(this.value);
            }

        });

        document.getElementById('searchButton').addEventListener('click', function(event) {
            event.preventDefault(); // añade esto
            const searchValue = document.getElementById('search').value;
            buscarEventos(searchValue);
        });

        buscarEventos();
    </script>

</body>

</html>
