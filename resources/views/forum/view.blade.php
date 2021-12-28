@extends('layouts.webBack')

@section('kontenWebBack')


    <div class="main">
        <div class="main-content">
            <div class="container-fluid">


                <div class="panel">

                    <div class="d-flex justify-content-between" style="height:40px ;">
                        @foreach ($forum as $kontenforum)
                            <h1 class="h3 mb-2 text-gray-800 mb-3"><b>{{ $kontenforum->judul }}</b></h1>

                            @if (Auth::user()->role_id == 1)

                                @if (Auth::user()->id == $kontenforum->user_id)

                                    <div class="d-flex justify-content-end " style="margin-right: 40px">
                                        <a href="/edit-forum/{{ $kontenforum->id }}" class="btn btn-warning mr-2"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        <a href="/hapus-forum/{{ $kontenforum->id }}" class="btn btn-danger "><i
                                                class="far fa-trash-alt"></i> Hapus</a>
                                    </div>

                                @else

                                    <div class="d-flex justify-content-end">
                                        <a href="/hapus-forum/{{ $kontenforum->id }}" class="btn btn-danger "><i
                                                class="far fa-trash-alt"></i> Hapus</a>

                                    </div>

                                @endif


                            @else

                                @if (Auth::user()->id == $kontenforum->user_id)

                                    <div class="d-flex justify-content-end " style="margin-right: 40px">
                                        <a href="/edit-forum/{{ $kontenforum->id }}" class="btn btn-warning mr-2"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        <a href="/hapus-forum/{{ $kontenforum->id }}" class="btn btn-danger "><i
                                                class="far fa-trash-alt"></i> Hapus</a>
                                    </div>

                                @endif

                            @endif

                        @endforeach
                    </div>



                    <br>
                    <div class="panel-body">


                        @foreach ($forum as $kontenforum)
                            <div class="card mb-3" style="max-width: 100%;">

                                <div class="row">

                                    <div class="col-md-3">
                                        <div style="width:200px;" class="card mt-4 ml-4">
                                            <center> <img width="100px" src="{{ asset('img/undraw_profile.svg') }}"
                                                    class="center img-profile rounded-circle mt-4 mb-2" alt="..."></center>
                                            <h6 class="text-center">{{ $kontenforum->name }}</h6>
                                            <h6 class="text-center text-primary">{{ $kontenforum->status_user }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-9">

                                        <div class="card-body">

                                            <p class="card-text fs-5 text-grey-500 text-break">
                                                {{ $kontenforum->konten }}
                                            </p>



                                        </div>

                                        <div class="d-flex justify-content-between" style="margin-top:110px;">
                                            <small
                                                class="text-muted ml-4">{{ $kontenforum->created_at->diffforHumans() }}</small>

                                            <button class="fs-7 btn btn-primary mr-4" id="btn-komentar-utama"><i
                                                    class="fas fa-comments"></i> Tulis
                                                Komentar
                                                Anda</button>

                                        </div>

                                    </div>


                                </div>

                                <div class="col-md-6 mt-4" style="display: none" id="komentar-utama">

                                    <div class="form-group" style="margin-left:10px;width:950px;">
                                        <label><b> Komentar Anda</b></label>
                                        <form method="POST" action="/tambah-komentar">
                                            @csrf
                                            <input type="hidden" name="forum_id" value="{{ $kontenforum->id }}" id="">
                                            <input type="hidden" value="0" name="parent" id="">
                                            <textarea class="form-control" name="konten" cols="1000" rows="10"></textarea>
                                            <input type="submit" class="btn btn-primary mt-2" value="Kirim">
                                        </form>
                                    </div>

                                </div>
                                <center>
                                    <hr class="mt-4" style="width:95%;">
                                </center>
                                <span class="ml-4 fs-5 me-3 text-grey-800"><i class="far fa-comment-dots"></i>
                                    {{ $countKomentar }} Komentar</span>


                        @endforeach

                        @foreach ($komentar as $komenforum)


                            <div class="row">

                                <div class="col-md-3">
                                    <div style="width:200px;" class="card mt-4 ml-4">
                                        <center> <img width="100px" src="{{ asset('img/undraw_profile.svg') }}"
                                                class="center img-profile rounded-circle mt-4 mb-2" alt="..."></center>
                                        <h6 class="text-center">{{ $komenforum->name }}</h6>
                                        <h6 class="text-center text-primary">{{ $komenforum->status_user }}</h6>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body mt-4">

                                        <p class="card-text fs-5 text-grey-500 text-break">
                                            {{ $komenforum->konten }}
                                        </p>
                                        <p class="card-text">
                                            <small
                                                class="text-muted">{{ $komenforum->created_at->diffforHumans() }}</small>
                                        </p>


                                    </div>
                                </div>

                                @if (Auth::user()->role_id == 1)

                                    @if (Auth::user()->id == $komenforum->user_id)

                                        <div class="d-flex justify-content-end">
                                            <a href="/edit-komentar/{{ $komenforum->id }}"
                                                class="btn btn-warning mr-2"><i class="fas fa-edit"></i></a>
                                            <a href="/hapus-komentar/{{ $komenforum->id }}"
                                                class="btn btn-danger mr-4"><i class="far fa-trash-alt"></i></a>

                                        </div>

                                    @else

                                        <div class="d-flex justify-content-end">
                                            <a href="/hapus-komentar/{{ $komenforum->id }}"
                                                class="btn btn-danger mr-4"><i class="far fa-trash-alt"></i></a>

                                        </div>

                                    @endif


                                @else

                                    @if (Auth::user()->id == $komenforum->user_id)

                                        <div class="d-flex justify-content-end">
                                            <a href="/edit-komentar/{{ $komenforum->id }}"
                                                class="btn btn-warning mr-2"><i class="fas fa-edit"></i></a>
                                            <a href="/hapus-komentar/{{ $komenforum->id }}"
                                                class="btn btn-danger mr-4"><i class="far fa-trash-alt"></i></a>

                                        </div>

                                    @endif

                                @endif
                                <center>
                                    <hr class="mt-4" style="width:95%;">
                                </center>

                            </div>


                        @endforeach
                    </div>

                </div>


            </div>

        </div>
    </div>


    </div>

@endsection
