<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordChangeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
    public function updatePassword(PasswordChangeRequest $request)
    {
        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.filiation.index')->with('success', 'Password changed successfully!');
    }
}
