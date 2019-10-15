<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\{Page};

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index(Request $request, $slug){
    	// $slug = substr(strrchr(url()->current(),"/"),1);

    	// dd($slug);
        
    	$page = Page::where([['slug', $slug], ['status', 'ACTIVE']])->firstOrFail();

    	return view('home.page', compact('page'));

    }

}