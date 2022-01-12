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
  <p class="card-text"><small>Setelah melakukan tes kepribadian mohon di isi data
                                            form pengumpulan dan kirim file screenshot hasil tes pribadian dibawah ini
                                            sesuai dengan hasil tes kepribadian dimasing-masing peserta</small></p>


                                    <form method="POST" action="/interview-mhs/{{ $user->id }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="alert alert-danger" role="alert">
                                            <p>Kirim File dengan Format JPG/PNG</p>
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
