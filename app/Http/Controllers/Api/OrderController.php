<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Mail\OrderReceived;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\{Order, User, Status, Terminus};

class OrderController extends Controller
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
        $user = Auth::user();

        $orders = Order::where('user_id', $user->id)->get();

        return OrderResource::collection($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = Status::where('name', 'pending')->first();

        $latestOrder = Order::orderBy('created_at','DESC')->first();

        $latestOrder = is_null($latestOrder) ? 0 : $latestOrder->id;

        // dd($latestOrder);
        // dd(Auth::user()->id);

        // dd('ZEL-00-'.str_pad($latestOrder->id + 1, 5, "0", STR_PAD_LEFT));

        $this->validate($request, [
            'category' => 'required',
            'quantity' => 'required',
            'weight' => 'required',
            'length' => 'required',
            'width' => 'required',
            'height' => 'required',
            'payment' => 'required',

            'sendername' => 'required',
            'sendermobile' => 'required',
            'senderaddress' => 'required',
            'senderemail' => 'required|email',
            'senderlocation' => 'required',

            'receivername' => 'required',
            'receivermobile' => 'required',
            'receiveraddress' => 'required',
            'receiveremail' => 'required',
            'receiverlocation' => 'required',
        ]);

        $order = new Order();

        $order->user_id = Auth::user()->id;
        $order->status_id = $status->id;
        $order->tracer = 'ZEL-00-'.str_pad($latestOrder + 1, 5, "0", STR_PAD_LEFT);
        $order->shipment_category_id = $request->category;
        $order->quantity = $request->quantity;
        $order->payment_method_id = $request->payment;
        $order->weight = $request->weight;
        $order->length = $request->length;
        $order->width = $request->width;
        $order->height = $request->height;
        $order->description = $request->description;

        $order->save();

        $sender_terminus = new Terminus();

        $sender_terminus->order_id = $order->id;
        $sender_terminus->terminal = 'origin';
        $sender_terminus->name = $request->sendername;
        $sender_terminus->email = $request->senderemail;
        $sender_terminus->address = $request->senderaddress;
        $sender_terminus->phone = $request->sendermobile;
        $sender_terminus->latlong = 0;
        $sender_terminus->location = $request->senderlocation;
        $sender_terminus->description = 'No description';

        $sender_terminus->save();

        $receiver_terminus = new Terminus();

        $receiver_terminus->order_id = $order->id;
        $receiver_terminus->terminal = 'destination';
        $receiver_terminus->name = $request->receivername;
        $receiver_terminus->email = $request->receiveremail;
        $receiver_terminus->address = $request->receiveraddress;
        $receiver_terminus->phone = $request->receivermobile;
        $receiver_terminus->latlong = 0;
        $receiver_terminus->location = $request->receiverlocation;
        $receiver_terminus->description = 'No description';

        $receiver_terminus->save();

        $mail = \Mail::to($sender_terminus->email, $receiver_terminus->email)->send(new OrderReceived($order, $sender_terminus, $receiver_terminus));

        if($mail){
            $response = [ 
                'status' => '200',
            ];
        }else{
            $response = [ 
                'status' => '401',
                'message' => 'mail not sent!'
            ];
        }

        

        // return response(, 200);
        return response()->json($response, 200, ["Content-Type" => "application/json"]);

        // return response()->json(['order' => $order, 'sender_terminus' => $sender_terminus, 'receiver_terminus' => $receiver_terminus]);
        // return ['redirect' => route('trace', ['tracer' => $order->tracer]), 'with' => ['success' => 'You have successfully placed a new order.']];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        return new OrderResource($order);
    }
}
