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
                                        <form method="POST" action="{{ route('uploadFotoSmk') }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            @foreach ($showImage as $img)
                                                <div class="form-group">
                                                    <img src="{{ asset('/storage/public/fotosmk/' . $img->foto) }}"
                                                        alt="Foto" class="img-thumbnail mt-2" width="135">
                                                </div>
                                            @endforeach
                                            <div class="form-group mt-4">
                                                <label>KTP</label>
                                                <input type="file" class="form-control" id="ktp" name="foto[]">
                                            </div>
                                            <div class="form-group mt-4">
                                                <label>Kartu Pelajar</label>
                                                <input type="file" class="form-control" id="ktm" name="foto[]">
                                            </div>
                                            <div class="form-group mt-4">
                                                <label>Foto Asuransi Ketenaga kerjaan (Optional)</label>
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

                    <div class="col-sm-6">
                        <div class="card shadow mb-3">
                            <div class="card">
                                <div class="card-header">
                                    Foto
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <form method="POST" action="{{ route('upFotoSmk') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="alert alert-info" role="alert">
                                                <p>Kirim Foto 3x4 dengan background merah/biru max 1MB</p>
                                            </div>
                                            <label>Foto 3x4</label>
                                            <input type="file" class="form-control" id="foto" name="fotoid[]">
                                            <button type="submit" class="btn btn-primary mt-3">Upload Foto <i
                                                    class="fas fa-upload"></i></button>
                                        </form>
                                    </div>
                                    @foreach ($fotoID as $imgid)
                                        <div class="col-sm-3 mb-3">
                                            <div class="card">
                                                <img src="{{ asset('/storage/public/fotoIDSmk/' . $imgid->fotoID) }}"
                                                    alt="Foto" class="img-thumbnail" width="135">
                                                <a class="btn btn-danger p-0 mt-2 float-right"
                                                    href="{{ url('Dokumen_smk_upload/' . $imgid->id, $imgid->fotoID) }}"><i
                                                        class="far fa-trash-alt p-1"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
