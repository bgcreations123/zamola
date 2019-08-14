<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * Display a listing of the assignments.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignments()
    {
        $assignments = Shipment::where('staff_id', '=', auth()->user()->id)
        ->leftJoin('orders', function ($query) {
            $query
            ->on('orders.id', '=', 'shipments.order_id');
        })
        ->whereNotNull('shipments.id')
        ->orderBy('shipments.id', 'DESC')->paginate(11);

        return view('staff.book.assignments', compact('assignments'));
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

        $shipment = new Shipment();

        $shipment->order_id = $request->get('order');
        $shipment->staff_id = $request->get('staff');
        $shipment->driver_id = $request->get('driver');
        $shipment->status_id = $request->get('status');
        $shipment->package_id = $request->get('package');

        // Update shipment table
        $shipment->save();

        // Update order status table
        Order::where('id', $shipment->order_id)->update(['status_id' => Status::where('name', 'approved')->first()->id]);

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
        $shipment = Order::where('id', $id)->first();
        $origin = Terminus::where(['order_id' => $shipment->id, 'terminal' => 'origin'])->first();
        $destination = Terminus::where(['order_id' => $shipment->id, 'terminal' => 'destination'])->first();

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
}
