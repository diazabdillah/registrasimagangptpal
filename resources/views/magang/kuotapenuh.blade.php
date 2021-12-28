{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->


        <!-- Content Row -->
        <div class="row">
            <div style="width:100%" class="card alert alert-danger">

                <img class="img-responsive center-block" style="margin: 0 auto" width="35%"
                    src="{{ asset('img/gagal.png') }}" alt="">
                <h2 class="text-center mt-2" style="color: #c52121"><b> MAAF KAMU BELUM BERHASIL</b></h2>
                <p class="text-center">Hi {{ Auth::user()->name }},</p>
                <p class="text-center">Mohon Maaf Kuota Unit Kerja pilihanmu sudah penuh. <br> Jangan Berkecil hati, kamu masih bisa mendaftar pada kuota bulan selanjutnya. <br> Info lebih lanjut bisa menghubungi koordinator internship : <br> <b>Iwan Miharja (CP: 088226199728)</b></p>

            </div>

            <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection
