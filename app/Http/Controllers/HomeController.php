<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\{User, Order, Status};

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_orders_count = Order::where('user_id', (int)Auth()->user()->id)->get();

        $pending_orders_count = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'pending')->pluck('id')])->get();
        $processing_orders_count = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'transit')->pluck('id')])->latest()->take(5)->get();
        $completed_orders_count = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'delivered')->pluck('id')])->get();

        $pending_orders = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'pending')->pluck('id')])->latest()->take(5)->get();
        $processing_orders = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'transit')->pluck('id')])->latest()->take(5)->get();
        $completed_orders = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'delivered')->pluck('id')])
            ->orWhere(['status_id' => Status::where('name', 'unpaid')->pluck('id')])
            ->orWhere(['status_id' => Status::where('name', 'paid')->pluck('id')])
            ->latest()->take(5)->get();

        return view('home.index', compact('pending_orders', 'pending_orders_count', 'processing_orders', 'processing_orders_count','completed_orders', 'completed_orders_count', 'all_orders_count'));
    }

    public function view_profile($id)
    {
        $user = User::find($id);

        // check if user is true
        if($user->id != (int)Auth::user()->id){
            return redirect()->back()->with(['error'=> 'Stay in your place!']);
        }

        return view('home.view_profile', compact('user'));
    }

    public function store_profile(Request $request, $user_id)
    {
        // User
        $user = User::find($user_id);

        // validate input
        $this->validate($request, [
            'first_name' => 'min:4',
            'last_name' => 'min:4',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'mobile' => 'numeric',
        ]);

        // store in user table
        $user->update([
            'fname' => $request->get('first_name'),
            'lname' => $request->get('last_name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
        ]);

        // redirect to profiles page with a message
        return redirect()->route('user.view_profile', compact('user'));
    }
}
