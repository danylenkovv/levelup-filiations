<?php

namespace App\Http\Controllers;

use App\Filiation;
use App\Http\Requests\StoreFiliationRequest;
use App\Http\Requests\UpdateFiliationRequest;
use App\Traits\PhotoTrait;

class FiliationController extends Controller
{
    use PhotoTrait;
    /**
     * Display a list of the filiations for app users.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function appIndex()
    {
        $filiations = Filiation::all();
        $title = 'Filiations';
        return view('filiations.index', compact('filiations', 'title'));
    }

    /**
     * Display a list of the filiations for administrators.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $filiations = Filiation::all();
        $title = 'Dashboard | Filiations';
        $breadcrumbs = [
            ['name' => 'Dashboard / Filiations', 'route' => null],
        ];
        return view('filiations.admin', compact('filiations', 'breadcrumbs', 'title'));
    }

    /**
     *  Show the form for creating a new filiation.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $title = 'Dashboard | Create filiation';
        $breadcrumbs = [
            ['name' => 'Dashboard / Filiations', 'route' => route('admin.filiation.index')],
            ['name' => 'Create filiation', 'route' => null],
        ];
        return view('filiations.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created filiation in DB.
     * @param \App\Http\Requests\StoreFiliationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreFiliationRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo_url')) {
            $data['photo_url'] = $this->savePhoto($request->file('photo_url'));
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
        $title = 'Dashboard | Edit filiation';
        $breadcrumbs = [
            ['name' => 'Dashboard / Filiations', 'route' => route('admin.filiation.index')],
            ['name' => 'Edit filiation', 'route' => null],
        ];
        return view('filiations.edit', ['filiation' => $filiation, 'breadcrumbs' => $breadcrumbs, 'title' => $title]);
    }

    /**
     * Update the specified filiation in DB.
     * @param \App\Http\Requests\UpdateFiliationRequest $request
     * @param \App\Filiation $filiation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateFiliationRequest $request, Filiation $filiation)
    {
        $data = $request->all();

        if ($request->hasFile('photo_url')) {
            $this->deletePhoto($filiation->photo_url);
            $data['photo_url'] = $this->savePhoto($request->file('photo_url'));
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
        $this->deletePhoto($filiation->photo_url);
        $filiation->delete();

        return redirect()->route('admin.filiation.index')->with('success', 'Filiation deleted successfully.');
    }
}
