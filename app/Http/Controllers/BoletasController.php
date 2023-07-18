<?php

namespace App\Http\Controllers;

use App\Mail\Contacto;
use App\Models\Boletas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreBoletasRequest;
use App\Http\Requests\UpdateBoletasRequest;

class BoletasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function verificar()
    {
        return view('boletas.verificar');
    }

    public function servicioAlCliente()
    {
        return view('boletas.servicioAlCliente');
    }

    public function enviarMensaje(Request $request)
    {

        $testMailData = [
            'nombre' => $request->input("name"),
            'correo' => $request->input("email"),
            'mensaje' => $request->input("queja")
        ];

        Mail::to('crissstianfhz@gmail.com')->send(new Contacto($testMailData));
        return redirect()->route('index')->with('success', 'Peticion enviada correctamente');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function comprobar(Request $request)
    {
        $codigoBoleta = $request->input("cBoleta");


        // Buscar la boleta con el código proporcionado
        $boleta = Boletas::where('codigo', $codigoBoleta)->first();

        // Si la boleta no existe
        if (!$boleta) {
            return redirect('/verificarBoletas')
                ->with('mensaje', 'La boleta no existe.');
        }

        // Si la boleta ya se ha usado
        if ($boleta->usada) {
            return redirect('/verificarBoletas')
                ->with('mensaje', 'La boleta ya ha sido usada.');
        }

        $boleta->usada = true;
        $boleta->save();

        // Si la boleta existe y no se ha usado

        return redirect('/verificarBoletas')
            ->with('mensaje', 'Ingreso Exitoso.');
    }
}
