@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>
                @if (session()->has('succes'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('succes') }}
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
                                        <form method="POST" action="/upload-penelitian/{{ $user->id }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="alert alert-danger" role="alert">
                                                <p>Kirim File dengan Format JPG/JPEG/PNG</p>
                                            </div>
                                            <div class="form-group mt-4">
                                                <label>KTP <small style="color: red">*Max
                                                        2MB</small></label>
                                                <br><small style="color: blue">Contoh :</small>
                                                <br> <img width="30%" src="{{ asset('img/contoh-ktp.png') }}" alt="">
                                                <input type="file" class="form-control" id="ktp" name="foto[]">
                                            </div>
                                            <div class="form-group mt-4">
                                                <label>KTM <small style="color: red">*Max
                                                        2MB</small></label>
                                                <br><small style="color: blue">Contoh :</small>
                                                <br><img width="20%" src="{{ asset('img/student-card.png') }}" alt="">
                                                <input type="file" class="form-control" id="ktm" name="foto[]">
                                            </div>
                                            <div class="form-group mt-4">
                                                <label>Kartu BPJS Ketenagakerjaan <small style="color: red">*Max
                                                        2MB</small></label>
                                                <br><small style="color: blue">Contoh :</small>
                                                <br><img width="20%" src="{{ asset('img/contoh-bpjs.png') }}" alt="">
                                                <input type="file" class="form-control" id="asuransi" name="foto[]">
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-5">Upload Foto <i
                                                    class="fas fa-upload"></i></button>
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
