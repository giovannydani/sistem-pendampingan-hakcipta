<?php

namespace App\Http\Livewire\User\Ajuan;

use App\Models\Country;
use Livewire\Component;
use App\Models\District;
use App\Models\Province;
use App\Models\Subdistrict;
use App\Models\HolderHakcipta;
use Illuminate\Validation\Rule;

class Holder extends Component
{
    public $ids;
    public $data;
    public $creators=[];

    public $name_holder = "";
    public $email_holder = "";
    public $no_telp_holder = "";
    public $nationality_id_holder = "";

    public $address_holder = "";
    public $country_id_holder = "";
    public $district_holder = "";
    public $province_id_holder = "";
    public $district_id_holder = "";
    public $subdistrict_id_holder = "";
    public $postal_code_holder = "";
    public $is_company_holder = "";

    public $districts_holder = [];
    public $subdistricts_holder = [];

    public function rst()
    {
        $this->resetExcept('data', 'ids');
    }

    public function mount($id)
    {
        $this->ids = $id;

        $this->data['kewarganegaraans'] = Country::all();

        $this->data['provinsis'] = Province::all();

        $this->gettingCreators();
    }

    public function gettingCreators()
    {
        $this->creators = HolderHakcipta::query()
        ->where('detail_hakcipta_id', $this->ids)
        ->with([
            'nationality',
            'province',
            'districta',
        ])
        ->get();
    }

    public function add()
    {
        dd($this->data);
    }

    public function openModalAddHolder()
    {
        $this->dispatchBrowserEvent('openModalAddHolder');
    }

    public function closeModalAddHolder()
    {
        $this->dispatchBrowserEvent('closeModalAddHolder');
    }
    
    protected $validationAttributes = [
        'email_holder' => 'email address',
        'no_telp_holder' => 'no telepon',
        'nationality_id_holder' => 'kewarganegaraan',
        'address_holder' => 'address',
        'country_id_holder' => 'negara',
        'district_holder' => 'kota',
        'province_id_holder' => 'provinsi',
        'district_id_holder' => 'kota',
        'subdistrict_id_holder' => 'kecamatan',
        'postal_code_holder' => 'kode pos',
        'is_company_holder' => 'perusahaan',

        'emailEdit' => 'email address',
        'no_telpEdit' => 'no telepon',
        'nationality_idEdit' => 'kewarganegaraan',
        'addressEdit' => 'address',
        'country_idEdit' => 'negara',
        'districtEdit' => 'kota',
        'province_id_edit' => 'provinsi',
        'district_id_edit' => 'kota',
        'subdistrict_id_edit' => 'kecamatan',
        'postal_codeEdit' => 'kode pos',
        'is_companyEdit' => 'perusahaan',
    ];
    
    public function updatedProvinceIdHolder($value)
    {
        if ($value != "") {
            $this->districts_holder = District::where('province_id', $value)->get();
        }else {
            $this->districts_holder = [];
        }
    }
    
    public function updatedDistrictIdHolder($value)
    {
        if ($value != "") {
            $this->subdistricts_holder = Subdistrict::where('district_id', $value)->get();
        }else {
            $this->subdistricts_holder = [];
        }
    }

