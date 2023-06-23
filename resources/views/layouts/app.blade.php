<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body style="overflow: hidden;">

    <!-- header section starts  -->

    <header class="header" data-aos="fade-down">

        <section class="flex">

            <a href="home.html" class="logo">Travia.</a>

            <nav class="navbar">
                <a href="home.html">home</a>
                <a href="about.html">about</a>
                <a href="tours.html">tours</a>
                <a href="destinations.html">destinations</a>
                <a href="contact.html">contact</a>
            </nav>

            <div id="menu-btn" class="fas fa-bars"></div>

        </section>

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <div class="container home" data-aos="zoom-out">

        <section class="flex" data-aos="zoom-in" data-aos-delay="600">

            <form action="" method="post">
                <h3>search your tour</h3>
                <p>where to</p>
                <input type="text" name="location" required maxlength="50" placeholder="enter tour location"
                    class="box">
                <p>when to</p>
                <input type="date" name="date" class="box" required>
                <p>how many</p>
                <input type="number" name="guests" min="1" max="10" maxlength="2"
                    placeholder="number of guests" required class="box">
                <input type="submit" value="search tour" name="search" class="btn">
            </form>

        </section>

    </div>

    <!-- home section ends -->

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

</body>

</html>
