@extends('layouts.webBack')

@section('kontenWebBack')
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
                    <div class="card shadow mb-3">
                        <div class="card">
                            <div class="card-header">
                                Foto
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <form method="POST" action="/upload-smk-kel-foto/{{ $user->id }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="alert alert-danger" role="alert">
                                            <p>Kirim Foto 3x4 dengan background merah / biru dan Format JPG/JPEG/PNG</p>
                                        </div>
                                        <label>Foto 3x4 <small style="color: red">*Max
                                                2MB</small></label>
                                        <br><small style="color: blue">Contoh :</small>
                                        <br><img width="30%" src="{{ asset('img/contoh-foto.png') }}" alt="">
                                        <input type="file" class="form-control" id="foto" name="fotoid[]">
                                        <button type="submit" class="btn btn-primary mt-3">Upload Foto <i
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


@endsection
