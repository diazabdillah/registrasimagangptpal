@extends('layouts.webBack')

@section('kontenWebBack')


<div class="main">
    <div class="main-content">
        <div class="container-fluid">


            <div class="panel">
                <div class="panel-heading">
                    <h1 class="h3 mb-2 text-gray-800 mb-3"><b>{{ $ti }}</b></h1>
                    <div class="alert alert-info" role="alert">
                        <p class="card-text">
                            <b>Peraturan Chat Admin:</b><br>
                            - Jika Praktikan hendak chat Admin silahkan tekan tombol "Mulai Bertanya", mohon tidak boleh
                            spam
                            pertanyaan kepada Admin dan tidak boleh berkata kasar atau mengandung unsur SARA. <br>
                            - Jika hendak komen pertanyaan Praktikan lain silahkan tekan tombol "Jawaban", mohon tidak
                            boleh spam komentar kepada Praktikan lain dan tidak boleh
                            berkata kasar atau mengandung unsur SARA.
                        </p>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="fas fa-plus-circle"></i> Mulai Bertanya
                        </button>
                    </div>



                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Buat Pertanyaan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/tambah-forum" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Judul Pertanyaan</label>
                                            <input type="text" class="form-control" id="judul" name="judul">
                                        </div>
                                        <div class="form-group">
                                            <label>Isi Pertanyaan</label>
                                            <textarea class="form-control" name="konten" id="konten" cols="30"
                                                rows="10"></textarea>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <br>
                <div class="panel-body">


                    @foreach ($forum as $kontenforum)
                    @php
                    $count = 0;
                    @endphp

                    <div class="card mb-3" style="max-width: 900px;">

                        <div class="row">

                            <div class="col-md-4">
                                <center> <img width="100px" src="{{ asset('img/undraw_profile.svg') }}"
                                        class="center img-profile rounded-circle mt-4 mb-2" alt="..."></center>
                                <h6 class="text-center">{{ $kontenforum->name }}</h6>
                                <h6 class="text-center text-primary">{{ $kontenforum->status_user }}</h6>
                            </div>
                            <div class="col-md-8">
                                <a href="forum-view/{{ $kontenforum->id }}"
                                    style="color: rgb(58, 58, 58);text-decoration:none;">
                                    <div class="card-body mt-4">
                                        <h1 class="card-title text-dark fs-3 ">
                                            <b>{{ $kontenforum->judul }}</b>
                                        </h1>
                                        <p class="card-text text-grey-500 text-break">{{ $kontenforum->konten }}
                                        </p>
                                        <div class="d-flex justify-content-end mt-4">

                                            @foreach ($countKomentar as $cK)
                                            @if ($cK->forum_id == $kontenforum->id)

                                            @php
                                            $count++;
                                            @endphp

                                            @endif
                                            @endforeach
                                            <span class="mr-2 fs-7 btn btn-success"><i class="fas fa-comments"></i>
                                                {{ $count }}
                                                Jawaban
                                            </span>

                                            <p class="card-text mt-2">
                                                <small class="text-muted">{{ $kontenforum->created_at->diffforHumans()
                                                    }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>

                    </div>
                    @endforeach
                  
                </div>

            </div>

        </div>
    </div>


</div>

@endsection
