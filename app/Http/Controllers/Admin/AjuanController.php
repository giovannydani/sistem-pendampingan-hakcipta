<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AjuanStatus;
use App\Models\Country;
use App\Models\CreationType;
use Illuminate\Http\Request;
use App\Models\DetailHakcipta;
use App\Models\ApplicationType;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AjuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.ajuan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DetailHakcipta $detailHakcipta)
    {
        $detailHakcipta->load([
            'attachment',
            'owner:name,email,id',
            'application_type',
            'creation_type',
            'creation_subtype',
            'first_announced_country',
            'newcomment',
        ]);

        $data = [
            'detailHakcipta' => $detailHakcipta,
        ];

        return view('admin.ajuan.check', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, DetailHakcipta $detailHakcipta)
    {
        Validator::make(
            data: $request->all(),
            rules: [
                'comment' => ['required']
            ],
        )->validate();

        $detailHakcipta->update([
            'status' => AjuanStatus::Revision,
        ]);

        $detailHakcipta->comments()->create([
            'comment' => $request->comment,
        ]);

        Alert::toast('Success Menabahkan Komen ke Ajuan', 'success');

        return redirect()->to(route('admin.ajuan.index'));
    }

    public function show(DetailHakcipta $detailHakcipta)
    {
        $detailHakcipta->load([
            'attachment',
            'owner:name,email,id',
            'application_type',
            'creation_type',
            'creation_subtype',
            'first_announced_country',
            'newcomment',
        ]);

        $data = [
            'detailHakcipta' => $detailHakcipta,
        ];

        return view('admin.ajuan.detail', $data);
    }

    public function finishAjuan(DetailHakcipta $detailHakcipta)
    {
        $detailHakcipta->update([
            'status' => AjuanStatus::Finish,
        ]);

        return "success";
    }

    public function generateSubjenis(Request $request, CreationType $creationType)
    {
        $datas = $creationType->subtypes;

        $text = "<option value=\"\">- Pilih Sub-Jenis Ciptaan -</option>";

        foreach ($datas as $key => $data) {
            if ($request->selected_subjenis && $request->selected_subjenis == $data->id) {
                $text .= "<option value=\"".$data->id."\" selected>".$data->name."</option>";
            }

            $text .= "<option value=\"".$data->id."\">".$data->name."</option>";
        }
        return $text;
    }

    public function data(Request $request)
    {
        $data = DetailHakcipta::query()
        ->with([
            'owner'
        ])
        ->orderBy('status') 
        ->IsSubmited()
        ->when($request->input('_startDate'), function ($query) use ($request){
            $startDate = Carbon::parse($request->input('_startDate'))->startOfDay();
            $query->where('updated_at', '>', $startDate);
        })
        ->when($request->input('_endDate'), function ($query) use ($request){
            $endDate = Carbon::parse($request->input('_endDate'))->endOfDay();
            $query->where('updated_at', '<', $endDate);
        })
        ->get();

        return DataTables::of($data)->make(true);
    }

    public function dataCreator(DetailHakcipta $detailHakcipta)
    {
        $data = $detailHakcipta->creators;
        $data->load([
            'nationality',
            'province',
            'districta',
        ]);

        $data->loadCount([
            'province',
            'district'
        ]);

        return DataTables::of($data)->make(true);
    }

    public function dataHolder(DetailHakcipta $detailHakcipta){
        $data = $detailHakcipta->holders;
        
        $data->load([
            'nationality',
            'province',
            'districta',
        ]);

        $data->loadCount([
            'province',
            'district'
        ]);

        return DataTables::of($data)->make(true);
    }
}
