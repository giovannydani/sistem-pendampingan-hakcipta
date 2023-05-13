<div>
    <h5 class="mb-5">Data Pencipta</h5>
    <button type="button" class="btn btn-primary me-3 mb-3" wire:click="openModalAdd" ><i class="fa-solid fa-plus"></i> Tambah Pencipta</button>
    <table class="table" id="pemegang-hak-cipta-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kewarganegaraan</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
                <th>Kota</th>
                <th>Provinsi</th>
                <th>Email/No. Telp</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($creators as $creator)
            <tr>
                <td>{{$creator['name']}}</td>
                <td>{{$creator['nationality']['name']}}</td>
                <td>{{$creator['address']}}</td>
                <td>{{$creator['postal_code']}}</td>
                @if ($creator['country_id'] == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')
                <td>{{$creator['districta']['name']}}</td>
                <td>{{$creator['province']['name']}}</td>
                @endif
                @if ($creator['country_id'] != '8d1458c5-dde2-3ac3-901b-29d55074c4ec')
                <td>{{$creator['district']}}</td>
                <td>-</td>
                @endif
                <td>{{$creator['email']}} / {{$creator['no_telp']}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="PIC Details Action">
                        <button type="button" wire:click="edit('{{$creator['id']}}')" class="btn btn-warning btn-sm me-2 mb-1"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                        <button type="button" wire:click="delete('{{$creator['id']}}')" class="btn btn-sm btn-danger mb-1 me-2"><i class="fa-solid fa-trash-can"></i> Delete</button>
                    </div>
                </td>
            </tr>
            @endforeach
            @if (count($creators) < 1)
            <tr>
                <td colspan="8" style="text-align: center;">Empty</td>
            </tr>
            @endif
        </tbody>
    </table>
    @error('holder') <span class="text-danger">{{ $message }}</span> @enderror

    {{-- <div wire:ignore class="modal" id="addCreator" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </div> --}}

    <!-- Modal Add-->
    <div wire:ignore.self class="modal fade" id="addCreator" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <form wire:submit.prevent="saveCreator"> --}}
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Creator</h1>
                    </div>
                    <div class="modal-body">
                        <h5 class="mb-4">Data Pencipta</h5>

                        {{-- name --}}
                        <div class="col-md-4">
                            <label class="mt-2">Nama *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                                <input type="text" id="name" class="form-control" wire:model="name" placeholder="Nama" value="{{ old('name') }}">
                            </div>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- email --}}
                        <div class="col-md-4">
                            <label class="mt-2">Email *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                                <input type="email" id="email" class="form-control" wire:model="email" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        {{-- no_telp --}}
                        <div class="col-md-4">
                            <label class="mt-2">No Telepon *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                                <input type="text" id="no_telp" class="form-control" wire:model="no_telp" placeholder="No Telepon" value="{{ old('no_telp') }}">
                            </div>
                            @error('no_telp') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kewarganegaraan --}}
                        <div class="col-md-4">
                            <label class="mt-2">Kewarganegaraan *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <select class="form-select" wire:model="nationality_id" id="nationality_id">
                                <option value="">- Pilih Kewarganegaraan -</option>
                                @foreach ($kewarganegaraans as $kewarganegaraan)
                                <option value="{{$kewarganegaraan['id']}}" @selected(old('nationality_id') == $kewarganegaraan['id'])>{{$kewarganegaraan['name']}}</option>
                                @endforeach
                            </select>
                            @error('nationality_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <h5 class="mt-4">Alamat Pencipta</h5>
                                
                        {{-- Alamat --}}
                        <div class="col-md-4">
                            <label class="mt-2" >Alamat*</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea wire:model="address" id="address" rows="3" placeholder="Alamat" class="form-control">{{old('address')}}</textarea>
                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Negara --}}
                        <div class="col-md-4">
                            <label class="mt-2">Negara *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <select class="form-select" wire:model="country_id" id="country_id" onchange="countryFuncAction()">
                                <option value="">- Pilih Negara -</option>
                                @foreach ($kewarganegaraans as $kewarganegaraan)
                                <option value="{{$kewarganegaraan['id']}}" @selected(old('country_id') == $kewarganegaraan['id'])>{{$kewarganegaraan['name']}}</option>
                                @endforeach
                            </select>
                            @error('country_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        @if ($country_id != '8d1458c5-dde2-3ac3-901b-29d55074c4ec')
                        {{-- district --}}
                        <div class="col-md-4" id="district_label">
                            <label class="mt-2">Kota *</label >
                        </div>
                        <div class="col-md-12 form-group" id="district_input">
                            <div class="input-group mb-3">
                                <input type="text" id="district" class="form-control" wire:model="district" placeholder="Kota" value="{{ old('district') }}">
                            </div>
                            @error('district') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @endif

                        @if ($country_id == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')
                        {{-- Provinsi --}}
                        <div class="col-md-4" id="province_id_label">
                            <label class="mt-2" >Provinsi *</label >
                        </div>
                        <div class="col-md-12 form-group" id="province_id_input">
                            {{-- <select class="form-select" wire:model="province_id" id="province_id" onchange="provinceFuncAction()"> --}}
                            <select class="form-select" wire:model="province_id" id="province_id">
                                <option value="">- Pilih Provinsi -</option>
                                @foreach ($provinsis as $provinsi)
                                <option value="{{$provinsi['id']}}" @selected(old('province_id') == $provinsi['id'])>{{$provinsi['name']}}</option>
                                @endforeach
                            </select>
                            @error('province_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kota --}}
                        <div class="col-md-4" id="district_id_label">
                            <label class="mt-2" >Kota *</label >
                        </div>
                        <div class="col-md-12 form-group" id="district_id_input">
                            <select class="form-select" wire:model="district_id" id="district_id">
                                <option value="">- Pilih Kota -</option>
                                @foreach ($districts as $district)
                                <option value="{{$district['id']}}" @selected(old('district_id') == $district['id'])>{{$district['name']}}</option>
                                @endforeach
                            </select>
                            @error('district_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kecamatan --}}
                        <div class="col-md-4" id="subdistrict_id_label">
                            <label class="mt-2" >Kecamatan *</label >
                        </div>
                        <div class="col-md-12 form-group" id="subdistrict_id_input">
                            <select class="form-select" wire:model="subdistrict_id" id="subdistrict_id">
                                <option value="">- Pilih Kecamatan -</option>
                                @foreach ($subdistricts as $subdistrict)
                                <option value="{{$subdistrict['id']}}" @selected(old('subdistrict_id') == $subdistrict['id'])>{{$subdistrict['name']}}</option>
                                @endforeach
                            </select>
                            @error('subdistrict_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @endif


                        {{-- Kode Pos --}}
                        <div class="col-md-4">
                            <label class="mt-2">Kode Pos *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                                <input type="text" id="postal_code" class="form-control" wire:model="postal_code" placeholder="Kode Pos" value="{{ old('postal_code') }}">
                            </div>
                            @error('postal_code') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Perusahaan --}}
                        <div class="col-md-4">
                            {{-- <label class="mt-2">Perusahaan *</label > --}}
                            <label class="form-check-label" for="is_company">
                                Perusahaan
                            </label>
                        </div>
                        <div class="col-md-12 form-group">
                            <input class="form-check-input" type="checkbox" id="is_company" wire:model="is_company" @checked(old('is_company'))>
                            @error('is_company') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModalAdd" class="btn btn-secondary">Close</button>
                        <button type="button" wire:click="saveCreator" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Add-->
    <div wire:ignore.self class="modal fade" id="editCreator" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <form wire:submit.prevent="saveCreator"> --}}
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Creator</h1>
                    </div>
                    <div class="modal-body">
                        <h5 class="mb-4">Data Pencipta</h5>

                        {{-- name --}}
                        <div class="col-md-4">
                            <label class="mt-2">Nama *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                                <input type="text" id="name" class="form-control" wire:model="nameEdit" placeholder="Nama" value="{{ old('name') }}">
                            </div>
                            @error('nameEdit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- email --}}
                        <div class="col-md-4">
                            <label class="mt-2">Email *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                                <input type="email" id="email" class="form-control" wire:model="emailEdit" placeholder="Email" value="{{ old('email') }}">
                            </div>
                            @error('emailEdit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        {{-- no_telp --}}
                        <div class="col-md-4">
                            <label class="mt-2">No Telepon *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                                <input type="text" id="no_telp" class="form-control" wire:model="no_telpEdit" placeholder="No Telepon" value="{{ old('no_telp') }}">
                            </div>
                            @error('no_telpEdit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kewarganegaraan --}}
                        <div class="col-md-4">
                            <label class="mt-2">Kewarganegaraan *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <select class="form-select" wire:model="nationality_idEdit" id="nationality_id">
                                <option value="">- Pilih Kewarganegaraan -</option>
                                @foreach ($kewarganegaraans as $kewarganegaraan)
                                <option value="{{$kewarganegaraan['id']}}" @selected(old('nationality_id') == $kewarganegaraan['id'])>{{$kewarganegaraan['name']}}</option>
                                @endforeach
                            </select>
                            @error('nationality_idEdit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <h5 class="mt-4">Alamat Pencipta</h5>
                                
                        {{-- Alamat --}}
                        <div class="col-md-4">
                            <label class="mt-2" >Alamat*</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea wire:model="addressEdit" id="address" rows="3" placeholder="Alamat" class="form-control">{{old('address')}}</textarea>
                            @error('addressEdit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Negara --}}
                        <div class="col-md-4">
                            <label class="mt-2">Negara *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <select class="form-select" wire:model="country_idEdit" id="country_id" onchange="countryFuncAction()">
                                <option value="">- Pilih Negara -</option>
                                @foreach ($kewarganegaraans as $kewarganegaraan)
                                <option value="{{$kewarganegaraan['id']}}" @selected(old('country_id') == $kewarganegaraan['id'])>{{$kewarganegaraan['name']}}</option>
                                @endforeach
                            </select>
                            @error('country_idEdit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        @if ($country_idEdit != '8d1458c5-dde2-3ac3-901b-29d55074c4ec')
                        {{-- district --}}
                        <div class="col-md-4" id="district_label">
                            <label class="mt-2">Kota *</label >
                        </div>
                        <div class="col-md-12 form-group" id="district_input">
                            <div class="input-group mb-3">
                                <input type="text" id="district" class="form-control" wire:model="districtEdit" placeholder="Kota" value="{{ old('district') }}">
                            </div>
                            @error('districtEdit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @endif

                        @if ($country_idEdit == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')
                        {{-- Provinsi --}}
                        <div class="col-md-4" id="province_id_label">
                            <label class="mt-2" >Provinsi *</label >
                        </div>
                        <div class="col-md-12 form-group" id="province_id_input">
                            <select class="form-select" wire:model="province_id_edit" id="province_id">
                                <option value="">- Pilih Provinsi -</option>
                                @foreach ($provinsis as $provinsi)
                                <option value="{{$provinsi['id']}}" @selected(old('province_id') == $provinsi['id'])>{{$provinsi['name']}}</option>
                                @endforeach
                            </select>
                            @error('province_id_edit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kota --}}
                        <div class="col-md-4" id="district_id_label">
                            <label class="mt-2" >Kota *</label >
                        </div>
                        <div class="col-md-12 form-group" id="district_id_input">
                            <select class="form-select" wire:model="district_id_edit" id="district_id">
                                <option value="">- Pilih Kota -</option>
                                @foreach ($districtsEdit as $district)
                                <option value="{{$district['id']}}" @selected(old('district_id') == $district['id'])>{{$district['name']}}</option>
                                @endforeach
                            </select>
                            @error('district_id_edit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kecamatan --}}
                        <div class="col-md-4" id="subdistrict_id_label">
                            <label class="mt-2" >Kecamatan *</label >
                        </div>
                        <div class="col-md-12 form-group" id="subdistrict_id_input">
                            <select class="form-select" wire:model="subdistrict_id_edit" id="subdistrict_id">
                                <option value="">- Pilih Kecamatan -</option>
                                @foreach ($subdistrictsEdit as $subdistrict)
                                <option value="{{$subdistrict['id']}}" @selected(old('subdistrict_id') == $subdistrict['id'])>{{$subdistrict['name']}}</option>
                                @endforeach
                            </select>
                            @error('subdistrict_id_edit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @endif


                        {{-- Kode Pos --}}
                        <div class="col-md-4">
                            <label class="mt-2">Kode Pos *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                                <input type="text" id="postal_code" class="form-control" wire:model="postal_codeEdit" placeholder="Kode Pos" value="{{ old('postal_code') }}">
                            </div>
                            @error('postal_codeEdit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Perusahaan --}}
                        <div class="col-md-4">
                            {{-- <label class="mt-2">Perusahaan *</label > --}}
                            <label class="form-check-label" for="is_company">
                                Perusahaan
                            </label>
                        </div>
                        <div class="col-md-12 form-group">
                            <input class="form-check-input" type="checkbox" id="is_company" wire:model="is_companyEdit" @checked(old('is_companyEdit'))>
                            @error('is_companyEdit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModalEdit" class="btn btn-secondary">Close</button>
                        <button type="button" wire:click="editCreator('{{$idsEdit}}')" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
