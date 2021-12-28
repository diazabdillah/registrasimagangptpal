{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $ti }}</h1> <!-- Title Untuk body -->
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="card">

                <div class="card-body">

                    {{-- @foreach ($menu as $m)
                    <p>{{ $m->menu }}</p>
                @endforeach --}}


                    <p class="card-text">Welcome To Registrasi Magang PT.PAL Indonesia</p>
                </div>
            </div>

            <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection
