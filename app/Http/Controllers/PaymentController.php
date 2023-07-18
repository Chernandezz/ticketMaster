<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Mail\SendMail;
use App\Models\Boletas;

use App\Mail\ReciboPago;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function comprar($id)
    {
        $event = Event::find($id);
        return view('payment.pay', compact('event'));
    }

    public function pago(Request $request)
    {
        $numeroBoletas = $request->input('tickets');
        $codigoBoletas = [];
        for ($i = 0; $i < $numeroBoletas; $i++) {
            $boleta = new Boletas();
            $boleta->email = $request->input('email');
            $boleta->codigo = Str::random(10);
            $codigoBoletas[] = $boleta->codigo;
            $boleta->idEvento = $request->input('idEvento');
            $boleta->save();
        }

        $fecha = Carbon::now()->format('d/m/Y');

        $MailData = [
            'title' => 'Boletas compradas',
            'body' => 'Estas son tus boletas',
            'codigoBoletas' => $codigoBoletas,
            "nombre" => $request->input('nombre'),
            "email" => $request->input('email'),
            "cedula" => $request->input('cedula'),
            "direccion" => $request->input('address'),
            "total" => $request->input('total'),
            "fecha" => $fecha,
        ];

        Mail::to($request->input('email'))->send(new SendMail($MailData));
        Mail::to($request->input('email'))->send(new ReciboPago($MailData));


        return redirect()->route('index')->with('success', 'Boletas compradas correctamente');
    }
}
