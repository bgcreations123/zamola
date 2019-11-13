<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\{User, Role, Order, Terminus};

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

        $shipment = Order::where('tracer', $tracer)->first();

        // Check if tracer code exists
        if($shipment == null){
            return redirect()->back()->with(['error'=> "Sorry, that tracer code doesn't exist in the system!"]);
        }

        $origin = Terminus::where(['order_id' => $shipment->id, 'terminal' => 'origin'])->first();

        $destination = Terminus::where(['order_id' => $shipment->id, 'terminal' => 'destination'])->first();

        // Check if user is logged in
        if(Auth::check()){
            // check if role user is true
            $user = User::findOrFail(Auth::user()->id);

            if($user->hasRole('user')){
                // check if user is true
                if($shipment->user_id !== (int)$user->id){
                    return redirect()->back()->with(['error'=> "Sorry, this particular shipment doesn't belong to you...!"]);
                }
            }

            return view('trace.info', compact('shipment', 'origin', 'destination'));

        }
        
        return view('trace.info-1', compact('shipment', 'origin', 'destination'));
    }
}
