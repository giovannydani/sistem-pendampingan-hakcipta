@extends('template.main')

@section('page-title', 'Profile')

@section('content')
<div class="page-heading">
  <h3>Profile</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="form-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <form action="{{ route('admin.application-type.store') }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-12 mb-3">
                                        <h5>Detail</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Application Type Name" value="{{ old('name', $user->name) }}">
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="email" class="form-control" name="email" placeholder="Email" value="{{ old('email', $user->email) }}">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-sm-12 d-flex mt-2">
                                        <button type="submit" class="btn btn-primary me-2 mb-1"><i class="fa-solid fa-plus"></i> Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <form action="{{ route('admin.application-type.store') }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-12 mb-3">
                                        <h5>Detail</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Application Type Name" value="{{ old('name', $user->name) }}">
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="email" class="form-control" name="email" placeholder="Email" value="{{ old('email', $user->email) }}">
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-sm-12 d-flex mt-2">
                                        <button type="submit" class="btn btn-primary me-2 mb-1"><i class="fa-solid fa-plus"></i> Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection