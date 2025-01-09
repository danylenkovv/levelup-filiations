<?php

namespace App\Http\Controllers;

use App\Filiation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FiliationController extends Controller
{
    /**
     * Display a list of the filiations for app users.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function appIndex()
    {
        $filiations = Filiation::all();
        return view('filiations.index', compact('filiations'));
    }

    /**
     * Display a list of the filiations for administrators.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $filiations = Filiation::all();
        return view('filiations.admin', compact('filiations'));
    }

    /**
     *  Show the form for creating a new filiation.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('filiations.create');
    }

    /**
     * Store a newly created filiation in DB.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:filiations,name',
            'photo_url' => 'image|mimes:jpeg,png,jpg|max:2048',
            'map' => 'string|max:300',
            'info' => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo_url')) {
            $fileName = time() . '_' . $request->file('photo_url')->getClientOriginalName();
            Storage::disk('public')->put('uploads/' . $fileName, file_get_contents($request->file('photo_url')));
            $data['photo_url'] = 'uploads/' . $fileName;
        }

        Filiation::create($data);

        return redirect()->route('admin.filiation.index')->with('success', 'Filiation created successfully.');
    }

    /**
     * Show the form for editing the specified filiation.
     * @param \App\Filiation $filiation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Filiation $filiation)
    {
        return view('filiations.edit', ['filiation' => $filiation]);
    }

    /**
     * Update the specified filiation in DB.
     * @param \Illuminate\Http\Request $request
     * @param \App\Filiation $filiation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Filiation $filiation)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:filiations,name,' . $filiation->id,
            'photo_url' => 'image|mimes:jpeg,png,jpg|max:2048',
            'map' => 'string|max:300',
            'info' => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo_url')) {
            if ($filiation->photo_url !== 'uploads/default.jpg' && Storage::disk('public')->exists($filiation->photo_url)) {
                Storage::disk('public')->delete($filiation->photo_url);
            }

            $fileName = time() . '_' . $request->file('photo_url')->getClientOriginalName();
            Storage::disk('public')->put('uploads/' . $fileName, file_get_contents($request->file('photo_url')));
            $data['photo_url'] = 'uploads/' . $fileName;
        }

        $filiation->update($data);

        return redirect()->route('admin.filiation.index')->with('success', 'Filiation updated successfully.');
    }

    /**
     * Remove the specified filiation from the DB.
     * @param \App\Filiation $filiation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Filiation $filiation)
    {
        if ($filiation->photo_url !== 'uploads/default.jpg' && Storage::disk('public')->exists($filiation->photo_url)) {
            Storage::disk('public')->delete($filiation->photo_url);
        }

        $filiation->delete();

        return redirect()->route('admin.filiation.index')->with('success', 'Filiation deleted successfully.');
    }
}
