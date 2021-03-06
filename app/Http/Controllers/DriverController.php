<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\{Shipment, Status, Notification};

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Auth::user();

        $duties = Shipment::where('driver_id', $driver->id)->get();

        $progresses = Shipment::where(['driver_id' => $driver->id, 'status_id' => Status::where('name', 'transit')->pluck('id')])->paginate(5);

        $deliveries = 
        Shipment::where(['driver_id' => $driver->id, 'status_id' => Status::where('name', 'unpaid')->pluck('id')])
        ->orWhere(['status_id' => Status::where('name', 'paid')->pluck('id')])
        ->orWhere(['status_id' => Status::where('name', 'delivered')->pluck('id')])
        ->get();

        $notices = Notification::where(['receiver_id' => $driver->id, 'status' => '0'])->paginate(3);

        return view('driver.index', compact('duties', 'progresses', 'deliveries', 'driver', 'notices'));
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
}
