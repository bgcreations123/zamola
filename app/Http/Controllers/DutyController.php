<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function transit($order_id, $shipment_id)
    {
        $shipment = new Shipment();

        // Update shipment status
        Shipment::where('id', $shipment_id)->update(['status_id' => Status::where('name', 'transit')->first()->id]);

        // Update the order status
        Order::where('id', $order_id)->update(['status_id' => Status::where('name', 'transit')->first()->id]);

        return redirect()->route('duties')->with('success', 'Safe journey.');
    }
}
