<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\User;
use GuzzleHttp\Client;
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

        return response()->json([
                'accessToken' => $accessToken, 
                'status' => 200
            ],
            200
        );

    }

    public function login(Request $request)
    {
    	// dd($request);

        $validatedData = $request->validate([
    		'email' => 'required|email',
    		'password' => 'required'
    	]);

        if(Auth::attempt($validatedData)){

            $user = Auth::user();

            $accessToken =  $user->createToken(env('Client name'))->accessToken;

            return response()->json([
                    'accessToken' => $accessToken, 
                    'status' => 200
                ],
                200
             ); 
        } 
        else{

            return response()->json(['error'=>'Unauthorised'], 401);

        }

        // return response(['user'=>$user, 'accessToken'=>$accessToken]);

        // $http = new Client;

        // $response = $http->post(url('oauth/token'), [
        //     'form_params' => [
        //         'grant_type' => 'password',
        //         'client_id' => 3,
        //         'client_secret' => 'kMdpsAiwLPv9leJrpd96B7muRdAht10fY6NrooQ1',
        //         'username' => $request->email,
        //         'password' => $request->password,
        //         'scope' => '',
        //     ],
        // ]);

        // return response(['data' => $response->getBody()]);
    }

    public function update(Request $request, $id)
    {
        // User details
        $user = User::find($id);

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

        // return json response
        $response = [ 
            'status' => '200',
            'message' => 'Ok',
        ];

        return response()->json($response, 200);
        
    }

}
