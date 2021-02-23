<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\OtpCode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VerificationController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);
        $otp_code = OtpCode::where('otp', $request->otp)->first();
        if (!$otp_code) {
            return response()->json([
                'response_code' => '01',
                'response_message' => 'OTP Code tidak ditemukan',
            ], 200);
        }
        $now = Carbon::now();
        if ($now > $otp_code->valid_until) {
            return response()->json([
                'response_code' => '01',
                'response_message' => 'OTP sudah tidak berlaku silahkan generate ulang',
            ], 200);
        }

        $user = User::find($otp_code->user_id);
        $user->email_verified_at = Carbon::now();
        $user->save();

        $otp_code->delete();
        $data['users'] = $user;
        return response()->json([
            'response_code' => '00',
            'response_message' => 'User berhasil di verifikasi',
            'data' => $data
        ], 200);
    }
}
