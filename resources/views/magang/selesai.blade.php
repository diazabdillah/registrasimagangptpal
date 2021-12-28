{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->


        <!-- Content Row -->
        <div class="row">
            <div style="width:100%" class="card alert alert-success">

                <img class="img-responsive center-block" style="margin: 0 auto" width="35%"
                    src="{{ asset('img/selamat.png') }}" alt="">
                <h2 class="text-center mt-2" style="color: rgb(7, 139, 2)"><b> SELAMAT KAMU TELAH SELESAI</b></h2>
                <p class="text-center">Hi {{ Auth::user()->name }},</p>
                <p class="text-center">Terima Kasih Telah Melaksanakan Internship di PT PAL Indonesia (Persero). <br> Sampai
                    jumpa dan sukses selalu Good Luck Ya :).</p>
                <p class="text-center" style="font-size: small;">Sebagai Informasi : Akun anda setelah ini otomatis akan dinonaktifkan</p>





            </div>

            <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection
