<?php

namespace App\Http\Controllers\Auth;

use App\Events\SendOTPEvent;
use App\Events\UserRegisteredEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\OtpCode;

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

        $otpcode = OtpCode::where('user_id', $user->id)->first();
        $data1['otpcode'] = $otpcode;
        event(new SendOTPEvent($otpcode));
        event(new UserRegisteredEvent($user));

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Silahkan cek email',
            'data' => $data, $data1
        ], 200);
    }
}
