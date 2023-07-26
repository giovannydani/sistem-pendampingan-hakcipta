<?php

namespace App\Http\Controllers\User;

use App\Enums\AjuanStatus;
use App\Models\Country;
use App\Models\CreationType;
use Illuminate\Http\Request;
use App\Models\DetailHakcipta;
use App\Models\HolderHakcipta;
use App\Models\ApplicationType;
use App\Models\ParameterHolder;
use App\Http\Controllers\Controller;
use App\Models\AttachmentHakcipta;
use App\Traits\CustomAttribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Validator as ValidationValidator;

class AjuanController extends Controller
{
    use CustomAttribute;

    private $_minHolderCount = 1;
    private $_minCreatorCount = 1;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.ajuan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(DetailHakcipta $detailHakcipta)
    {
        $detailHakcipta->load('attachment');
        // return $detailHakcipta;

        $data = [
            'detailHakcipta' => $detailHakcipta,
            'application_types' => ApplicationType::all(),
            'creation_types' => CreationType::all(),
            'countries' => Country::all(),
        ];

        // return $data;

        return view('user.ajuan.add2', $detailHakcipta, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DetailHakcipta $detailHakcipta)
    {
        $rules = [];

        $rulesDetail = [
            'application_type_id' => ['required', 'exists:application_types,id'],
            'creation_type_id' => ['required', 'exists:creation_types,id'],
            'creation_subtype_id' => ['required', 'exists:creation_subtypes,id'],
            'title' => ['required', 'max:255'],
            'short_description' => ['required'],
            'first_announced_date' => ['required'],
            'first_announced_country_id' => ['required', 'exists:countries,id'],
            'first_announced_city' => ['required', 'max:255'],
        ];
        $rules = array_merge($rules, $rulesDetail);

        $rulesAttachment = [
            // 'salinan_resmi_akta_pendirian_badan_hukum' => ['required', File::types(['pdf'])->max(5000) ],
            'turnitin' => ['required', File::types(['pdf'])->max(5000) ],
            'scan_npwp' => ['required', File::types(['pdf'])->max(5000)],
            'contoh_ciptaan' => ['required', File::types(['pdf'])->max(5000)],
            'scan_ktp' => ['required', File::types(['pdf'])->max(5000)],
            'surat_pernyataan' => ['required', File::types(['pdf'])->max(5000)],
            'bukti_pengalihan_hak_cipta' => ['required', File::types(['pdf'])->max(5000)],
        ];
        $rules = array_merge($rules, $rulesAttachment);

        $validator = Validator::make(
            data: $request->all(),
            rules: $rules,
            attributes: $this->ajuanAttribute(),
        );
        
        $validator->after(function (ValidationValidator $validator) use ($detailHakcipta) {
            $creator = $detailHakcipta->isCreatorExist($this->_minCreatorCount);
            if ($creator->status == false) {
                $validator->errors()->add('creator', $creator->message);
            }

            $holder = $detailHakcipta->isHolderExist($this->_minHolderCount);
            if ($holder->status == false) {
                $validator->errors()->add('holder', $holder->message);
            }
        });

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $dataDetail = [
            'application_type_id' => $request->application_type_id,
            'creation_type_id' => $request->creation_type_id,
            'creation_subtype_id' => $request->creation_subtype_id,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'first_announced_date' => $request->first_announced_date,
            'first_announced_country_id' => $request->first_announced_country_id,
            'first_announced_city' => $request->first_announced_city,
            'is_submited' => 1,
        ];
        $detailHakcipta->update($dataDetail);

        $dataAttachment = [
            // 'salinan_resmi_akta_pendirian_badan_hukum' => $request->file('salinan_resmi_akta_pendirian_badan_hukum')->store('attachment-hakcipta_'.$detailHakcipta->id),
            'turnitin' => $request->file('turnitin')->store('attachment-hakcipta_'.$detailHakcipta->id),
            'scan_npwp' => $request->file('scan_npwp')->store('attachment-hakcipta_'.$detailHakcipta->id),
            'contoh_ciptaan' => $request->file('contoh_ciptaan')->store('attachment-hakcipta_'.$detailHakcipta->id),
            'scan_ktp' => $request->file('scan_ktp')->store('attachment-hakcipta_'.$detailHakcipta->id),
            'surat_pernyataan' => $request->file('surat_pernyataan')->store('attachment-hakcipta_'.$detailHakcipta->id),
            'bukti_pengalihan_hak_cipta' => $request->file('bukti_pengalihan_hak_cipta')->store('attachment-hakcipta_'.$detailHakcipta->id),
        ];

        if ($request->link_contoh_ciptaan) {
            $dataAttachment['link_contoh_ciptaan']=$request->link_contoh_ciptaan;
        }
        
        $detailHakcipta->attachment()->create($dataAttachment);

        Alert::toast('Success Menambah Ajuan', 'success');

        return redirect()->to(route('user.ajuan.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailHakcipta  $detailHakcipta
     * @return \Illuminate\Http\Response
     */
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
            'application_types' => ApplicationType::all(),
            'creation_types' => CreationType::all(),
            'countries' => Country::all(),
        ];

        return view('user.ajuan.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailHakcipta  $detailHakcipta
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailHakcipta $detailHakcipta)
    {
        $detailHakcipta->load([
            'attachment',
            'owner:name,email,id',
            'application_type',
            'creation_type',
            'creation_subtype',
            'first_announced_country',
        ]);

        // return $detailHakcipta;

        $data = [
            'detailHakcipta' => $detailHakcipta,
            'application_types' => ApplicationType::all(),
            'creation_types' => CreationType::all(),
            'countries' => Country::all(),
        ];

        return view('user.ajuan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailHakcipta  $detailHakcipta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailHakcipta $detailHakcipta)
    {
        $detailHakcipta->load([
            'attachment'
        ]);

        // return $detailHakcipta;
        $attachment = $detailHakcipta->attachment;

        $rules = [];

        $rulesDetail = [
            'application_type_id' => ['required', 'exists:application_types,id'],
            'creation_type_id' => ['required', 'exists:creation_types,id'],
            'creation_subtype_id' => ['required', 'exists:creation_subtypes,id'],
            'title' => ['required', 'max:255'],
            'short_description' => ['required'],
            'first_announced_date' => ['required'],
            'first_announced_country_id' => ['required', 'exists:countries,id'],
            'first_announced_city' => ['required', 'max:255'],
        ];
        $rules = array_merge($rules, $rulesDetail);

        $rulesAttachment = [
            // 'salinan_resmi_akta_pendirian_badan_hukum' => [File::types(['pdf'])->max(5000)],
            'turnitin' => [File::types(['pdf'])->max(5000)],
            'scan_npwp' => [File::types(['pdf'])->max(5000)],
            'contoh_ciptaan' => [File::types(['pdf'])->max(5000)],
            'scan_ktp' => [File::types(['pdf'])->max(5000)],
            'surat_pernyataan' => [File::types(['pdf'])->max(5000)],
            'bukti_pengalihan_hak_cipta' => [File::types(['pdf'])->max(5000)],
        ];
        $rules = array_merge($rules, $rulesAttachment);

        $validator = Validator::make(
            data: $request->all(),
            rules: $rules,
            attributes: $this->ajuanAttribute(),
        );
        
        $validator->after(function (ValidationValidator $validator) use ($detailHakcipta) {
            $creator = $detailHakcipta->isCreatorExist($this->_minCreatorCount);
            if ($creator->status == false) {
                $validator->errors()->add('creator', $creator->message);
            }

            $holder = $detailHakcipta->isHolderExist($this->_minHolderCount);
            if ($holder->status == false) {
                $validator->errors()->add('holder', $holder->message);
            }
        });

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $dataDetail = [
            'application_type_id' => $request->application_type_id,
            'creation_type_id' => $request->creation_type_id,
            'creation_subtype_id' => $request->creation_subtype_id,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'first_announced_date' => $request->first_announced_date,
            'first_announced_country_id' => $request->first_announced_country_id,
            'first_announced_city' => $request->first_announced_city,
            'status' => AjuanStatus::AdminProcess,
            'is_submited' => 1,
        ];
        $detailHakcipta->update($dataDetail);

        $dataAttachment = [];

        if ($request->link_contoh_ciptaan) {
            $dataAttachment['link_contoh_ciptaan']=$request->link_contoh_ciptaan;
        }else {
            $dataAttachment['link_contoh_ciptaan']=null;
        }

        // if ($request->file('salinan_resmi_akta_pendirian_badan_hukum')) {
        //     Storage::delete($attachment->salinan_resmi_akta_pendirian_badan_hukum);
        //     $dataAttachment['salinan_resmi_akta_pendirian_badan_hukum'] = $request->file('salinan_resmi_akta_pendirian_badan_hukum')->store('attachment-hakcipta_'.$detailHakcipta->id);
        // }

        if ($request->file('turnitin')) {
            Storage::delete($attachment->turnitin);
            $dataAttachment['turnitin'] = $request->file('turnitin')->store('attachment-hakcipta_'.$detailHakcipta->id);
        }

        if ($request->file('scan_npwp')) {
            Storage::delete($attachment->scan_npwp);
            $dataAttachment['scan_npwp'] = $request->file('scan_npwp')->store('attachment-hakcipta_'.$detailHakcipta->id);
        }

        if ($request->file('contoh_ciptaan')) {
            Storage::delete($attachment->contoh_ciptaan);
            $dataAttachment['contoh_ciptaan'] = $request->file('contoh_ciptaan')->store('attachment-hakcipta_'.$detailHakcipta->id);
        }

        if ($request->file('scan_ktp')) {
            Storage::delete($attachment->scan_ktp);
            $dataAttachment['scan_ktp'] = $request->file('scan_ktp')->store('attachment-hakcipta_'.$detailHakcipta->id);
        }

        if ($request->file('surat_pernyataan')) {
            Storage::delete($attachment->surat_pernyataan);
            $dataAttachment['surat_pernyataan'] = $request->file('surat_pernyataan')->store('attachment-hakcipta_'.$detailHakcipta->id);
        }

        if ($request->file('bukti_pengalihan_hak_cipta')) {
            Storage::delete($attachment->bukti_pengalihan_hak_cipta);
            $dataAttachment['bukti_pengalihan_hak_cipta'] = $request->file('bukti_pengalihan_hak_cipta')->store('attachment-hakcipta_'.$detailHakcipta->id);
        }
        
        // $detailHakcipta->attachment()->create($dataAttachment);
        $attachment->update($dataAttachment);

        // $detailHakcipta->attachment()->update();

        Alert::toast('Success Mengedit Ajuan', 'success');

        return redirect()->to(route('user.ajuan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailHakcipta  $detailHakcipta
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailHakcipta $detailHakcipta)
    {
        $detailHakcipta->delete();

        return "success";
    }

    public function generateAdd()
    {
        $detailHakcipta = DetailHakcipta::create([
            'owner_id' => Auth::id(),
        ]);

        $defaultHolder = ParameterHolder::all();

        foreach ($defaultHolder as $key => $value) {
            $dataCreate = [
                'detail_hakcipta_id' => $detailHakcipta->id,
                'name' => $value->name,
                'email' => $value->email,
                'no_telp' => $value->no_telp,
                'nationality_id' => $value->nationality_id,
                'address' => $value->address,
                'country_id' => $value->country_id,
                'postal_code' => $value->postal_code,
                'is_manageable' => 0,
            ];
    
            if ($value->is_company) {
                $dataCreate['is_company'] = $value->is_company;
            }else {
                $dataCreate['is_company'] = 0;
            }
    
            if ($value->country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec') {
                $dataCreate['province_id'] = $value->province_id;
                $dataCreate['district_id'] = $value->district_id;
                $dataCreate['subdistrict_id'] = $value->subdistrict_id;
            }else {
                $dataCreate['district'] = $value->district;
            }
    
            HolderHakcipta::create($dataCreate);
        }

        return $detailHakcipta->id;
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

    public function data()
    {
        $data = Auth::user()->applications;

        return DataTables::of($data)->make(true);
    }

    public function log(DetailHakcipta $detailHakcipta)
    {
        $detailHakcipta->load([
            'comments',
        ]);
        
        // return $detailHakcipta->status->text();

        // return $detailHakcipta;

        return view('user.ajuan.log', ['detailHakcipta' => $detailHakcipta]);
    }

    
}
