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
            <div class="card-header">
                Message
            </div>
            <div class="card-body">
                @if (session()->has('succes'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('succes') }}
                </div>
                @endif

                <p class="card-text">Lengkapi data anda untuk melanjutkan pendaftaran sampai ke tahap berikutnya, klik
                    menu <i class="fas fa-fw fa-file-alt"></i> <b>Data</b> yang ada di
                    sebelah kiri</p>
            </div>
        </div>

        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection