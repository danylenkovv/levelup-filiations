<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show form for password change
     */
    public function showChangeForm()
    {
        return view('auth.password_change');
    }

    /**
     * Change default user password
     */
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/');
    }
}
