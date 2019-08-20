<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function register(Request $request)
    {
    	$validatedData = $request->validate([
    		'name' => 'required|max:55',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|confirmed'
    	]);

    	$validatedData['password'] = bcrypt($request->password);

    	$user = User::create($validatedData);

    	$accessToken = $user->createToken('authToken')->accessToken;

    	return response()->json(['user' => $user, 'accessToken' => $accessToken]);
    }

    public function login(Request $request)
    {
    	$validatedData = $request->validate([
    		'email' => 'required|email',
    		'password' => 'required'
    	]);

    	if(!auth()->attempt($validatedData)){
    		return response()->json(['message' => 'Invalid credintials!']);
    	}

    	$user = auth()->user();

    	$accessToken = $user->createToken('authToken')->accessToken;

    	return response()->json(['user' => $user, 'accessToken' => $accessToken]);
    }

}
