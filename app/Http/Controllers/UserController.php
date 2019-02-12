<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\userForgotPassword;
use Illuminate\Http\Request;
use App\Mail\userRegistered;
use App\User;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        //validasi
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required|min:8',
        ]);

        // query login user
        $user = User::where('email', $request->email)->where('status', 1)->where('role', 1)->first();

        if($user) { //jika query login user benar
            // verifikasi password hash
            @$pwd = Hash::check($request->password, $user->password);
    
            if($pwd) {
                Session::put(['email' => @$user->email, 'role' => @$user->role]); //membuat session
                Session::save(); //simpan agar bisa get data untuk middleware

                return redirect('/');
            } else {
                return redirect('/login')->with('status', 'Email or Username invalid');
            }
        }

        if(!$user) { //jika query login user salah
            // query login admin
            $user = User::where('email', $request->email)->where('status', 1)->where('role', 2)->first();
            
            // verifikasi password hash
            @$pwd = Hash::check($request->password, $user->password);
    
            if($pwd) {
                Session::put(['email' => @$user->email, 'role' => @$user->role]); //membuat session
                Session::save(); //simpan agar bisa get data untuk middleware
                
                return redirect('/admin');
            } else {
                return redirect('/login')->with('status', 'Email or Username invalid');
            }
        }
       
        // dd($user->role);
    }

    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        //validasi
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8',
        ]);

        //save
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'token'    => str_random(20),
        ]);

        // send mail
        Mail::to($user->email)->send(new userRegistered($user));

        //redirect
        return redirect('/register')->with('status', 'Thanks, check yours email');
    }
    
    public function verify($token, $email) //untuk verifikasi register
    {
        //temukan email user
        $user = User::where('email', $email)->first();

        //jika token tidak cocok
        if($user->token != $token) {
            return redirect('/login')->with('status', 'Token invalid');
        }

        $user->status = 1; //ubah status user menjadi satu
        $user->save();

        return redirect('/login')->with('success', 'You can login now');
    }

    public function forgot()
    {
        return view('forgot');
    }

    public function forgotPost(Request $request)
    {
        //validasi
        $this->validate($request, [
            'email'     => 'required|email',
        ]);

        // query cek email
        $user = User::where('email', $request->email)->first();

        if(!$user) return redirect('/forgot')->with('status', 'email not found');

        // send mail
        Mail::to($user->email)->send(new userForgotPassword($user));
                   
        return redirect('/forgot')->with('success', 'Check yours email');
    }
    
    public function reset($token, $email) //untuk verifikasi register
    {
        //temukan email user
        $user = User::where('email', $email)->first();

        //jika token tidak cocok
        if(@$user->token == $token) {
            return view('/resetPassword', ['users' => $user]);
        }

        return redirect('/forgot')->with('status', 'Token invalid');

    } 

    public function resetPost(Request $request) //untuk verifikasi register
    {
        //validasi
        $this->validate($request, [
            'email'     => 'required|email',
            'npassword' => 'min:8|required_with:rpassword|same:rpassword',
            'rpassword' => 'min:8'
        ]);

        // temukan email user
        $user = User::where('email', $request->email)->first();

        //jika token tidak cocok
        if(@$user->token != $request->token) {
            return redirect('/forgot')->with('status', 'Token invalid');
        }

        $user->password = Hash::make($request->rpassword); //ubah password
        $user->save();

        return redirect('/login')->with('success', 'You can login now');
    }

    public function logout(Request $request)
    {
        $request->session()->flush(); //flush hapus semua data session

        return redirect('/login');
    }
}
