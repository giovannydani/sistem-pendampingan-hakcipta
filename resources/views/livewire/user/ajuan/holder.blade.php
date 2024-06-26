<div>
    <h5 class="mb-5">Data Pemegang Hak Cipta</h5>
    <button type="button" class="btn btn-primary me-3 mb-3" wire:click="openModalAddHolder" ><i class="fa-solid fa-plus"></i> Tambah Pemegang Hakcipta</button>
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
                @if ($creator['is_manageable'])
                <td>
                    <div class="btn-group" role="group" aria-label="PIC Details Action">
                        <button type="button" wire:click="edit('{{$creator['id']}}')" class="btn btn-warning btn-sm me-2 mb-1"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                        <button type="button" wire:click="delete('{{$creator['id']}}')" class="btn btn-sm btn-danger mb-1 me-2"><i class="fa-solid fa-trash-can"></i> Delete</button>
                    </div>
                </td>
                @else
                <td>
                    -
                </td>
                @endif
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

    <!-- Modal Add-->
    <div wire:ignore.self class="modal fade" id="addHolder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Holder</h1>
                    </div>
                    <div class="modal-body">
                        <h5 class="mb-4">Data Pemegang Hakcipta</h5>

                        {{-- name --}}
                        <div class="col-md-4">
                            <label class="mt-2">Nama Lengkap (dengan gelar) *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                                <input type="text" id="name" class="form-control" wire:model="name_holder" placeholder="Nama" value="{{ old('name_holder') }}">
                            </div>
                            @error('name_holder') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- email --}}
                        <div class="col-md-4">
                            <label class="mt-2">Email *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                                <input type="email" id="email" class="form-control" wire:model="email_holder" placeholder="Email" value="{{ old('email_holder') }}">
                            </div>
                            @error('email_holder') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        {{-- no_telp --}}
                        <div class="col-md-4">
                            <label class="mt-2">No Telepon *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                                <input type="text" id="no_telp" class="form-control" wire:model="no_telp_holder" placeholder="No Telepon" value="{{ old('no_telp_holder') }}">
                            </div>
                            @error('no_telp_holder') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kewarganegaraan --}}
                        <div class="col-md-4">
                            <label class="mt-2">Kewarganegaraan *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <select class="form-select" wire:model="nationality_id_holder" id="nationality_id_holder">
                                <option value="">- Pilih Kewarganegaraan -</option>
                                @foreach ($kewarganegaraans as $kewarganegaraan)
                                <option value="{{$kewarganegaraan['id']}}" @selected(old('nationality_id') == $kewarganegaraan['id'])>{{$kewarganegaraan['name']}}</option>
                                @endforeach
                            </select>
                            @error('nationality_id_holder') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <h5 class="mt-4">Alamat Pemegang Hakcipta</h5>
                                
                        {{-- Alamat --}}
                        <div class="col-md-4">
                            <label class="mt-2" >Alamat*</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea wire:model="address_holder" id="address" rows="3" placeholder="Alamat" class="form-control">{{old('address_holder')}}</textarea>
                            @error('address_holder') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Negara --}}
                        <div class="col-md-4">
                            <label class="mt-2">Negara *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <select class="form-select" wire:model="country_id_holder" id="country_id">
                                <option value="">- Pilih Negara -</option>
                                @foreach ($kewarganegaraans as $kewarganegaraan)
                                <option value="{{$kewarganegaraan['id']}}" @selected(old('country_id_holder') == $kewarganegaraan['id'])>{{$kewarganegaraan['name']}}</option>
                                @endforeach
                            </select>
                            @error('country_id_holder') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- @if ($country_id_holder != '8d1458c5-dde2-3ac3-901b-29d55074c4ec') --}}
                        {{-- district --}}
                        <div wire:ignore.self class="col-md-4" id="district_label_holder">
                            <label class="mt-2">Kota *</label >
                        </div>
                        <div wire:ignore.self class="col-md-12 form-group" id="district_input_holder">
                            <div class="input-group mb-3">
                                <input type="text" id="district" class="form-control" wire:model="district_holder" placeholder="Kota" value="{{ old('district_holder') }}">
                            </div>
                            @error('district_holder') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        {{-- @endif --}}

                        {{-- @if ($country_id_holder == '8d1458c5-dde2-3ac3-901b-29d55074c4ec') --}}
                        {{-- Provinsi --}}
                        <div wire:ignore.self class="col-md-4" id="province_id_label_holder">
                            <label class="mt-2" >Provinsi *</label >
                        </div>
                        <div wire:ignore.self class="col-md-12 form-group" id="province_id_input_holder">
                            {{-- <select class="form-select" wire:model="province_id" id="province_id" onchange="provinceFuncAction()"> --}}
                            <select class="form-select" wire:model="province_id_holder" id="province_id">
                                <option value="">- Pilih Provinsi -</option>
                                @foreach ($provinsis as $provinsi)
                                <option value="{{$provinsi['id']}}" @selected(old('province_id_holder') == $provinsi['id'])>{{$provinsi['name']}}</option>
                                @endforeach
                            </select>
                            @error('province_id_holder') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kota --}}
                        <div wire:ignore.self class="col-md-4" id="district_id_label_holder">
                            <label class="mt-2" >Kota *</label >
                        </div>
                        <div wire:ignore.self class="col-md-12 form-group" id="district_id_input_holder">
                            <select class="form-select" wire:model="district_id_holder" id="district_id">
                                <option value="">- Pilih Kota -</option>
                                @foreach ($districts_holder as $district)
                                <option value="{{$district['id']}}" @selected(old('district_id_holder') == $district['id'])>{{$district['name']}}</option>
                                @endforeach
                            </select>
                            @error('district_id_holder') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kecamatan --}}
                        <div wire:ignore.self class="col-md-4" id="subdistrict_id_label_holder">
                            <label class="mt-2" >Kecamatan *</label >
                        </div>
                        <div wire:ignore.self class="col-md-12 form-group" id="subdistrict_id_input_holder">
                            <select class="form-select" wire:model="subdistrict_id_holder" id="subdistrict_id">
                                <option value="">- Pilih Kecamatan -</option>
                                @foreach ($subdistricts_holder as $subdistrict)
                                <option value="{{$subdistrict['id']}}" @selected(old('subdistrict_id_holder') == $subdistrict['id'])>{{$subdistrict['name']}}</option>
                                @endforeach
                            </select>
                            @error('subdistrict_id_holder') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        {{-- @endif --}}


                        {{-- Kode Pos --}}
                        <div class="col-md-4">
                            <label class="mt-2">Kode Pos *</label >
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="input-group mb-3">
                                <input type="text" id="postal_code" class="form-control" wire:model="postal_code_holder" placeholder="Kode Pos" value="{{ old('postal_code_holder') }}">
                            </div>
                            @error('postal_code_holder') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Perusahaan --}}
                        <div class="col-md-12">
                            {{-- <label class="mt-2">Perusahaan *</label > --}}
                            <label class="form-check-label" for="is_company">
                                Perusahaan / Badan Hukum
                            </label>
                        </div>
                        <div class="col-md-12 form-group">
                            <input class="form-check-input" type="checkbox" id="is_company" wire:model="is_company_holder" @checked(old('is_company_holder'))>
                            @error('is_company_holder') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModalAddHolder" class="btn btn-secondary">Close</button>
                        <button type="button" wire:click="saveHolder" class="btn btn-primary">Submit</button>
                    </div>

            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    <div wire:ignore.self class="modal fade" id="editHolder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Creator</h1>
                    </div>
                    <div class="modal-body">
                        <h5 class="mb-4">Data Pencipta</h5>

                        {{-- name --}}
                        <div class="col-md-4">
                            <label class="mt-2">Nama Lengkap (Dengan Gelar) *</label >
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
                        <div wire:ignore.self class="col-md-4">
                            <label class="mt-2">Negara *</label >
                        </div>
                        <div wire:ignore.self class="col-md-12 form-group">
                            <select class="form-select" wire:model="country_idEdit" id="country_id">
                                <option value="">- Pilih Negara -</option>
                                @foreach ($kewarganegaraans as $kewarganegaraan)
                                <option value="{{$kewarganegaraan['id']}}" @selected(old('country_id') == $kewarganegaraan['id'])>{{$kewarganegaraan['name']}}</option>
                                @endforeach
                            </select>
                            @error('country_idEdit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        @if ($country_idEdit != '8d1458c5-dde2-3ac3-901b-29d55074c4ec')
                        {{-- district --}}
                        <div wire:ignore.self class="col-md-4" id="district_label_edit_holder">
                            <label class="mt-2">Kota *</label >
                        </div>
                        <div wire:ignore.self class="col-md-12 form-group" id="district_input_edit_holder">
                            <div class="input-group mb-3">
                                <input type="text" id="district" class="form-control" wire:model="districtEdit" placeholder="Kota" value="{{ old('district') }}">
                            </div>
                            @error('districtEdit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @endif

                        @if ($country_idEdit == '8d1458c5-dde2-3ac3-901b-29d55074c4ec')
                        {{-- Provinsi --}}
                        <div wire:ignore.self class="col-md-4" id="province_id_label_edit_holder">
                            <label class="mt-2" >Provinsi *</label >
                        </div>
                        <div wire:ignore.self class="col-md-12 form-group" id="province_id_input_edit_holder">
                            <select class="form-select" wire:model="province_id_edit" id="province_id">
                                <option value="">- Pilih Provinsi -</option>
                                @foreach ($provinsis as $provinsi)
                                <option value="{{$provinsi['id']}}" @selected(old('province_id') == $provinsi['id'])>{{$provinsi['name']}}</option>
                                @endforeach
                            </select>
                            @error('province_id_edit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kota --}}
                        <div wire:ignore.self class="col-md-4" id="district_id_label_edit_holder">
                            <label class="mt-2" >Kota *</label >
                        </div>
                        <div wire:ignore.self class="col-md-12 form-group" id="district_id_input_edit_holder">
                            <select class="form-select" wire:model="district_id_edit" id="district_id">
                                <option value="">- Pilih Kota -</option>
                                @foreach ($districtsEdit as $district)
                                <option value="{{$district['id']}}" @selected(old('district_id') == $district['id'])>{{$district['name']}}</option>
                                @endforeach
                            </select>
                            @error('district_id_edit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kecamatan --}}
                        <div wire:ignore.self class="col-md-4" id="subdistrict_id_label_edit_holder">
                            <label class="mt-2" >Kecamatan *</label >
                        </div>
                        <div wire:ignore.self class="col-md-12 form-group" id="subdistrict_id_input_edit_holder">
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
            </div>
        </div>
    </div>
</div>
