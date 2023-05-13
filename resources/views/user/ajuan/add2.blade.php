@extends('template.main')

@section('page-title', 'Tambah Ajuan')

@section('content')
<div class="page-heading">
  <h3>Tambah Ajuan</h3>
</div>
<div class="page-content">
    <section class="section">

        <form action="{{ route('user.ajuan.store', ['detailHakcipta' => $detailHakcipta->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- detail --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-5">Detail</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
    
                                {{-- jenis permohonan --}}
                                <div class="col-md-4">
                                    <label class="mt-2">Jenis Permohonan *</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <select class="form-select" name="application_type_id" id="application_type_id">
                                        <option value="">- Pilih Jenis Permohonan -</option>
                                        @foreach ($application_types as $application_type)
                                        <option value="{{ $application_type->id }}" @selected( old('application_type_id', $detailHakcipta->application_type_id) == $application_type->id ) >{{ $application_type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('application_type_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
    
                                {{-- Jenis Ciptaan --}}
                                <div class="col-md-4">
                                    <label class="mt-2">Jenis Ciptaan *</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <select class="form-select" name="creation_type_id" id="creation_type_id">
                                        <option value="">- Pilih Jenis Ciptaan -</option>
                                        @foreach ($creation_types as $creation_type)
                                        <option value="{{ $creation_type->id }}" @selected( old('creation_type_id', $detailHakcipta->creation_type_id) == $creation_type->id ) >{{ $creation_type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('creation_type_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
    
                                {{-- Sub-Jenis Ciptaan --}}
                                <div class="col-md-4">
                                    <label class="mt-2">Sub-Jenis Ciptaan *</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <select class="form-select" name="creation_subtype_id" id="creation_subtype_id">
                                        <option value="">- Pilih Sub-Jenis Ciptaan -</option>
                                    </select>
                                    @error('creation_subtype_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
    
                                {{-- title --}}
                                <div class="col-md-4">
                                    <label class="mt-2">Judul *</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" id="title" class="form-control" name="title" placeholder="Title" aria-label="Br No" aria-describedby="button-addon2" value="{{ old('title', $detailHakcipta->title) }}">
                                    </div>
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                {{-- Uraian Singkat Ciptaan --}}
                                <div class="col-md-4">
                                    <label class="mt-2" >Uraian Singkat Ciptaan*</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <textarea name="short_description" id="short_description" rows="3" placeholder="Uraian Singkat Ciptaan" class="form-control">{{old('short_description', $detailHakcipta->short_description)}}</textarea>
                                    @error('short_description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
    
                                {{-- Tanggal Pertama Kali Diumumkan --}}
                                <div class="col-md-4">
                                    <label class="mt-2" >Tanggal Pertama Kali Diumumkan*</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="date" name="first_announced_date" id="first_announced_date" rows="3" class="form-control" value="{{old('first_announced_date', $detailHakcipta->first_announced_date)}}">
                                    @error('first_announced_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                {{-- Negara Pertama Kali Diumumkan --}}
                                <div class="col-md-4">
                                    <label class="mt-2" >Negara Pertama Kali Diumumkan*</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <select class="form-select" name="first_announced_country_id" id="first_announced_country_id">
                                        <option value="">- Pilih Negara Pertama Kali Diumumkan -</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @selected( old('first_announced_country_id', $detailHakcipta->first_announced_country_id) == $country->id ) >{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('first_announced_country_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
    
                                {{-- Kota Pertama Kali Diumumkan --}}
                                <div class="col-md-4">
                                    <label class="mt-2" >Kota Pertama Kali Diumumkan*</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" name="first_announced_city" id="first_announced_city" rows="3" placeholder="Kota Pertama Kali Diumumkan" class="form-control" value="{{old('first_announced_city', $detailHakcipta->first_announced_city)}}">
                                    @error('first_announced_city') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Data Pencipta --}}
            <div class="card">
                <div class="card-body">
                    @livewire('user.ajuan.creator', ['id' => $detailHakcipta->id])
                </div>
            </div>
    
            {{-- Data Pemegang Hak Cipta --}}
            <div class="card">
                <div class="card-body">
                    {{-- <h5 class="mb-5">Data Pemegang Hak Cipta</h5>
                    <a href="{{ route('user.ajuan.pemegang.create', ['detailHakcipta' => $detailHakcipta->id]) }}" class="btn btn-primary me-3 mb-3"><i class="fa-solid fa-plus"></i> Tambah Pemegang Hak Cipta</a>
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
                        </tbody>
                    </table>
                    @error('holder') <span class="text-danger">{{ $message }}</span> @enderror --}}
                </div>
            </div>
    
            {{-- Lampiran --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-5">Lampiran</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                
                                {{-- Salinan Resmi Akta Pendirian Badan Hukum --}}
                                <div class="col-md-4">
                                    <label class="mt-2" >Salinan Resmi Akta Pendirian Badan Hukum*</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="file" class="form-control" id="salinan_resmi_akta_pendirian_badan_hukum" name="salinan_resmi_akta_pendirian_badan_hukum">
                                    @error('salinan_resmi_akta_pendirian_badan_hukum') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                {{-- Scan NPWP perorangan / perusahaan --}}
                                <div class="col-md-4">
                                    <label class="mt-2" >Scan NPWP perorangan / perusahaan*</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="file" class="form-control" id="scan_npwp" name="scan_npwp">
                                    @error('scan_npwp') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                {{-- Contoh Ciptaan --}}
                                <div class="col-md-4">
                                    <label class="mt-2" >Contoh Ciptaan*</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="file" class="form-control" id="contoh_ciptaan" name="contoh_ciptaan">
                                    @error('contoh_ciptaan') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                {{-- Contoh Ciptaan (Link) --}}
                                <div class="col-md-4">
                                    <label class="mt-2" >Contoh Ciptaan (Link)</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <textarea rows="3" placeholder="Contoh Ciptaan (Link)" class="form-control" id="link_contoh_ciptaan" name="link_contoh_ciptaan">{{old('link_contoh_ciptaan')}}</textarea>
                                    @error('link_contoh_ciptaan') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                
                                {{-- Scan KTP Pemohon dan Pencipta --}}
                                <div class="col-md-4">
                                    <label class="mt-2" >Scan KTP Pemohon dan Pencipta*</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="file" class="form-control" name="scan_ktp" id="scan_ktp">
                                    @error('scan_ktp') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
    
                                {{-- Surat Pernyataan --}}
                                <div class="col-md-4">
                                    <label class="mt-2" >Surat Pernyataan*</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="file" class="form-control" id="surat_pernyataan" name="surat_pernyataan">
                                    @error('surat_pernyataan') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
    
                                {{-- Bukti Pengalihan Hak Cipta --}}
                                <div class="col-md-4">
                                    <label class="mt-2" >Bukti Pengalihan Hak Cipta</label >
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="file" class="form-control" id="bukti_pengalihan_hak_cipta" name="bukti_pengalihan_hak_cipta">
                                    @error('bukti_pengalihan_hak_cipta') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-primary me-3 mb-3" onclick="addApplication()"><i class="fa-solid fa-plus"></i> Submit</button>
                    <button class="btn btn-danger me-3 mb-3" onclick="addApplication()"><i class="fa-solid fa-xmark"></i> Cancel</button>
                </div>
            </div>
        </form>
        

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
                    url : "{{route('user.ajuan.pencipta.data', ['detailHakcipta' => $detailHakcipta->id])}}",
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
                    {
                        orderable: false,
                        "searchable": false,
                        data: 'id',
                        render: function(data, type, row){
                            var url_edit = "{{url('/ajuan/')}}"+"/"+_ajuan+"/pencipta/"+data+"/edit";
                            var delete_action = "onclick=\"deletePencipta('"+data+"')\"";

                            return '\
                            <div class="btn-group" role="group" aria-label="PIC Details Action">\
                                <a href="'+url_edit+'" class="btn btn-warning btn-sm me-2 mb-1"><i class="fa-solid fa-pen-to-square"></i> Edit</a>\
                                <button type="button" class="btn btn-sm btn-danger mb-1 me-2" '+delete_action+'><i class="fa-solid fa-trash-can"></i> Delete</button>\
                            </div>';

                        }
                    },
                ]
            });

        // pemegang table
        // pemegangHakCiptaTable = $('#pemegang-hak-cipta-table').DataTable({
        //         "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"]],
        //         processing: true,
        //         serverSide: true,
        //         // scrollX: true,
        //         // responsive: true,
        //         scrollCollapse: true,
        //         fixedColumns: {
        //             left: 0,
        //             right: 1,
        //         },
        //         ajax: {
        //             url : "{{route('user.ajuan.pemegang.data', ['detailHakcipta' => $detailHakcipta->id])}}",
        //             type : 'POST',
        //             data: {
        //                 _token:_token,
        //             },
        //         },
        //         columns: [
        //             { data: 'name' },
        //             { data: 'nationality.name' },
        //             { data: 'address' },
        //             { data: 'postal_code' },
        //             {
        //                 data: 'district_count',
        //                 render: function(data, type, row){
        //                     // return data+" / "+row.no_telp;
        //                     if (data > 0) {
        //                         return row.districta['name'];
        //                     }else{
        //                         return row.district;
        //                     }
        //                 }
        //             },
        //             {
        //                 data: 'province_count',
        //                 render: function(data, type, row){
        //                     if (data > 0) {
        //                         return row.province['name'];
        //                     }else{
        //                         return "-";
        //                     }
        //                 }
        //             },
        //             { 
        //                 data: 'email',
        //                 render: function(data, type, row){
        //                     return data+" / "+row.no_telp;
        //                 }
        //             },
        //             {
        //                 orderable: false,
        //                 "searchable": false,
        //                 data: 'id',
        //                 render: function(data, type, row){
        //                     if (row.is_manageable) {
        //                         var url_edit = "{{url('/ajuan/')}}"+"/"+_ajuan+"/pemegang/"+data+"/edit";
        //                         var delete_action = "onclick=\"deletePemegang('"+data+"')\"";
    
        //                         return '\
        //                         <div class="btn-group" role="group" aria-label="PIC Details Action">\
        //                             <a href="'+url_edit+'" class="btn btn-warning btn-sm me-2 mb-1"><i class="fa-solid fa-pen-to-square"></i> Edit</a>\
        //                             <button type="button" class="btn btn-sm btn-danger mb-1 me-2" '+delete_action+'><i class="fa-solid fa-trash-can"></i> Delete</button>\
        //                         </div>';
        //                     }else{
        //                         return "-";
        //                     }

        //                 }
        //             },
        //         ]
        //     });

        // pencipta table
        // pemegangHakCiptaTable = $('#pemegang-hak-cipta-table').DataTable();

        getSubjenis($('#creation_type_id').val());
    });

    $('#creation_type_id').on('change', function () {
        // console.log($(this).val());
        if ($(this).val() == "") {
            $("#creation_subtype_id").html("<option value=\"\">- Pilih Sub-Jenis Ciptaan -</option>");
        }

        getSubjenis($(this).val());
    });

    function getSubjenis(id) {
        var selected_subjenis = "{{ old('creation_subtype_id', $detailHakcipta->creation_subtype_id) }}";
        var url = "{{ url('/ajuan/generate/subjenis') }}"+"/"+id;
        $.ajax({
            url: url,
            type:'POST',
            data: {
                _token:_token,
                selected_subjenis:selected_subjenis,
            },
            success: function(data) {
                $("#creation_subtype_id").html(data);
            }
        });
    }

    function deletePencipta(id) {
        // console.log(id);
        var url = "{{url('/ajuan/')}}"+"/"+_ajuan+"/pencipta/"+id;
        console.log(url);
        Swal.fire({
            title: 'Anda yakin??',
            text: "Menghapus pencipta",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Cancel'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type:'DELETE',
                    data: {_token:_token},
                    success: function(data) {
                        Swal.fire(
                            'Sukses',
                            'Menghapus pencipta',
                            'success'
                        )

                        penciptaTable.ajax.reload();
                    }
                });
            }
        })
    }

    function deletePemegang(id) {
        // console.log(id);
        var url = "{{url('/ajuan/')}}"+"/"+_ajuan+"/pemegang/"+id;
        console.log(url);
        Swal.fire({
            title: 'Anda yakin??',
            text: "Menghapus pemegang hakcipta",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Cancel'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type:'DELETE',
                    data: {_token:_token},
                    success: function(data) {
                        Swal.fire(
                            'Sukses',
                            'Menghapus pemegang hakcipta',
                            'success'
                        )

                        pemegangHakCiptaTable.ajax.reload();
                    }
                });
            }
        })
    }
</script>
<script>
    window.addEventListener('openModalAdd', event => {
        $('#addCreator').modal('show');
    })

    window.addEventListener('closeModalAdd', event => {
        $('#addCreator').modal('hide');
    })

    window.addEventListener('openModalEdit', event => {
        $('#editCreator').modal('show');
    })

    window.addEventListener('closeModalEdit', event => {
        $('#editCreator').modal('hide');
    })

    window.addEventListener('openModalDelete', event => {
        // $('#editCreator').modal('hide');
        Swal.fire({
            title: 'Anda yakin??',
            text: "Menghapus pencipta hakcipta",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Cancel'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deleteCreator');
                    Swal.fire({
                    title: 'Sukses',
                    text: "Menghapus pencipta hakcipta",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                })
            }
        })
    })


    // window.addEventListener('updated', event => {
    //     // $('#addCreator').modal('hide');
    //     // console.log('asdasdsa');
    // })
</script>
@endsection