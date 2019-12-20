<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\Traits\Comments;
use App\Mail\OrderReceived;
use Illuminate\Http\Request;
use App\{Order, User, Status, Terminus, Comment};

class OrderController extends Controller
{
    use Comments;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.index');
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
     * ZEL-00-00000x
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = User::where('name', 'Admin')->firstOrFail();

        $status = Status::where('name', 'pending')->first();

        $latestOrder = Order::orderBy('created_at','DESC')->first();

        $latestOrder = is_null($latestOrder) ? 0 : $latestOrder->id;

        // dd('ZEL-00-'.str_pad($latestOrder->id + 1, 5, "0", STR_PAD_LEFT));

        $this->validate($request, [
            'receivername' => 'required',
            'receivermobile' => 'required',
            'receiveraddress' => 'required',
            'receiveremail' => 'required',
            'receiverlocation' => 'required',
        ]);

        $order = new Order();

        $order->user_id = $request->get('client');
        $order->status_id = $status->id;
        $order->tracer = 'ZEL-00-'.str_pad($latestOrder + 1, 5, "0", STR_PAD_LEFT);
        $order->shipment_category_id = $request->get('category');
        $order->quantity = $request->get('quantity');
        $order->payment_method_id = $request->get('payment');
        $order->weight = $request->get('weight');
        $order->length = $request->get('length');
        $order->width = $request->get('width');
        $order->height = $request->get('height');
        $order->description = $request->get('description');

        $order->save();

        $sender_terminus = new Terminus();

        $sender_terminus->order_id = $order->id;
        $sender_terminus->terminal = 'origin';
        $sender_terminus->name = $request->get('sendername');
        $sender_terminus->email = $request->get('senderemail');
        $sender_terminus->address = $request->get('senderaddress');
        $sender_terminus->phone = $request->get('sendermobile');
        $sender_terminus->latlong = 0;
        $sender_terminus->location = $request->get('senderlocation');
        $sender_terminus->description = 'No description';

        $sender_terminus->save();

        $receiver_terminus = new Terminus();

        $receiver_terminus->order_id = $order->id;
        $receiver_terminus->terminal = 'destination';
        $receiver_terminus->name = $request->get('receivername');
        $receiver_terminus->email = $request->get('receiveremail');
        $receiver_terminus->address = $request->get('receiveraddress');
        $receiver_terminus->phone = $request->get('receivermobile');
        $receiver_terminus->latlong = 0;
        $receiver_terminus->location = $request->get('receiverlocation');
        $receiver_terminus->description = 'No description';

        $receiver_terminus->save();

        // Send mail
        Mail::to($sender_terminus->email)->send(new OrderReceived($order, $sender_terminus, $receiver_terminus));

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

        // send notification
        $notice = 'Your order has been submitted and waiting to be dispatched. Thanks for ordering with Zamola Ent LTD.';

        $this->store_comment($notice, $admin->id, $request->get('client'), $order->id);

        // return response()->json(['order' => $order, 'sender_terminus' => $sender_terminus, 'receiver_terminus' => $receiver_terminus]);
        return ['redirect' => route('trace', ['tracer' => $order->tracer]), 'with' => ['success' => 'You have successfully placed a new order.']];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    // List all the orders
    public function list($status = null){
        $user = Auth::user();

        if(is_null($status)){
            $orders = Order::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(7);
        }else{
            $orders = Order::where(['user_id' => $user->id, 'status_id' => Status::where('name', $status)->pluck('id')])->orderBy('id', 'DESC')->paginate(7);
        }

        return view('order.list', compact('orders'));
    }

    // Validate step 1
    public function step_1(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'quantity' => 'required',
            'weight' => 'required',
            'length' => 'required',
            'width' => 'required',
            'height' => 'required',
            'payment' => 'required',
        ]);

        return response()->json(['Step_1' => 'Ok']);
    }

    // Validate step 2
    public function step_2(Request $request)
    {
        $this->validate($request, [
            'sendername' => 'required',
            'sendermobile' => 'required',
            'senderaddress' => 'required',
            'senderemail' => 'required|email',
            'senderlocation' => 'required',
        ]);

        return response()->json(['Step_2' => 'Ok']);
    }

}
