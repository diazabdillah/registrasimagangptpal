{{-- Mengambil layout dari portal.blade.php --}}
@extends('layouts.portal')

@section('kontenAuth')

    <div class="container">
        <a href="/auth" class="btn btn-dark mt-5"><i class="fas fa-chevron-left"></i> Back</a>

        <div class="card o-hidden border-0 shadow-lg my-2">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-5 d-none d-lg-block">
                        <div>

                            <img src="{{ asset('img/logo_pal.png') }}" style="padding-top: 20px;padding-left:20px;"
                                width="130px" alt="">
                        </div>
                        <div>
                            <img style="margin-top:30px;margin-left:40px;" src="{{ asset('img/login1.jpg') }}"
                                width="100%" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 font-weight-bold mb-4">Registrasi Magang SMK</h1>
                                <h6 class="mb-3">Anda mendaftar secara individu atau kelompok ?</h6>
                            </div>

                            <a href="/auth_smk_kel" class="btn btn-outline-primary btn-lg btn-block">Kelompok</a>

                            <a href="/auth_smk_individu" class="btn btn-outline-primary btn-lg btn-block">Individu</a>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="/login">Already have an account ?<br> <b>Login in
                                        here!</b></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
