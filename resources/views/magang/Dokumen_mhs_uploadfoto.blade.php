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
                                <form method="POST" action="{{ route('upFotoMhs', [$user->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="alert alert-info" role="alert">
                                        <p>Kirim Foto 3x4 dengan background merah/biru max 1MB</p>
                                    </div>
                                    <label>Foto 3x4</label>
                                    <input type="file" class="form-control" id="foto" name="fotoid[]">
                                    <button type="submit" class="btn btn-primary mt-3">Upload Foto <i class="fas fa-upload"></i></button>
                                </form>
                            </div>
                            {{-- @foreach ($fotoID as $imgid)
                                    <div class="col-sm-3 mb-3">
                                        <div class="card">
                                            <img src="{{ asset('/file/' . $imgid->fotoID) }}" alt="Foto" class="img-thumbnail" width="135">
                                            <a class="btn btn-danger p-0 mt-2 float-right" href="{{ url('Dokumen_mhs_upload/' . $imgid->id, $imgid->fotoID) }}"><i class="far fa-trash-alt p-1"></i></a>
                                        </div>
                                    </div>
                            @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection