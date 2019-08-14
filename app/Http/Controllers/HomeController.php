<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\{User, Order, Status};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pending_orders_count = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'pending')->pluck('id')])->get();
        $processing_orders_count = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'transit')->pluck('id')])->latest()->take(5)->get();
        $completed_orders_count = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'paid')->pluck('id')])->get();

        $pending_orders = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'pending')->pluck('id')])->latest()->take(5)->get();
        $processing_orders = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'transit')->pluck('id')])->latest()->take(5)->get();
        $completed_orders = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'paid')->pluck('id')])->latest()->take(5)->get();

        return view('home.index', compact('pending_orders', 'pending_orders_count','processing_orders', 'processing_orders_count','completed_orders', 'completed_orders_count'));
    }

    public function profile($id)
    {
        $user = User::find($id);

        // check if user is true
        if($user->id != (int)auth()->user()->id){
            return redirect()->back()->with(['error'=> 'Stay in your place!']);
        }

        return view('home.profile', compact('user'));
    }
}
