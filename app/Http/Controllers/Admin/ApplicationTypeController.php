<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ApplicationType;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ApplicationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.application-type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.application-type.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make(
            data: $request->all(),
            rules: [
                'name' => ['required', 'max:255'],
            ],
        )->validate();

        // return $request;

        ApplicationType::create([
            'name' => $request->name,
        ]);

        Alert::toast('Success Adding Application Type', 'success');

        return redirect()->to(route('admin.application-type.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ApplicationType  $applicationType
     * @return \Illuminate\Http\Response
     */
    public function show(ApplicationType $applicationType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ApplicationType  $applicationType
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationType $applicationType)
    {
        return view('admin.application-type.edit', ['applicationType' => $applicationType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ApplicationType  $applicationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplicationType $applicationType)
    {
        Validator::make(
            data: $request->all(),
            rules: [
                'name' => ['required', 'max:255'],
            ],
        )->validate();

        $applicationType->update([
            'name' => $request->name,
        ]);

        Alert::toast('Success Update Application Type', 'success');

        return redirect()->to(route('admin.application-type.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApplicationType  $applicationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplicationType $applicationType)
    {
        $applicationType->delete();

        return 'success';
    }

    public function restore($applicationType)
    {
        ApplicationType::withTrashed()->where('id', $applicationType)->restore();
        // $applicationType->restore();
        return 'success';
    }

    public function data()
    {
        $data = ApplicationType::withTrashed()->get();

        return DataTables::of($data)->make(true);
    }
}
