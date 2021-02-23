<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdatePasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|confirmed|min:6'
        ]);
        User::where('email', $request->email)
            ->update(['password' => bcrypt(request('password'))]);
        return response()->json([
            'response_code' => '00',
            'response_message' => 'Password berhasil diubah',
        ], 200);
    }
}
