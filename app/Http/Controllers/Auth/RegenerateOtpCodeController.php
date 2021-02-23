<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        return response()->json([
            'response_code' => '00',
            'response_message' => 'Berhasil Regenerate Otp silahkan cek email',
            'data' => $data
        ], 200);
    }
}
