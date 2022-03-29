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
                                <h5 class="card-title mt-2">Data</h5>
                                <p class="card-text"><small>Setelah membuat akun mohon lengkapi data berikut dengan benar untuk pemerosesan seleksi berkas</small></p>

                                <form id="formregis" method="POST" action="/input-data-smk">
                                    @csrf
                                    <!-- Input Univ -->
                                    <div class="form-group">
                                        <small class="ml-2">Sekolah</small>
                                        <input type="text" class="form-control @error('sekolah') is-invalid @enderror" id="sekolah" name="sekolah" value="{{ old('sekolah') }}">

                                        @error('sekolah')
                                        <div class="invalid-feedback mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <small class="ml-2">NIS</small>
                                        <input type="text" class="form-control" id="nis" name="nis">
                                    </div>
                                    <div class="form-group">
                                        <small class="ml-2">Jurusan</small>
                                        <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" value="{{ old('jurusan') }}">

                                        @error('jurusan')
                                        <div class="invalid-feedback mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <small class="ml-2">Alamat Rumah</small>
                                        <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah">
                                    </div>
                                    <div class="form-group">
                                        <small class="ml-2">Nomer Hp</small>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block buttonregis">
                            
                                        <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Loading </div>
                                        <div class="text">Kirim <i
                                            class="fas fa-paper-plane"></i></div>
                                    </button>
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