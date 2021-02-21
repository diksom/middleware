<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Models\OtpCode;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            // 'username' => request('username'),
            'email' => request('email')
            // 'password' => bcrypt(request('password'))
        ]);
        $random = mt_rand(100000, 999999);
        $valid_until = Carbon::now()->addMinutes(5);
        $otp = OtpCode::create([
            'valid_until' => $valid_until,
            'otp' => $random,
            'user_id' => $user->id
        ]);

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Silahkan cek email',
            'data' => $user
        ], 200);
    }
}
