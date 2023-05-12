<?php

namespace App\Http\Controllers\User;

use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\DetailHakcipta;
use App\Models\HolderHakcipta;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class HolderHakciptaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(DetailHakcipta $detailHakcipta)
    {
        $data = [
            'detailHakcipta' => $detailHakcipta,
            'kewarganegaraans' => Country::all(),
            'provinsis' => Province::all(),
        ];

        return view('user.ajuan.holder.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DetailHakcipta $detailHakcipta)
    {
        $rules = [
            'name' => ['required'],
            'email' => ['required'],
            'no_telp' => ['required'],
            'nationality_id' => ['required'],
            'address' => ['required'],
            'country_id' => ['required'],
            'district' => [Rule::requiredIf($request->country_id != '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'province_id' => [Rule::requiredIf($request->country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'district_id' => [Rule::requiredIf($request->country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'subdistrict_id' => [Rule::requiredIf($request->country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'postal_code' => ['required'],
        ];

        Validator::make(
            data: $request->all(),
            rules: $rules,
        )->validate();

        // return $request;
        $dataCreate = [
            'detail_hakcipta_id' => $detailHakcipta->id,
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'nationality_id' => $request->nationality_id,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'postal_code' => $request->postal_code,
            // 'is_company' => $request->is_company,
        ];

        if ($request->is_company) {
            $dataCreate['is_company'] = $request->is_company;
        }else {
            $dataCreate['is_company'] = 0;
        }

        if ($request->country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec') {
            $dataCreate['province_id'] = $request->province_id;
            $dataCreate['district_id'] = $request->district_id;
            $dataCreate['subdistrict_id'] = $request->subdistrict_id;
        }else {
            $dataCreate['district'] = $request->district;
        }

        HolderHakcipta::create($dataCreate);

        Alert::toast('Success Menambah Pemegang', 'success');

        return redirect()->to(route('user.ajuan.create', ['detailHakcipta' => $detailHakcipta->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HolderHakcipta  $holderHakcipta
     * @return \Illuminate\Http\Response
     */
    public function show(HolderHakcipta $holderHakcipta)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HolderHakcipta  $holderHakcipta
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailHakcipta $detailHakcipta, HolderHakcipta $holderHakcipta)
    {
        $data = [
            'detailHakcipta' => $detailHakcipta,
            'kewarganegaraans' => Country::all(),
            'provinsis' => Province::all(),
            'holderHakcipta' => $holderHakcipta,
        ];

        return view('user.ajuan.holder.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HolderHakcipta  $holderHakcipta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailHakcipta $detailHakcipta,HolderHakcipta $holderHakcipta)
    {
        $rules = [
            'name' => ['required'],
            'email' => ['required'],
            'no_telp' => ['required'],
            'nationality_id' => ['required'],
            'address' => ['required'],
            'country_id' => ['required'],
            'district' => [Rule::requiredIf($request->country_id != '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'province_id' => [Rule::requiredIf($request->country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'district_id' => [Rule::requiredIf($request->country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'subdistrict_id' => [Rule::requiredIf($request->country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'postal_code' => ['required'],
        ];

        Validator::make(
            data: $request->all(),
            rules: $rules,
        )->validate();

        $dataUpdate = [
            'detail_hakcipta_id' => $detailHakcipta->id,
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'nationality_id' => $request->nationality_id,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'postal_code' => $request->postal_code,
        ];

        if ($request->is_company) {
            $dataUpdate['is_company'] = $request->is_company;
        }else {
            $dataUpdate['is_company'] = 0;
        }
        
        if ($request->country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec') {
            $dataUpdate['district'] = null;

            $dataUpdate['province_id'] = $request->province_id;
            $dataUpdate['district_id'] = $request->district_id;
            $dataUpdate['subdistrict_id'] = $request->subdistrict_id;
        }else {
            $dataUpdate['district'] = $request->district;

            $dataUpdate['province_id'] = null;
            $dataUpdate['district_id'] = null;
            $dataUpdate['subdistrict_id'] = null;
        }

        $holderHakcipta->update($dataUpdate);

        Alert::toast('Success Update Pemegang', 'success');

        return redirect()->to(route('user.ajuan.create', ['detailHakcipta' => $detailHakcipta->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HolderHakcipta  $holderHakcipta
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailHakcipta $detailHakcipta, HolderHakcipta $holderHakcipta)
    {
        $holderHakcipta->delete();
        return "success";
    }

    public function data(DetailHakcipta $detailHakcipta){
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

    public function generateDistrict(Request $request, DetailHakcipta $detailHakcipta, Province $province)
    {
        $datas = $province->districts;

        $text = "<option value=\"\">- Pilih Kota -</option>";

        foreach ($datas as $key => $data) {
            if ($request->selected_district && $request->selected_district == $data->id) {
                $text .= "<option value=\"".$data->id."\" selected>".$data->name."</option>";
            }else {
                $text .= "<option value=\"".$data->id."\">".$data->name."</option>";
            }

        }

        return $text; 
    }

    public function generateSubdistrict(Request $request, DetailHakcipta $detailHakcipta, District $district)
    {
        $datas = $district->subdistricts;

        $text = "<option value=\"\">- Pilih Kecamatan -</option>";

        foreach ($datas as $key => $data) {
            if ($request->selected_subdistrict && $request->selected_subdistrict == $data->id) {
                $text .= "<option value=\"".$data->id."\" selected>".$data->name."</option>";
            }else {
                $text .= "<option value=\"".$data->id."\">".$data->name."</option>";
            }

        }

        return $text; 
    }
}
