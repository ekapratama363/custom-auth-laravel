<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin(Request $request)
    {
        $session = $request->session()->all(); //ambil nilai session
        return view('admin.master', ['data' => $session]);
    }

    public function user(Request $request)
    {
        $session = $request->session()->all(); //ambil nilai session
        return view('master', ['data' => $session]);
    }
}
