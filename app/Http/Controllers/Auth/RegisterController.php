<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['string', 'required'],
            'email' => ['email', 'required',  'unique:users,email']
        ]);
        $data_request = $request->all();
        $user = User::create($data_request);
        $data['user'] = $user;
        return response()->json([
            'response_code' => '00',
            'response_message' => 'Silahkan cek email',
            'data' => $data
        ], 200);
    }
}
