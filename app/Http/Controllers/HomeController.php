<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use File;
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

        $pending_orders = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'pending')->pluck('id')])->latest()->take(5)->get();
        $processing_orders = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'approved')->pluck('id')])->latest()->take(5)->get();
        $completed_orders = Order::where(['user_id' => (int)Auth()->user()->id, 'status_id' => Status::where('name', 'delivered')->pluck('id')])
            ->orWhere(['status_id' => Status::where('name', 'unpaid')->pluck('id')])
            ->orWhere(['status_id' => Status::where('name', 'paid')->pluck('id')])
            ->latest()->take(5)->get();

        return view('home.index', compact('pending_orders', 'processing_orders','completed_orders', 'all_orders_count'));
    }

    public function view_profile($id)
    {
        // User
        $user = User::find($id);

        // Role
        $role = Auth::user()->role;

        // check user role is admin
        if($role->name == 'admin'){
            return redirect()->route('voyager.profile');
        }

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

        // Handle update of Avatar
        if($request->hasFile('file')){
            $directory = public_path('storage/users/'.$user->id);

            // create directory if it doesnt exist
            if (!file_exists($directory)) {
                mkdir($directory, 755, true);
            }else{
                // delete old file
                $old_file = public_path('storage/'.$user->avatar);

                if (File::exists($old_file)) { 
                    unlink($old_file);
                }
            }

            $file = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300, 300)->save($directory.'/'.$filename);

            $user->avatar = '/users/'.$user->id.'/'.$filename;
            $user->save();
        }

        // validate input
        $this->validate($request, [
            'first_name' => 'min:4',
            'last_name' => 'min:4',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'mobile' => 'numeric',
            'address' => 'min:2',
        ]);

        // store in user table
        $user->update([
            'fname' => $request->get('first_name'),
            'lname' => $request->get('last_name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'address' => $request->get('address'),
        ]);
        
        // redirect to profiles page with a message
        return redirect()->route('user.view_profile', compact('user'))->with('success', 'Your details have been updated successfully.');
    }
}