    public function saveHolder()
    {
        $this->validate([
            'name_holder' => ['required'],
            'email_holder' => ['required'],
            'no_telp_holder' => ['required'],
            'nationality_id_holder' => ['required'],
            'address_holder' => ['required'],
            'country_id_holder' => ['required'],
            'district_holder' => [Rule::requiredIf($this->country_id_holder != '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'province_id_holder' => [Rule::requiredIf($this->country_id_holder == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'district_id_holder' => [Rule::requiredIf($this->country_id_holder == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'subdistrict_id_holder' => [Rule::requiredIf($this->country_id_holder == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'postal_code_holder' => ['required'],
        ]);

        $dataCreate = [
            'detail_hakcipta_id' => $this->ids,
            'name' => $this->name_holder,
            'email' => $this->email_holder,
            'no_telp' => $this->no_telp_holder,
            'nationality_id' => $this->nationality_id_holder,
            'address' => $this->address_holder,
            'country_id' => $this->country_id_holder,
            'postal_code' => $this->postal_code_holder,
        ];

        if ($this->is_company_holder) {
            $dataCreate['is_company'] = $this->is_company_holder;
        }else {
            $dataCreate['is_company'] = 0;
        }

        if ($this->country_id_holder == '8d1458c5-dde2-3ac3-901b-29d55074c4ec') {
            $dataCreate['province_id'] = $this->province_id_holder;
            $dataCreate['district_id'] = $this->district_id_holder;
            $dataCreate['subdistrict_id'] = $this->subdistrict_id_holder;
        }else {
            $dataCreate['district'] = $this->district_holder;
        }

        HolderHakcipta::create($dataCreate);
        $this->rst();
        $this->gettingCreators();

        $this->closeModalAddHolder();
    }

    public function render()
    {
        return view('livewire.user.ajuan.holder', $this->data);
    }

    // edit
    public $idsEdit = "";
    public $nameEdit = "";
    public $emailEdit = "";
    public $no_telpEdit = "";
    public $nationality_idEdit = "";

    public $addressEdit = "";
    public $country_idEdit = "";
    public $districtEdit = "";
    public $province_id_edit = "";
    public $district_id_edit = "";
    public $subdistrict_id_edit = "";
    public $postal_codeEdit = "";
    public $is_companyEdit = "";

    public $districtsEdit = [];
    public $subdistrictsEdit = [];

    public function openModalEdit()
    {
        $this->dispatchBrowserEvent('openModalEditHolder');   
    }

    public function closeModalEdit()
    {
        $this->dispatchBrowserEvent('closeModalEditHolder');   
    }

    public function edit($id)
    {
        $this->idsEdit = $id;
        $creator = HolderHakcipta::where('id', $id)->first();

        $this->nameEdit = $creator['name'];
        $this->emailEdit = $creator['email'];
        $this->no_telpEdit = $creator['no_telp'];
        $this->nationality_idEdit = $creator['nationality_id'];

        $this->addressEdit = $creator['address'];
        $this->country_idEdit = $creator['country_id'];
        if ($creator['country_id'] != '8d1458c5-dde2-3ac3-901b-29d55074c4ec') {
            $this->districtEdit = $creator['district'];
        }elseif ($creator['country_id'] == '8d1458c5-dde2-3ac3-901b-29d55074c4ec') {
            $this->province_id_edit = $creator['province_id'];
            $this->district_id_edit = $creator['district_id'];
            $this->subdistrict_id_edit = $creator['subdistrict_id'];

            // $this->updatedProvinceIdEdit($this->province_id);
            $this->districtsEdit = District::where('province_id', $creator['province_id'])->get();
            $this->subdistrictsEdit = Subdistrict::where('district_id', $creator['district_id'])->get();
            // $this->updatedDistrictIdEdit($this->district_id);
        }
        $this->postal_codeEdit = $creator['postal_code'];
        $this->is_companyEdit = $creator['is_company'];

        $this->openModalEdit();
    }

    public function rstEdit()
    {
        $this->reset([
            'idsEdit',
            'nameEdit',
            'emailEdit',
            'no_telpEdit',
            'nationality_idEdit',

            'addressEdit',
            'country_idEdit',
            'districtEdit',
            'province_id_edit',
            'district_id_edit',
            'subdistrict_id_edit',
            'postal_codeEdit',
            'is_companyEdit',

            'districtsEdit',
            'subdistrictsEdit',
        ]);
    }

    public function updatedCountryIdHolder($value)
    {
        if ($value == "8d1458c5-dde2-3ac3-901b-29d55074c4ec") {
            $this->dispatchBrowserEvent('inputProvinceHolder');
        }elseif ($value != "8d1458c5-dde2-3ac3-901b-29d55074c4ec") {
            $this->dispatchBrowserEvent('inputDistrictHolder');
        }
    }

    public function updatedProvinceIdEdit($value)
    {
        if ($value != "") {
            $this->districtsEdit = District::where('province_id', $value)->get();
        }else {
            $this->districtsEdit = [];
        }
    }
    
    public function updatedDistrictIdEdit($value)
    {
        if ($value != "") {
            $this->subdistrictsEdit = Subdistrict::where('district_id', $value)->get();
        }else {
            $this->subdistrictsEdit = [];
        }
    }

    public function editCreator(HolderHakcipta $holderHakcipta)
    {
        // dd($holderHakcipta);

        $this->validate([
            'nameEdit' => ['required'],
            'emailEdit' => ['required'],
            'no_telpEdit' => ['required'],
            'nationality_idEdit' => ['required'],
            'addressEdit' => ['required'],
            'country_idEdit' => ['required'],
            'districtEdit' => [Rule::requiredIf($this->country_idEdit != '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'province_id_edit' => [Rule::requiredIf($this->country_idEdit == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'district_id_edit' => [Rule::requiredIf($this->country_idEdit == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'subdistrict_id_edit' => [Rule::requiredIf($this->country_idEdit == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'postal_codeEdit' => ['required'],
        ]);

        $dataUpdate = [
            'name' => $this->nameEdit,
            'email' => $this->emailEdit,
            'no_telp' => $this->no_telpEdit,
            'nationality_id' => $this->nationality_idEdit,
            'address' => $this->addressEdit,
            'country_id' => $this->country_idEdit,
            'postal_code' => $this->postal_codeEdit,
        ];

        if ($this->is_companyEdit) {
            $dataUpdate['is_company'] = $this->is_companyEdit;
        }else {
            $dataUpdate['is_company'] = 0;
        }
        
        if ($this->country_idEdit == '8d1458c5-dde2-3ac3-901b-29d55074c4ec') {
            $dataUpdate['district'] = null;

            $dataUpdate['province_id'] = $this->province_id_edit;
            $dataUpdate['district_id'] = $this->district_id_edit;
            $dataUpdate['subdistrict_id'] = $this->subdistrict_id_edit;
        }else {
            $dataUpdate['district'] = $this->districtEdit;

            $dataUpdate['province_id'] = null;
            $dataUpdate['district_id'] = null;
            $dataUpdate['subdistrict_id'] = null;
        }

        $holderHakcipta->update($dataUpdate);


        $this->rstEdit();
        $this->gettingCreators();
        $this->closeModalEdit();
    }

    // delete

    public $idsDelete;
    protected $listeners = ['deleteHolder' => 'deleteHolder'];

    public function openModalDelete()
    {
        $this->dispatchBrowserEvent('openModalDeleteHolder');   
    }

    public function delete($id)
    {
        $this->idsDelete = $id;
        $this->openModalDelete();
    }

    public function deleteHolder()
    {
        $creatorHakcipta = HolderHakcipta::where('id', $this->idsDelete)->first();

        $creatorHakcipta->delete();

        $this->gettingCreators();
        $this->reset('idsDelete');
    }
}
