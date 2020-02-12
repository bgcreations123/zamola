<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class WelcomeController extends Controller
{
    public function index(){
    	$clients = Client::where('public', 'Yes')->get();

    	return view('welcome', compact('clients'));
    }
}
