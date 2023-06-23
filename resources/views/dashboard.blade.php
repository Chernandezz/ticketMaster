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

            <a href="home.html" class="logo">Eventia.</a>

            <nav class="navbar">
                <a href="home.html">inicio</a>
                <a href="events.html">eventos</a>
                <a href="contact.html">servicio al cliente</a>
            </nav>

            <div id="menu-btn" class="fas fa-bars"></div>

        </section>

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <div class="container home">

        <section class="flex">

            <form action="" method="post">
                <h3>buscador de eventos</h3>
                <input type="text" name="location" required maxlength="50" placeholder="ingresar nombre del evento"
                    class="box">
                <input type="submit" value="buscar evento" name="search" class="btn">
            </form>

        </section>

    </div>

    <section class="grid-container">
        <!-- Repite esta sección para cada evento -->
        <div class="card">
            <img src="https://img.freepik.com/psd-gratis/club-dj-party-flyer-publicacion-redes-sociales_505751-3058.jpg"
                alt="Evento">
            <div class="card-content">
                <h2>Ballenato</h2>
                <p>Fecha del evento</p>
                <button class="buy-button">Comprar</button>
            </div>
        </div>
        <div class="card">
            <img src="https://img.freepik.com/vector-gratis/cartel-evento-musical-foto-2021_52683-42065.jpg?w=2000"
                alt="Evento">
            <div class="card-content">
                <h2>Concierto</h2>
                <p>Fecha del evento</p>
                <button class="buy-button">Comprar</button>
            </div>
        </div>
        <div class="card">
            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/hd/9c86b893969355.5e727918c4ea4.png"
                alt="Evento">
            <div class="card-content">
                <h2>Reunion</h2>
                <p>Fecha del evento</p>
                <button class="buy-button">Comprar</button>
            </div>
        </div>
        <!-- Fin de la sección de eventos -->
    </section>


    <!-- home section ends -->

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

</body>

</html>
