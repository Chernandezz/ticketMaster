<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use App\Models\Event;
use Illuminate\Http\Request;

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
            $boleta = new Boleta();
            $boleta->email = $request->input('email');
            $boleta->codigo = Str::random(10);
            $codigoBoletas[] = $boleta->codigo;
            $boleta->idEvento = $request->input('idEvento');
            $boleta->save();
        }

        return redirect()->route('index')->with('success', 'Boletas compradas correctamente');
    }
}
