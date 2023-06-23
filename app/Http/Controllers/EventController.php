<?php

namespace App\Http\Controllers;

use App\Models\Event;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('welcome', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function buscar(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $eventos = Event::where('nombre', 'like', "%$search%")->get();
        } else {
            $eventos = Event::all();
        }

        return response()->json(['eventos' => $eventos], 200);
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->nombre = $request->input('nombre');
        $event->fecha = $request->input('fecha');
        $event->url_imagen = $request->input('url_imagen');
        $event->descripcion = $request->input('descripcion');
        $event->save();

        return redirect()->route('events.index')->with('success', 'Evento creado correctamente');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $event->nombre = $request->input('nombre');
        $event->fecha = $request->input('fecha');
        $event->url_imagen = $request->input('url_imagen');
        $event->descripcion = $request->input('descripcion');
        $event->save();

        return redirect()->route('events.index')->with('success', 'Evento actualizado correctamente');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Evento eliminado correctamente');
    }
}
