@extends('layouts.webBack')

@section('kontenWebBack')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            <div class="card shadow">
                <div class="card">
                    <div class="card-header">
                        Liat Laporan
                    </div>
                    <div class="card-body">
                        <iframe src="{{ asset('/file/' . $user->path) }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
                        
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->


    </div>
</div>
@endsection
