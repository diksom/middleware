<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TestController extends Controller
{
    public function admin()
    {
        return view('admin');
    }
    public function user()
    {
        return view('user');
    }
}
