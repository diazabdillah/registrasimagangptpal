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
                                    <h5 class="card-title mt-2">Edit Data</h5>


                                    <form method="POST" action="/edit-berita/{{ $data->id }}" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <!-- Input Judul -->
                                        <div class="form-group">
                                            <small class="ml-2">Judul</small>
                                            <textarea type="text" class="form-control" id="judul" name="judul"
                                                >{{ $data->judul }}</textarea>
                                        </div>
                                        <!-- Input Headline -->
                                        <div class="form-group">
                                            <small class="ml-2">Headline</small>
                                            <textarea type="text" class="form-control" id="headline" name="headline"
                                                >{{ $data->headline }}</textarea>
                                        </div>                                        
                                        <!-- Input Kontent -->
                                        <div class="form-group">
                                            <small class="ml-2">Konten</small>
                                            <textarea type="text" class="form-control" id="news-textarea" name="konten"
                                                >{{ $data->konten }}</textarea>
                                        </div>
                                        <!-- Input Foto -->
                                        <div class="form-group">
                                            <small class="ml-2">Foto</small>
                                            <input type="file" class="form-control" id="foto" name="foto">
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

    <script>
        ClassicEditor
            .create( document.querySelector( '#news-textarea' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>


@endsection
