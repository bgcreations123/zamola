<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\{Order, Shipment, Status, Comment};

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Auth::user();

        $assignments = Shipment::where(['staff_id' => $staff->id, 'status_id' => Status::where('name', 'approved')->pluck('id')])
        ->orWhere(['status_id' => Status::where('name', 'transit')->pluck('id')])
        ->orWhere(['status_id' => Status::where('name', 'delivered')->pluck('id')])
        ->orWhere(['status_id' => Status::where('name', 'rejected')->pluck('id')])
        ->paginate(5);

        $unpaid = Shipment::where(['staff_id' => $staff->id, 'status_id' => Status::where('name', 'unpaid')->pluck('id')])->get();

        $paid = Shipment::where(['staff_id' => $staff->id, 'status_id' => Status::where('name', 'paid')->pluck('id')])->get();

        $notices = Comment::where(['receiver_id' => $staff->id, 'status' => '0'])->get();

        return view('staff.index', compact('staff', 'pending_orders', 'assignments', 'unpaid', 'paid', 'notices'));
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
