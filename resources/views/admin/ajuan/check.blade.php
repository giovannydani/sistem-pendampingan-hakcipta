@extends('template.main')

@section('page-title', 'Check Ajuan')

@section('content')
<div class="page-heading">
  <h3>Check Ajuan</h3>
</div>
<div class="page-content">
    <section class="section">
            {{-- detail --}}
        <div class="card">
            <div class="card-body">
                <h5 class="mb-5">Detail</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">

                            {{-- jenis permohonan --}}
                            <div class="col-md-4">
                                <label class="mt-2">Jenis Permohonan </label >
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" value="{{$detailHakcipta->application_type->name}}" disabled>
                            </div>

                            {{-- Jenis Ciptaan --}}
                            <div class="col-md-4">
                                <label class="mt-2">Jenis Ciptaan </label >
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" value="{{$detailHakcipta->creation_type->name}}" disabled>
                            </div>

                            {{-- Sub-Jenis Ciptaan --}}
                            <div class="col-md-4">
                                <label class="mt-2">Sub-Jenis Ciptaan </label >
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" value="{{$detailHakcipta->creation_subtype->name}}" disabled>
                            </div>

                            {{-- title --}}
                            <div class="col-md-4">
                                <label class="mt-2">Judul </label >
                            </div>
                            <div class="col-md-8 form-group">
                                <div class="input-group mb-3">
                                    <input type="text" id="title" class="form-control" name="title" placeholder="Title" aria-label="Br No" aria-describedby="button-addon2" value="{{ old('title', $detailHakcipta->title) }}" disabled>
                                </div>
                            </div>
                            
                            {{-- Uraian Singkat Ciptaan --}}
                            <div class="col-md-4">
                                <label class="mt-2" >Uraian Singkat Ciptaan</label >
                            </div>
                            <div class="col-md-8 form-group">
                                <textarea name="short_description" id="short_description" rows="3" placeholder="Uraian Singkat Ciptaan" class="form-control" disabled>{{old('short_description', $detailHakcipta->short_description)}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">

                            {{-- Tanggal Pertama Kali Diumumkan --}}
                            <div class="col-md-4">
                                <label class="mt-2" >Tanggal Pertama Kali Diumumkan</label >
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="date" name="first_announced_date" id="first_announced_date" class="form-control" value="{{old('first_announced_date', $detailHakcipta->first_announced_date)}}" disabled>
                            </div>
                            
                            {{-- Negara Pertama Kali Diumumkan --}}
                            <div class="col-md-4">
                                <label class="mt-2" >Negara Pertama Kali Diumumkan</label >
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" value="{{$detailHakcipta->first_announced_country->name}}" disabled>
                            </div>

                            {{-- Kota Pertama Kali Diumumkan --}}
                            <div class="col-md-4">
                                <label class="mt-2" >Kota Pertama Kali Diumumkan</label >
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" name="first_announced_city" id="first_announced_city" rows="3" placeholder="Kota Pertama Kali Diumumkan" class="form-control" value="{{old('first_announced_city', $detailHakcipta->first_announced_city)}}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Data Pencipta --}}
        <div class="card">
            <div class="card-body">
                <h5 class="mb-5">Data Pencipta</h5>
                <table class="table" id="pencipta-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kewarganegaraan</th>
                            <th>Alamat</th>
                            <th>Kode Pos</th>
                            <th>Kota</th>
                            <th>Provinsi</th>
                            <th>Email/No. Telp</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Data Pemegang Hak Cipta --}}
        <div class="card">
            <div class="card-body">
                <h5 class="mb-5">Data Pemegang Hak Cipta</h5>
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
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Lampiran --}}
        <div class="card">
            <div class="card-body">
                <h5 class="mb-5">Lampiran</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem; background-color: #435ebe">
                            <i class="fa-solid fa-file card-img-top pt-5" style="font-size: 100px; text-align: center;  color: white"></i>
                            <div class="card-body" style="text-align: center">
                                <h5 class="card-title" style="text-align: center; color: white">Salinan Resmi Akta Pendirian Badan Hukum</h5>
                                <a href="{{$detailHakcipta->attachment->salinan_resmi_akta_pendirian_badan_hukum_url}}" target="_blank" class="btn btn-secondary">Open</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem; background-color: #435ebe">
                            <i class="fa-solid fa-file card-img-top pt-5" style="font-size: 100px; text-align: center;  color: white"></i>
                            <div class="card-body" style="text-align: center">
                                <h5 class="card-title" style="text-align: center; color: white">Scan NPWP</h5>
                                <a href="{{$detailHakcipta->attachment->scan_npwp_url}}" target="_blank" class="btn btn-secondary">Open</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem; background-color: #435ebe">
                            <i class="fa-solid fa-file card-img-top pt-5" style="font-size: 100px; text-align: center;  color: white"></i>
                            <div class="card-body" style="text-align: center">
                                <h5 class="card-title" style="text-align: center; color: white">Contoh Ciptaan</h5>
                                <a href="{{$detailHakcipta->attachment->contoh_ciptaan_url}}" target="_blank" class="btn btn-secondary">Open</a>
                            </div>
                        </div>
                    </div>
                    @if ($detailHakcipta->attachment->link_contoh_ciptaan)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem; background-color: #435ebe">
                            <i class="fa-solid fa-file card-img-top pt-5" style="font-size: 100px; text-align: center;  color: white"></i>
                            <div class="card-body" style="text-align: center">
                                <h5 class="card-title" style="text-align: center; color: white">Contoh Ciptaan (Link)</h5>
                                <a href="{{$detailHakcipta->attachment->link_contoh_ciptaan}}" target="_blank" class="btn btn-secondary">Open</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem; background-color: #435ebe">
                            <i class="fa-solid fa-file card-img-top pt-5" style="font-size: 100px; text-align: center;  color: white"></i>
                            <div class="card-body" style="text-align: center">
                                <h5 class="card-title" style="text-align: center; color: white">Scan KTP</h5>
                                <a href="{{$detailHakcipta->attachment->scan_ktp_url}}" target="_blank" class="btn btn-secondary">Open</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem; background-color: #435ebe">
                            <i class="fa-solid fa-file card-img-top pt-5" style="font-size: 100px; text-align: center;  color: white"></i>
                            <div class="card-body" style="text-align: center">
                                <h5 class="card-title" style="text-align: center; color: white">Surat Pernyataan</h5>
                                <a href="{{$detailHakcipta->attachment->surat_pernyataan_url}}" target="_blank" class="btn btn-secondary">Open</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem; background-color: #435ebe">
                            <i class="fa-solid fa-file card-img-top pt-5" style="font-size: 100px; text-align: center;  color: white"></i>
                            <div class="card-body" style="text-align: center">
                                <h5 class="card-title" style="text-align: center; color: white">Bukti Pengalihan Hak Cipta</h5>
                                <a href="{{$detailHakcipta->attachment->bukti_pengalihan_hak_cipta_url}}" target="_blank" class="btn btn-secondary">Open</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form id="comment_hakcipta_form" action="{{route('admin.ajuan.store', ['detailHakcipta' => $detailHakcipta->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @if ($detailHakcipta->newcomment)
                        <div class="col-md-12">
                            <label class="mt-2" >Last Comment</label >
                        </div>
                        <div class="col-md-12 form-group mt-2">
                            <textarea rows="3" placeholder="Uraian Singkat Ciptaan" class="form-control" readonly disabled>{{$detailHakcipta->newcomment->comment}}</textarea>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <label class="mt-2" >New Comment*</label >
                        </div>
                        <div class="col-md-12 form-group mt-2">
                            <textarea name="comment" id="comment" rows="3" placeholder="Uraian Singkat Ciptaan" class="form-control">{{old('comment')}}</textarea>
                            @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary" id="submit_button_comment_form" type="button">Submit Comment</button>
                            <button class="btn btn-secondary" id="finish_button_comment_form" type="button">Finish Ajuan</button>
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
    var penciptaTable;
    var pemegangHakCiptaTable;
    var _token = "{{ csrf_token() }}";
    var _ajuan = "{{ $detailHakcipta->id }}";

    $(document).ready(function () {
        // pencipta table
        penciptaTable = $('#pencipta-table').DataTable({
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"]],
                processing: true,
                serverSide: true,
                // scrollX: true,
                // responsive: true,
                scrollCollapse: true,
                fixedColumns: {
                    left: 0,
                    right: 1,
                },
                ajax: {
                    url : "{{route('admin.ajuan.pencipta.data', ['detailHakcipta' => $detailHakcipta->id])}}",
                    type : 'POST',
                    data: {
                        _token:_token,
                    },
                },
                columns: [
                    { data: 'name' },
                    { data: 'nationality.name' },
                    { data: 'address' },
                    { data: 'postal_code' },
                    {
                        data: 'district_count',
                        render: function(data, type, row){
                            // return data+" / "+row.no_telp;
                            if (data > 0) {
                                return row.districta['name'];
                            }else{
                                return row.district;
                            }
                        }
                    },
                    {
                        data: 'province_count',
                        render: function(data, type, row){
                            if (data > 0) {
                                return row.province['name'];
                            }else{
                                return "-";
                            }
                        }
                    },
                    { 
                        data: 'email',
                        render: function(data, type, row){
                            return data+" / "+row.no_telp;
                        }
                    },
                ]
            });

        // pemegang table
        pemegangHakCiptaTable = $('#pemegang-hak-cipta-table').DataTable({
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"]],
                processing: true,
                serverSide: true,
                // scrollX: true,
                // responsive: true,
                scrollCollapse: true,
                fixedColumns: {
                    left: 0,
                    right: 1,
                },
                ajax: {
                    url : "{{route('admin.ajuan.pemegang.data', ['detailHakcipta' => $detailHakcipta->id])}}",
                    type : 'POST',
                    data: {
                        _token:_token,
                    },
                },
                columns: [
                    { data: 'name' },
                    { data: 'nationality.name' },
                    { data: 'address' },
                    { data: 'postal_code' },
                    {
                        data: 'district_count',
                        render: function(data, type, row){
                            // return data+" / "+row.no_telp;
                            if (data > 0) {
                                return row.districta['name'];
                            }else{
                                return row.district;
                            }
                        }
                    },
                    {
                        data: 'province_count',
                        render: function(data, type, row){
                            if (data > 0) {
                                return row.province['name'];
                            }else{
                                return "-";
                            }
                        }
                    },
                    { 
                        data: 'email',
                        render: function(data, type, row){
                            return data+" / "+row.no_telp;
                        }
                    },
                ]
            });

        // pencipta table
        // pemegangHakCiptaTable = $('#pemegang-hak-cipta-table').DataTable();
    });

    $("#submit_button_comment_form").on('click', function (event){
        event.preventDefault();
        submitComment($("#comment_hakcipta_form"));
    });

    function submitComment(event) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Submit this comment",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Submit It!',
            cancelButtonText: 'Cancel'
            }).then((result) => {
            if (result.isConfirmed) {
                event.submit();
            }
        })
    }

    $("#finish_button_comment_form").on('click', function (event){
        finishApplication();
    });

    function finishApplication() {
        var _token = "{{ csrf_token() }}";
        var url = "{{route('admin.ajuan.finishAjuan', ['detailHakcipta' => $detailHakcipta->id])}}";
        var url_redirect = "{{route('admin.ajuan.index')}}";
        Swal.fire({
            title: 'Anda yakin',
            text: "Ingin Menyelesaikan Ajuan Ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Selesaikan',
            cancelButtonText: 'Cancel'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type:'PUT',
                    data: {_token:_token},
                    success: function(data) {
                        Swal.fire({
                            title: 'Sukses',
                            text: "Menyelesaikan Ajuan",
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok',
                            showCloseButton: false,
                            showCancelButton: false,
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace(url_redirect);
                            }
                        })
                    }
                });
            }
        })
    }
</script>
@endsection