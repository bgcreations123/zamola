<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\{Order, Terminus};

class TraceController extends Controller
{
    //Trace a Percel
    public function trace($tracer)
    {
        $shipment = Order::where('tracer', $tracer)->first();
        $origin = Terminus::where(['order_id' => $shipment->id, 'terminal' => 'origin'])->first();
        $destination = Terminus::where(['order_id' => $shipment->id, 'terminal' => 'destination'])->first();

        // check if user is true
        // if($shipment->user_id != (int)auth()->user()->id){
        //     return redirect()->back()->with(['error'=> 'Stay in your place!']);
        // }
        
        return view('trace.info', compact('shipment', 'origin', 'destination'));
    }
}
