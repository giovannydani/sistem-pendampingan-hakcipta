<?php

namespace App\Http\Livewire\User\Ajuan;

use App\Models\Country;
use Livewire\Component;
use App\Models\Province;
use App\Models\HolderHakcipta;
use App\Models\CreatorHakcipta;
use App\Models\District;
use App\Models\Subdistrict;
use Illuminate\Validation\Rule;

class Creator extends Component
{
    public $ids;
    public $data;
    public $creators=[];

    public $name = "";
    public $email = "";
    public $no_telp = "";
    public $nationality_id = "";

    public $address = "";
    public $country_id = "";
    public $district = "";
    public $province_id = "";
    public $district_id = "";
    public $subdistrict_id = "";
    public $postal_code = "";
    public $is_company = "";

    public $districts = [];
    public $subdistricts = [];

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
        $this->creators = CreatorHakcipta::query()
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

    public function openModalAdd()
    {
        $this->dispatchBrowserEvent('openModalAdd');
    }

    public function closeModalAdd()
    {
        $this->dispatchBrowserEvent('closeModalAdd');
    }
    
    protected $validationAttributes = [
        'email' => 'email address',
        'no_telp' => 'no telepon',
        'nationality_id' => 'kewarganegaraan',
        'address' => 'address',
        'country_id' => 'negara',
        'district' => 'kota',
        'province_id' => 'provinsi',
        'district_id' => 'kota',
        'subdistrict_id' => 'kecamatan',
        'postal_code' => 'kode pos',
        'is_company' => 'perusahaan',

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
    
    public function updatedProvinceId($value)
    {
        if ($value != "") {
            $this->districts = District::where('province_id', $value)->get();
        }else {
            $this->districts = [];
        }
    }
    
    public function updatedDistrictId($value)
    {
        if ($value != "") {
            $this->subdistricts = Subdistrict::where('district_id', $value)->get();
        }else {
            $this->subdistricts = [];
        }
    }

    public function saveCreator()
    {
        $this->validate([
            'name' => ['required'],
            'email' => ['required'],
            'no_telp' => ['required'],
            'nationality_id' => ['required'],
            'address' => ['required'],
            'country_id' => ['required'],
            'district' => [Rule::requiredIf($this->country_id != '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'province_id' => [Rule::requiredIf($this->country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'district_id' => [Rule::requiredIf($this->country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'subdistrict_id' => [Rule::requiredIf($this->country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')],
            'postal_code' => ['required'],
        ]);

        $dataCreate = [
            'detail_hakcipta_id' => $this->ids,
            'name' => $this->name,
            'email' => $this->email,
            'no_telp' => $this->no_telp,
            'nationality_id' => $this->nationality_id,
            'address' => $this->address,
            'country_id' => $this->country_id,
            'postal_code' => $this->postal_code,
        ];

        if ($this->is_company) {
            $dataCreate['is_company'] = $this->is_company;
        }else {
            $dataCreate['is_company'] = 0;
        }

        if ($this->country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec') {
            $dataCreate['province_id'] = $this->province_id;
            $dataCreate['district_id'] = $this->district_id;
            $dataCreate['subdistrict_id'] = $this->subdistrict_id;
        }else {
            $dataCreate['district'] = $this->district;
        }

        CreatorHakcipta::create($dataCreate);
        $this->rst();
        $this->gettingCreators();

        $this->closeModalAdd();
    }

    public function render()
    {
        return view('livewire.user.ajuan.creator', $this->data);
    }

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
        $this->dispatchBrowserEvent('openModalEdit');   
    }

    public function closeModalEdit()
    {
        $this->dispatchBrowserEvent('closeModalEdit');   
    }

    public function edit($id)
    {
        $this->idsEdit = $id;
        $creator = CreatorHakcipta::where('id', $id)->first();

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

    public function editCreator(CreatorHakcipta $creatorHakcipta)
    {
        // dd($creatorHakcipta);

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

        $creatorHakcipta->update($dataUpdate);


        $this->rstEdit();
        $this->gettingCreators();
        $this->closeModalEdit();
    }

    // delete

    public $idsDelete;
    protected $listeners = ['deleteCreator' => 'deleteCreator'];

    public function openModalDelete()
    {
        $this->dispatchBrowserEvent('openModalDelete');   
    }

    public function delete($id)
    {
        $this->idsDelete = $id;
        $this->openModalDelete();
    }

    public function deleteCreator()
    {
        $creatorHakcipta = CreatorHakcipta::where('id', $this->idsDelete)->first();

        $creatorHakcipta->delete();

        $this->gettingCreators();
        $this->reset('idsDelete');
    }
}
