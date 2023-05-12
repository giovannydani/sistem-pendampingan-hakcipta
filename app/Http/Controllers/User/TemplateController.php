<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\TemplateDocument;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templateDocument = TemplateDocument::all();
        return view('user.template.index', ['templateDocuments' => $templateDocument]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TemplateDocument  $templateDocument
     * @return \Illuminate\Http\Response
     */
    public function show(TemplateDocument $templateDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TemplateDocument  $templateDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(TemplateDocument $templateDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TemplateDocument  $templateDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TemplateDocument $templateDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemplateDocument  $templateDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemplateDocument $templateDocument)
    {
        //
    }

    public function download(TemplateDocument $templateDocument)
    {
        // return $templateDocument;
        return Storage::download($templateDocument->file, $templateDocument->file_name);
    }
}
