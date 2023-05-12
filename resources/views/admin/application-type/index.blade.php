@extends('template.main')

@section('page-title', 'Application Type')

@section('content')
<div class="page-heading">
  <h3>Application Type</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.application-type.create') }}" class="btn btn-primary me-3 mb-3"><i class="fa-solid fa-plus"></i> Add Application Type</a>
                <table class="table" id="application-type-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
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
                // scrollX: true,
                // responsive: true,
                scrollCollapse: true,
                fixedColumns: {
                    left: 0,
                    right: 1,
                },
                ajax: {
                    url : "{{route('admin.application-type.data')}}",
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
                    {
                        orderable: false,
                        "searchable": false,
                        data: 'id',
                        render: function(data, type, row){
                            var url_edit = "{{url('/admin/application-type/')}}"+"/"+data+"/edit";
                            var delete_action = "onclick=\"deleteApplicationType('"+data+"')\"";
                            var restore_action = "onclick=\"restoreApplicationType('"+data+"')\"";

                            if (row.is_deleted) {
                                return '\
                                <div class="btn-group" role="group" aria-label="PIC Details Action">\
                                    <button type="button" class="btn btn-sm btn-danger mb-1 me-2" '+restore_action+'><i class="fa-solid fa-recycle"></i> Restore</button>\
                                </div>';
                            }else{
                                return '\
                                <div class="btn-group" role="group" aria-label="PIC Details Action">\
                                    <a href="'+url_edit+'" class="btn btn-warning btn-sm me-2 mb-1"><i class="fa-solid fa-pen-to-square"></i> Edit</a>\
                                    <button type="button" class="btn btn-sm btn-danger mb-1 me-2" '+delete_action+'><i class="fa-solid fa-trash-can"></i> Delete</button>\
                                </div>';
                            }

                        }
                    },
                ]
            });

            // $('#application-type-table').DataTable();
        } );

        function deleteApplicationType(id) {
            var _token = "{{ csrf_token() }}";
            var url = "{{url('/admin/application-type/')}}"+"/"+id;
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