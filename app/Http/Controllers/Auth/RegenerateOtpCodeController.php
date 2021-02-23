<?php

namespace App\Http\Controllers\Auth;

use App\Events\SendOTPEvent;
use App\Http\Controllers\Controller;
use App\OtpCode;
use App\User;
use Illuminate\Http\Request;

class RegenerateOtpCodeController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        $user->generate_otp_code();
        $data['user'] = $user;
        $otpcode = OtpCode::where('user_id', $user->id)->first();
        $data1['otpcode'] = $otpcode;
        event(new SendOTPEvent($otpcode));
        return response()->json([
            'response_code' => '00',
            'response_message' => 'Berhasil Regenerate Otp silahkan cek email',
            'data' => $data
        ], 200);
    }
}
