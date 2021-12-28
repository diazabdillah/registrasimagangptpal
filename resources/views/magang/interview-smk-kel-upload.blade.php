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
                                    <h5 class="card-title mt-2">Form Interview</h5>
                                    <p class="card-text"><small>Setelah melakukan tes kepribadian mohon di isi data
                                            form pengumpulan dan kirim file hasil tes pribadian dibawah ini
                                            sesuai dengan hasil tes kepribadian dimasing-masing peserta</small></p>


                                    <form method="POST" action="/interview-smk-kel/{{ $user->id }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="alert alert-danger" role="alert">
                                            <p>Kirim File dengan Format JPG/PNG</p>
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Tipe Kepribadian</small>
                                            <input type="text" class="form-control" id="" name="tipe_kepribadian">
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Extrovert</small>
                                            <input type="text" class="form-control" id="" name="ekstrovet">
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Introvert</small>
                                            <input type="text" class="form-control" id="" name="introvet">
                                        </div>

                                        <div class="form-group">
                                            <small class="ml-2">Visioner</small>
                                            <input type="text" class="form-control" id="" name="visioner">
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Realistik</small>
                                            <input type="text" class="form-control" id="" name="realistik">
                                        </div>

                                        <div class="form-group">
                                            <small class="ml-2">Emosional</small>
                                            <input type="text" class="form-control" id="" name="emosional">
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Rasional</small>
                                            <input type="text" class="form-control" id="" name="rasional">
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Perencanaan</small>
                                            <input type="text" class="form-control" id="" name="perencanaan">
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Improvisasi</small>
                                            <input type="text" class="form-control" id="" name="improvisasi">
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Tegas</small>
                                            <input type="text" class="form-control" id="" name="tegas">
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Waspada</small>
                                            <input type="text" class="form-control" id="" name="waspada">
                                        </div>
                                        <div class="form-group">
                                            <small>File Interview <span style="color: red">*Max
                                                    2MB</span></small><br>
                                            <small style="color: blue">Contoh :</small>
                                            <br><img style="margin-bottom: 10px" width="100%"
                                                src="{{ asset('img/mbti.png') }}" alt="">
                                            <input type="file" name="fileinterview">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Kirim <i
                                                class="fas fa-paper-plane"></i></button>
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
