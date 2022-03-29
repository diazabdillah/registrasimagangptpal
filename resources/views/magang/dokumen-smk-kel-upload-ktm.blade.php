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
                                        <form id="formregis" method="POST" action="/upload-smk-kel-ktm/{{ $user->id }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="alert alert-danger" role="alert">
                                                <p>Kirim File dengan Format JPG/JPEG/PNG</p>
                                            </div>
                                            {{-- <div class="form-group mt-4">
                                                <label>KTP <small style="color: red">*Max
                                                        2MB</small></label>
                                                <br><small style="color: blue">Contoh :</small>
                                                <br> <img width="30%" src="{{ asset('img/contoh-ktp.png') }}" alt="">
                                                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="ktp" name="foto">
                                                @error('foto')
                                            <div class="invalid-feedback mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                            </div> --}}
                                             <div class="form-group mt-4">
                                                <label>KTM <small style="color: red">*Max
                                                        2MB</small></label>
                                                <br><small style="color: blue">Contoh :</small>
                                                <br><img width="20%" src="{{ asset('img/student-card.png') }}" alt="">
                                                <input type="file" class="form-control  @error('foto') is-invalid @enderror" id="ktm" name="foto">
                                                @error('foto')
                                                <div class="invalid-feedback mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            </div>
                                            {{-- <div class="form-group mt-4">
                                                <label>Kartu BPJS Ketenagakerjaan <small style="color: red">*Max
                                                        2MB</small></label>
                                                <br><small style="color: blue">Contoh :</small>
                                                <br><img width="20%" src="{{ asset('img/contoh-bpjs.png') }}" alt="">
                                                <input type="file" class="form-control" id="asuransi" name="foto">
                                            </div>  --}}
                                            <button type="submit" class="btn btn-primary btn-user btn-block mt-3 buttonregis">
                            
                                                <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Loading </div>
                                                <div class="text">Upload Foto <i
                                                    class="fas fa-upload"></i></div>
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
    </div>


@endsection
