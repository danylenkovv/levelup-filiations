<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;

use App\Setting;

class SettingController extends Controller
{
    /**
     * Show the form for editing site settings
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        return view('settings.index', compact('settings'));
    }

    /**
     * Update site settings records in DB
     * @param \App\Http\Requests\UpdateSettingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSettingRequest $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->route('admin.filiation.index')->with('success', 'Settings updated successfully! Go to the app page');
    }
}
