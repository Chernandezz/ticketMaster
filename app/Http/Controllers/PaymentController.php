<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function comprar($id)
    {
        $event = Event::find($id);
        return view('payment.pay', compact('event'));
    }
}
