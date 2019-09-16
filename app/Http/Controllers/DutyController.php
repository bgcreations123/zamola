<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use App\Mail\OrderDelivered;
use App\{Order, Status, Terminus, Package, User, Role, Shipment};

class DutyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duties = Shipment::where(['driver_id' => auth()->user()->id, 'status_id' => Status::where('name', 'approved')->pluck('id')])->paginate(11);

        $progresses = Shipment::where(['driver_id' => auth()->user()->id, 'status_id' => Status::where('name', 'transit')->pluck('id')])->get();

        return view('driver.duty.index', compact('duties', 'progresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shipment = Shipment::find($id);

        return view('driver.duty.show', compact('shipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Move status of shipment.
     *
     * Its a get for now but incase the driver wants to post comments which
     * they deem important ???
     *
     * @param  \Illuminate\Http\Request  $shipment_id
     * @return \Illuminate\Http\Response
     */
    public function move_status($shipment_id)
    {
        $shipment = Shipment::where(['id' => $shipment_id, 'driver_id' => Auth::user()->id])->firstOrFail();

        $sender = Terminus::where(['order_id' => $shipment->order->id, 'terminal' => 'origin'])->first();

        // dd($shipment->order);

        $receiver = Terminus::where(['order_id' => $shipment->order->id, 'terminal' => 'destination'])->first();

        // Update the status of shipment and order depending on current status
        if($shipment->status->name == 'approved'){
            // Update shipment status to transit
            $shipment->update(['status_id' => Status::where('name', 'transit')->first()->id]);

            // Update the order status to transit
            Order::where('id', $shipment->order->id)->update(['status_id' => Status::where('name', 'transit')->first()->id]);

            $message = 'Safe journey.';


        }elseif($shipment->status->name == 'transit'){
            // Update shipment status to unpaid
            $shipment->update(['status_id' => Status::where('name', 'unpaid')->first()->id]);

            // Update the order status to delivered
            Order::where('id', $shipment->order->id)->update(['status_id' => Status::where('name', 'delivered')->first()->id]);

            // Send mail to the client
            Mail::to($sender->email)->send(new OrderDelivered($shipment->order, $sender, $receiver));

            // check for failures
            if (Mail::failures()) {
                $response = [ 
                    'status' => '401',
                    'message' => 'mail not sent!',
                ];

                foreach(Mail::failures() as $email_failures) {
                    echo " - $email_failures <br />";
                };
            }

            $message = 'Thanks for your services at Zamola Enterprize Ltd.';
        }

        // Success at last
        return redirect()->route('driver')->with('success', $message);

    }

    public function deliveries($id)
    {
        // DB::enableQueryLog();
        // dd(DB::getQueryLog());

        $deliveries = Shipment::where(['driver_id' => $id, 'status_id' => Status::where('name', 'unpaid')->pluck('id')])->orWhere('status_id', Status::where('name', 'paid')->pluck('id'))->get();


        return view('driver.duty.deliveries', compact('deliveries'));
    }
}
