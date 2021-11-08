@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            @if (session()->has('succes'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('succes') }}
            </div>
            @endif
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 mb-3"><b>{{ $ti }}</b></h1>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mt-2">File</h5>
                                <p class="card-text">Kirim file dalam bentuk PDF dengan maksimal ukuran 2 MB</p>

                                <form method="POST" action="{{ route('fileSmkKel') }}" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Upload Proposal dan surat pengajuan -->
                                    <div class="form-group">
                                        <small class="ml-2">Proposal Magang</small>
                                        <input type="file" name="berkas[]" class="form-control @error('berkas') is-invalid @enderror">

                                        @error('berkas')
                                        <div class="invalid-feedback mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <small class="ml-2">Surat Pengantar Magang</small>
                                        <input type="file" name="berkas[]" class="form-control @error('berkas') is-invalid @enderror">

                                        @error('berkas')
                                        <div class="invalid-feedback mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <small class="ml-2">Curriculum Vitae (opsional)</small>
                                        <input type="file" name="berkas[]" class="form-control @error('berkas') is-invalid @enderror">

                                        @error('berkas')
                                        <div class="invalid-feedback mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- End upload Proposal dan surat pengajuan -->

                                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Kirim <i class="fas fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>


@endsection