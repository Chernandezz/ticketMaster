<!-- resources/views/create-event.blade.php -->

@extends('layouts.app')


<div class="container">
    <h1>Crear Evento</h1>

    <form action="{{ url('/eventos') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del evento:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha del evento:</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>

        <!-- Agrega más campos del formulario según tus necesidades -->

        <button type="submit" class="btn btn-primary">Crear Evento</button>
    </form>
</div>

</body>

</html>
