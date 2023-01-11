<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    //
    public function home()
    {
        $user = User::findOrFail('1');
        return view('auth.change-password', compact('user'));
    }

    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'password' => Hash::make($request->password),
            'isForgotPassword' => 0,
        ]);
        return redirect('/')->with('success', 'Password has been changed');
    }
}
