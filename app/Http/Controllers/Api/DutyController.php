<?php

namespace App\Http\Controllers\Api;

// use DB;
use Auth;
use Mail;
use App\Mail\OrderDelivered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DutyResource;
use App\{Order, Status, Terminus, Shipment};

class DutyController extends Controller
{
    public function __construct(){
        return $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Auth::user();

        $duties = Shipment::where('driver_id', $driver->id)->get();

        return DutyResource::collection($duties);
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
    public function show($shipment_id)
    {
        $shipment = Shipment::find($shipment_id);

        return new DutyResource($shipment);
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
     * @param  \Illuminate\Http\Request  $shipment_id
     * @return \Illuminate\Http\Response
     */
    public function move_status($shipment_id)
    {
        $shipment = Shipment::where('id', $shipment_id)->first();

        $sender = Terminus::where(['order_id' => $shipment->order->id, 'terminal' => 'origin'])->first();

        // dd($shipment->order);

        $receiver = Terminus::where(['order_id' => $shipment->order->id, 'terminal' => 'destination'])->first();

        // Update the status of shipment and order depending on current status
        if($shipment->status->name == 'approved'){
            // Update shipment status to transit
            $shipment->update(['status_id' => Status::where('name', 'transit')->first()->id]);

            // Update the order status to transit
            Order::where('id', $shipment->order->id)->update(['status_id' => Status::where('name', 'transit')->first()->id]);


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
        }

        // Success at last
        $response = [ 
            'status' => '200',
            'message' => 'Ok',
        ];

        // return response(, 200);
        return response()->json($response, 200);

    }

    /**
     * Move status back to appointment.
     *
     * Its a get for now but incase the driver wants to post comments which
     * they deem important ???
     *
     * @param  \Illuminate\Http\Request  $shipment_id
     * @return \Illuminate\Http\Response
     */
    public function cancel_approval(Request $request, $shipment_id)
    {
        $shipment = Shipment::where(['id' => $shipment_id, 'driver_id' => Auth::user()->id])->firstOrFail();

        // validate comment
        $this->validate($request, [
            'comment' => 'required',
        ]);

        // insert into the db
        $comment = new Comment;

        $comment->driver_id = $shipment->driver->id;
        $comment->staff_id = $shipment->staff->id;
        $comment->shipment_id = $shipment->id;
        $comment->comment = $request->get('comment');

        $comment->save();

        /**
        *
        * update both the shipment and orders
        *
        * Update shipment status to unpaid
        * Update the order status to delivered
        *
        **/
        $shipment->update(['status_id' => Status::where('name', 'booking')->first()->id]);

        Order::where('id', $shipment->order->id)->update(['status_id' => Status::where('name', 'pending')->first()->id]);


        // Successfull cancelation at last
        $response = [ 
            'status' => '200',
            'message' => 'Ok',
        ];

        // return response(, 200);
        return response()->json($response, 200);
    }

}
