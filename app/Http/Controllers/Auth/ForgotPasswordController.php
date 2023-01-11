<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    
    use SendsPasswordResetEmails;

    public function home()
    {
        $email = Config::get('forgetPassword.email');
        return view('auth.forget-password', compact('email'));
    }

    public function forgotPassword()
    {
        $email = Config::get('forgetPassword.email');
        $data = [
            'password' => Str::random(10)
        ];
    
        Mail::send('auth.email', $data, function($message) use($email){
            $message->to($email, 'SuperAdmin')->subject('Reset Password');
        });
        User::where('id', '=', '1')->update([
            'password' => Hash::make($data['password']),
            'isForgotPassword' => 1
        ]);
        return redirect('login')->with('success', 'Password has been reset');
    }
}
