<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Illuminate\Http\Request;
use App\Mail\OrderApproved;
use App\{Order, Status, Terminus, Package, User, Role, Shipment};

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending_orders = Order::where(['status_id' => Status::where('name', 'pending')->pluck('id')])->orderBy('id', 'DESC')->paginate(11);

        return view('staff.book.index', compact('pending_orders'));
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
        $this->validate($request, [
            'driver' => 'required',
            'package' => 'required'
        ]);

        // Update shipment table
        $shipment = Shipment::updateOrCreate(['order_id' => request()->order], [ 
            'staff_id' => request()->staff,
            'driver_id' => request()->driver,
            'status_id' => request()->status,
            'package_id' => request()->package,
        ]);

        // Update order status table
        $order = Order::where('id', $shipment->order_id)->update(['status_id' => Status::where('name', 'approved')->first()->id]);

        // Incase but rear the approval mail to be sent to the account owner
        $client_email = User::where('id', $shipment->order->user_id)->pluck('email');

        $sender = Terminus::where(['order_id' => $shipment->order->id, 'terminal' => 'origin'])->first();
        $receiver = Terminus::where(['order_id' => $shipment->order->id, 'terminal' => 'destination'])->first();

        // dd($receiver);

        Mail::to($sender->email)->send(new OrderApproved($shipment->order, $sender, $receiver));

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

        return redirect()->route('staff')->with(['success' => 'You have successfully initiated parcel transit.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the order, origin and destination
        $shipment = Order::find($id);

        // Find the packages and drivers
        $packages = Package::all();
        $drivers = User::where(['role_id' => Role::where('name', 'driver')->pluck('id')])->get();

        // Get the next status
        $status = Status::where('name', 'approved')->first();

        return view('staff.book.show', compact('shipment', 'origin', 'destination', 'packages', 'drivers', 'status'));
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
     * Display a listing of the follow up.
     *
     * @return \Illuminate\Http\Response
     */
    public function followups()
    {
        $staff = Auth::user();

        $followups = Shipment::where(['staff_id' => $staff->id, 'status_id' => Status::where('name', 'unpaid')->pluck('id')])
            ->latest()
            ->paginate(11);

        return view('staff.book.followups', compact('followups'));
    }

    /**
     * Display a listing of the assignments.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignments()
    {
        $staff = Auth::user();

        $assignments = Shipment::where(['staff_id' => $staff->id, 'status_id' => Status::where('name', 'rejected')->pluck('id')])
            ->orWhere(['status_id' => Status::where('name', 'booking')->pluck('id')])
            ->orWhere(['status_id' => Status::where('name', 'transit')->pluck('id')])
            ->orWhere(['status_id' => Status::where('name', 'approved')->pluck('id')])
            ->latest()
            ->paginate(11);

        return view('staff.book.assignments', compact('assignments'));
    }

    public function raise_invoice($shipment_id)
    {
        $shipment = Shipment::find($shipment_id);

        return view('staff.book.raise_invoice', compact('shipment'));
    }
}
