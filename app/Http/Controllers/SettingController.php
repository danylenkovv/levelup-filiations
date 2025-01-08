<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        return view('settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'logo_text' => 'required|string|max:255',
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|string',
            'footer_text' => 'required|string|max:255',
        ]);

        foreach ($request->except('_token') as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->route('admin')->with('success', 'Settings updated successfully! Go to the app page');
    }
}
