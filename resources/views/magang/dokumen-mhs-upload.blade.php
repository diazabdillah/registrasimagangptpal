@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>
            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
            @endif

            <div class="row mt-3">
                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Upload</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <form method="POST" action="/upload-mhs/{{$user->id}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mt-4">
                                            <label>KTP</label>
                                            <input type="file" class="form-control" id="ktp" name="foto[]">
                                        </div>
                                        <div class="form-group mt-4">
                                            <label>KTM</label>
                                            <input type="file" class="form-control" id="ktm" name="foto[]">
                                        </div>
                                        <div class="form-group mt-4">
                                            <label>Foto Asuransi Ketenagakerjaan (opsional)</label>
                                            <input type="file" class="form-control" id="asuransi" name="foto[]">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-5">Upload Foto <i class="fas fa-upload"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection