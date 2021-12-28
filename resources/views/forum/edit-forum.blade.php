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


                                    <form method="POST" action="/proses-edit-forum/{{ $kontenforum->id }}">
                                        @method('put')
                                        @csrf
                                        <div class="form-group">
                                            <label class="ml-2">Judul Forum</label>
                                            <input type="text" class="form-control" name="judul"
                                                value="{{ $kontenforum->judul }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="ml-2">Konten Forum</label><br>
                                            <textarea class="form-control" name="konten" cols="30"
                                                rows="10">{{ $kontenforum->konten }}</textarea>

                                        </div>

                                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Update <i
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
