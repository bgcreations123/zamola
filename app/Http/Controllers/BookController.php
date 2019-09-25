<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
// use DB;
use App\Traits\Comments;
use App\Mail\OrderApproved;
use Illuminate\Http\Request;
use App\{Order, Status, Terminus, Package, User, Role, Shipment};

class BookController extends Controller
{
    use Comments;

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
        $shipment = Shipment::updateOrCreate(['order_id' => $request->get('order')], [ 
            'staff_id' => $request->get('staff'),
            'driver_id' => $request->get('driver'),
            'status_id' => $request->get('status'),
            'package_id' => $request->get('package'),
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
    public function notify(Request $request, $order_id)
    {
        $user = Auth::user();

        $shipment = Shipment::where(['order_id' => $order_id, 'staff_id' => $user->id])->firstOrFail();

        // validate comment
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $this->store_comment($request, $shipment->staff_id, $shipment->driver_id, $shipment->id);

        return redirect()->route('staff')->with('success', 'Your notice has been sent!');
    }

    /**
     * Send follow-up notification.
     *
     * @return \Illuminate\Http\Response
     */
    public function followup(Request $request, $order_id)
    {
        $user = Auth::user();

        $shipment = Shipment::where(['order_id' => $order_id, 'staff_id' => $user->id])->firstOrFail();

        // validate comment
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $this->store_comment($request, $shipment->staff_id, $shipment->order->user_id, $shipment->id);

        return redirect()->route('staff')->with('success', 'Your follow-up notice to '. $shipment->order->user->name. ' has been sent!');
    }

    /**
     * Display a listing of the follow up.
     *
     * @return \Illuminate\Http\Response
     */
    public function followup_list()
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
