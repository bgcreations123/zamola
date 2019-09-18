<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\{Role, Order, Terminus};

class TraceController extends Controller
{
    // View tracer page 
    public function index()
    {
        return view('trace.index');
    }

    public function tracer(Request $request){
        // validate
        $this->validate($request, [
            'tracer' => 'required',
        ]);

        // return tracer method
        return $this->trace($request->get('tracer'));
    }


    // Trace a Percel
    public function trace($tracer)
    {
        $user = Auth::user();

        $shipment = Order::where('tracer', $tracer)->first();

        // Check if tracer code exists
        if($shipment == null){
            return redirect()->back()->with(['error'=> "Tracer code doesn't exist in the system!"]);
        }

        $origin = Terminus::where(['order_id' => $shipment->id, 'terminal' => 'origin'])->first();

        $destination = Terminus::where(['order_id' => $shipment->id, 'terminal' => 'destination'])->first();

        // check if role user is true
        if($user->hasRole(Role::where('name', 'user')->pluck('id'))){
            // check if user is true
            if($shipment->user_id != (int)$user->id){
                return redirect()->back()->with(['error'=> 'Stay in your place!']);
            }
        }
        
        return view('trace.info', compact('shipment', 'origin', 'destination'));
    }
}
