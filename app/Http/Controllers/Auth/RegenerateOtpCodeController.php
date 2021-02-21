<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OtpCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegenerateOtpCodeController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::where('email', $request->user_id)->first();
        $otp_code = OtpCode::find($user->user_id);
        $data['otp_code'] = $otp_code;
        return $data;
        // $email = User::find($otp_code->user_id);
        // return $email;
        // $random = mt_rand(100000, 999999);
        // $valid_until = Carbon::now()->addMinutes(5);
        // $otp_code->otp = $random;
        // $otp_code->valid_until = $valid_until;
        // $otp_code->save();

        // return response()->json([
        //     'response_code' => '00',
        //     'response_message' => 'Silahkan cek email',
        //     'data' => $otp
        // ], 200);
    }
}
