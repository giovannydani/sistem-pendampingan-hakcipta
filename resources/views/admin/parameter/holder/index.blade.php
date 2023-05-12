@extends('template.main')

@section('page-title', 'Holder Parameter')

@section('content')
<div class="page-heading">
  <h3>Holder Parameter</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.parameter.holder.create') }}" class="btn btn-primary me-3 mb-3"><i class="fa-solid fa-plus"></i> Add Holder</a>
                <table class="table table-light" id="application-type-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Kewarganegaraan</th>
                            <th>Alamat</th>
                            <th>Negara</th>
                            <th>Provinsi</th>
                            <th>Kota / Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Kode Pos</th>
                            <th>Perusahaan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var templateTable;
        $(document).ready( function () {
            var _token = "{{ csrf_token() }}";
            applicationTypeTable =  $('#application-type-table').DataTable({
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"]],
                processing: true,
                serverSide: true,
                scrollX: true,
                responsive: true,
                scrollCollapse: true,
                fixedColumns: {
                    left: 0,
                    right: 1,
                },
                ajax: {
                    url : "{{route('admin.parameter.holder.data')}}",
                    type : 'POST',
                    data: {
                        _token:_token,
                    },
                },
                columns: [
                    { 
                        "searchable": false,
                        data: 'id',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        } 
                    },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'no_telp' },
                    { 
                        data: 'nationality.name'
                    },
                    { data: 'address' },
                    { 
                        data: 'country.name',
                    },
                    { 
                        data: 'province_id',
                        render : function (data, type, row, meta) {
                            if (row.indonesian) {
                                return row.province['name'];
                            }else{
                                return "-";
                            }
                        } 
                    },
                    {
                        data: 'district_id',
                        render : function (data, type, row, meta) {
                            if (row.indonesian) {
                                return row.districta['name'];
                            }else{
                                return row.district;
                            }
                        }
                    },
                    { 
                        data: 'subdistrict_id',
                        render : function (data, type, row, meta) {
                            if (row.indonesian) {
                                return row.subdistrict['name'];
                            }else{
                                return "-";
                            }
                        }
                    },
                    { data: 'postal_code' },
                    { data: 'is_company' },
                    {
                        orderable: false,
                        "searchable": false,
                        data: 'id',
                        render: function(data, type, row){
                            var url_edit = "{{url('/admin/parameter/holder/')}}"+"/"+data+"/edit";
                            var delete_action = "onclick=\"deleteHolder('"+data+"')\"";

                            return '\
                            <div class="btn-group" role="group" aria-label="PIC Details Action">\
                                <a href="'+url_edit+'" class="btn btn-warning btn-sm me-2 mb-1"><i class="fa-solid fa-pen-to-square"></i> Edit</a>\
                                <button type="button" class="btn btn-sm btn-danger mb-1 me-2" '+delete_action+'><i class="fa-solid fa-trash-can"></i> Delete</button>\
                            </div>';

                        }
                    },
                ]
            });

            // $('#application-type-table').DataTable();
        } );

        function deleteHolder(id) {
            var _token = "{{ csrf_token() }}";
            var url = "{{url('/admin/parameter/holder/')}}"+"/"+id;
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this type",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete It!',
                cancelButtonText: 'Cancel'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type:'DELETE',
                        data: {_token:_token},
                        success: function(data) {
                            Swal.fire(
                                'Success',
                                'Delete Type Data',
                                'success'
                            )

                            applicationTypeTable.ajax.reload();
                        }
                    });
                }
            })
        }

        function restoreApplicationType(id) {
            var _token = "{{ csrf_token() }}";
            var url = "{{url('/admin/application-type/restore/')}}"+"/"+id;
            Swal.fire({
                title: 'Are you sure?',
                text: "Restore this type",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Restore It!',
                cancelButtonText: 'Cancel'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type:'POST',
                        data: {_token:_token},
                        success: function(data) {
                            Swal.fire(
                                'Success',
                                'Restore Type Data',
                                'success'
                            )

                            applicationTypeTable.ajax.reload();
                        }
                    });
                }
            })
        }
    </script>
@endsection