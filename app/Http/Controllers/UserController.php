<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        $title = 'Dashboard | Users';
        $breadcrumbs = [
            ['name' => 'Dashboard / Filiations', 'route' => route('admin.filiation.index')],
            ['name' => 'Users', 'route' => null],
        ];
        return view('users.index', compact('users', 'breadcrumbs', 'title'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $title = 'Dashboard | Create user';
        $breadcrumbs = [
            ['name' => 'Dashboard / Filiations', 'route' => route('admin.filiation.index')],
            ['name' => 'Create user', 'route' => null],
        ];
        return view('users.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store user in DB.
     * @param \App\Http\Requests\StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
            'login' => $request->login,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }

    /**
     * Remove the specified user from DB.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
}
