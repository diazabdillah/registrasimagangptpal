{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->


        <!-- Content Row -->
        <div class="row">
            <div style="width:100%" class="card alert alert-primary">

                <img class="img-responsive center-block" style="margin: 0 auto" width="35%"
                    src="{{ asset('img/konfirmasi_akun.png') }}" alt="">
                <h2 class="text-center mt-2" style="color: blue"><b> Konfirmasi Akun Anda</b></h2>
                <p class="text-center">Hi {{ Auth::user()->name }},</p>
                <p class="text-center">Anda Telah Melakukan Pendaftaran di Registrasi Magang Online PT PAL(PERSERO). <br> Untuk Melanjutkan proses ke tahap pengumpulan berkas magang atau penelitian (proposal dan surat pengantar), Mohon  Anda konfirmasi akun anda ke admin terlebih dahulu untuk keperluan Magang atau Penelitian di PT PAL(PERSERO).Mohon ditunggu konfirmasi akun anda akan di proses selama 5 hari kerja. <br> Konfirmasi Akun Anda bisa menghubungi koordinator internship : <br> <b>Iwan Miharja (CP: 088226199728)</b></p>

            </div>

            <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection
