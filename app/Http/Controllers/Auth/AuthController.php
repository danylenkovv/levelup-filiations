<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';
    protected $username = 'login';

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Handle the authenticated user logic.
     */
    protected function authenticated($user)
    {
        if (Hash::check('admin', $user->password)) {
            return redirect()->route('password.change');
        }

        return redirect()->intended($this->redirectTo);
    }
}
