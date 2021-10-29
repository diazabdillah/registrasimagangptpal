@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 mb-3"><b>{{ $ti }}</b></h1>

            <div class="card shadow mb-4">
                <div class="card">
                    <div class="card-header">
                        File PDF
                    </div>
                    <div class="card-body">
                        @foreach ($files as $file)
                        <embed class="mt-3" type="application/pdf" src="{{ asset('/storage/public/filesmk/' . $file->path) }}" width="100%" height="400"></embed>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection