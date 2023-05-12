@extends('template.main')

@section('page-title', 'Edit Pencipta')

@section('content')
<div class="page-heading">
  <h3>Edit Pencipta</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.ajuan.pencipta.update', ['detailHakcipta' => $detailHakcipta->id, 'creatorHakcipta' => $creatorHakcipta->id]) }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <h5 class="mb-4">Data Pencipta</h5>

                                {{-- name --}}
                                <div class="col-md-4">
                                    <label class="mt-2">Nama *</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Nama" value="{{ old('name', $creatorHakcipta->name) }}">
                                    </div>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- email --}}
                                <div class="col-md-4">
                                    <label class="mt-2">Email *</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <div class="input-group mb-3">
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{ old('email', $creatorHakcipta->email) }}">
                                    </div>
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                {{-- no_telp --}}
                                <div class="col-md-4">
                                    <label class="mt-2">No Telepon *</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" id="no_telp" class="form-control" name="no_telp" placeholder="No Telepon" value="{{ old('no_telp', $creatorHakcipta->no_telp) }}">
                                    </div>
                                    @error('no_telp') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Kewarganegaraan --}}
                                <div class="col-md-4">
                                    <label class="mt-2">Kewarganegaraan *</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <select class="form-select" name="nationality_id" id="nationality_id">
                                        <option value="">- Pilih Kewarganegaraan -</option>
                                        @foreach ($kewarganegaraans as $kewarganegaraan)
                                        <option value="{{$kewarganegaraan->id}}" @selected(old('nationality_id', $creatorHakcipta->nationality_id) == $kewarganegaraan->id)>{{$kewarganegaraan->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('nationality_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <h5 class="mb-4">Alamat Pencipta</h5>
                                
                                {{-- Alamat --}}
                                <div class="col-md-4">
                                    <label class="mt-2" >Alamat*</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <textarea name="address" id="address" rows="3" placeholder="Alamat" class="form-control">{{old('address', $creatorHakcipta->address)}}</textarea>
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Negara --}}
                                <div class="col-md-4">
                                    <label class="mt-2">Negara *</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <select class="form-select" name="country_id" id="country_id" onchange="countryFuncAction()">
                                        <option value="">- Pilih Negara -</option>
                                        @foreach ($kewarganegaraans as $kewarganegaraan)
                                        <option value="{{$kewarganegaraan->id}}" @selected(old('country_id', $creatorHakcipta->country_id) == $kewarganegaraan->id)>{{$kewarganegaraan->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Provinsi --}}
                                <div class="col-md-4" id="province_id_label">
                                    <label class="mt-2" >Provinsi *</label >
                                </div>
                                <div class="col-md-8 form-group" id="province_id_input">
                                    <select class="form-select" name="province_id" id="province_id" onchange="provinceFuncAction()">
                                        <option value="">- Pilih Provinsi -</option>
                                        @foreach ($provinsis as $provinsi)
                                        <option value="{{$provinsi->id}}" @selected(old('province_id', $creatorHakcipta->province_id) == $provinsi->id)>{{$provinsi->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('province_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- district --}}
                                <div class="col-md-4" id="district_label">
                                    <label class="mt-2">Kota *</label >
                                </div>
                                <div class="col-md-8 form-group" id="district_input">
                                    <div class="input-group mb-3">
                                        <input type="text" id="district" class="form-control" name="district" placeholder="Kota" value="{{ old('district') }}">
                                    </div>
                                    @error('district') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Kota --}}
                                <div class="col-md-4" id="district_id_label">
                                    <label class="mt-2" >Kota *</label >
                                </div>
                                <div class="col-md-8 form-group" id="district_id_input">
                                    <select class="form-select" name="district_id" id="district_id" onchange="districtFuncAction()">
                                        <option value="">- Pilih Kota -</option>
                                    </select>
                                    @error('district_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Kecamatan --}}
                                <div class="col-md-4" id="subdistrict_id_label">
                                    <label class="mt-2" >Kecamatan *</label >
                                </div>
                                <div class="col-md-8 form-group" id="subdistrict_id_input">
                                    <select class="form-select" name="subdistrict_id" id="subdistrict_id">
                                        <option value="">- Pilih Kecamatan -</option>
                                    </select>
                                    @error('subdistrict_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                {{-- Kode Pos --}}
                                <div class="col-md-4">
                                    <label class="mt-2">Kode Pos *</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" id="postal_code" class="form-control" name="postal_code" placeholder="Kode Pos" value="{{ old('postal_code', $creatorHakcipta->postal_code) }}">
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
                                <div class="col-md-8 form-group">
                                    <input class="form-check-input" type="checkbox" id="is_company" name="is_company" @checked(old('is_company', $creatorHakcipta->is_company))>
                                    @error('is_company') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="col-sm-12 d-flex justify-content-end mt-2">
                                    <button type="submit" class="btn btn-primary me-2 mb-1"><i class="fa-solid fa-plus"></i> Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-2 mb-1"><i class="fa-solid fa-broom"></i> Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
    var _token = "{{ csrf_token() }}";
    var _detail = "{{ $detailHakcipta->id }}"

    $(document).ready(function () {
        $('#province_id_input').hide();
        $('#district_id_input').hide();
        $('#subdistrict_id_input').hide();
        $('#province_id_label').hide();
        $('#district_id_label').hide();
        $('#subdistrict_id_label').hide();
        $('#district_input').hide();
        $('#district_label').hide();

        countryFuncAction();
    })

    function countryFuncAction() {
        if ($('#country_id').val() != '8d1458c5-dde2-3ac3-901b-29d55074c4ec') {
            $('#province_id_input').hide();
            $('#district_id_input').hide();
            $('#subdistrict_id_input').hide();
            $('#province_id_label').hide();
            $('#district_id_label').hide();
            $('#subdistrict_id_label').hide();
            
            $('#district_input').show();
            $('#district_label').show();
        }else{
            $('#province_id_input').show();
            $('#district_id_input').show();
            $('#subdistrict_id_input').show();
            $('#province_id_label').show();
            $('#district_id_label').show();
            $('#subdistrict_id_label').show();
            
            $('#district_input').hide();
            $('#district_label').hide();

            provinceFuncAction();
            districtFuncAction("old");
        }
    }
    
    var selected_district = "{{ old('district_id', $creatorHakcipta->district_id) }}";
    function provinceFuncAction() {
        var province = $('#province_id').val();
        if (province != "") {
            var url = "{{ url('/ajuan/') }}"+"/"+_detail+"/pencipta/generate/district/"+province;
            $.ajax({
                url: url,
                type:'POST',
                data: {
                    _token:_token,
                    selected_district:selected_district,
                },
                success: function(data) {
                    $("#district_id").html(data);
                }
            });
        }else{
            $("#district_id").html("<option value=\"\">- Pilih Kota -</option>");
        }
    }
    
    var selected_subdistrict = "{{ old('subdistrict_id', $creatorHakcipta->subdistrict_id) }}";
    function districtFuncAction(status = "") {
        var district = $('#district_id').val();
        if (status == 'old' && selected_district !="") {
            var district = selected_district;
        }
        if (district != "") {
            var url = "{{ url('/ajuan/') }}"+"/"+_detail+"/pencipta/generate/subdistrict/"+district;
            $.ajax({
                url: url,
                type:'POST',
                data: {
                    _token:_token,
                    selected_subdistrict:selected_subdistrict,
                },
                success: function(data) {
                    $("#subdistrict_id").html(data);
                }
            });
        }else{
            $("#subdistrict_id").html("<option value=\"\">- Pilih Kecamatan -</option>");
        }
    }
</script>
@endsection