{{-- Mengambil layout dari portal.blade.php --}}
@extends('layouts.portal')

@section('kontenAuth')

    <div class="container">
        <a href="/" class="btn btn-dark mt-5"><i class="fas fa-chevron-left"></i> Home</a>
        <!-- Outer Row -->
        <div class="row justify-content-center">



            <div class="card o-hidden border-0 shadow-lg my-2">

                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">

                            <div>

                                <img src="{{ asset('img/logo_pal.png') }}" style="padding-top: 30px;padding-left:40px;"
                                    width="130px" alt="">
                            </div>
                            <div>
                                <img style="margin-top:30px;margin-left:40px;" src="{{ asset('img/login1.jpg') }}"
                                    width="100%" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Login Page</h1>
                                </div>

                                <!-- Alert data -->
                                @if (session()->has('logout'))
                                    <div class="alert alert-warning" role="alert">
                                        {{ session()->get('logout') }}
                                    </div>
                                @endif

                                @if (session()->has('succes'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session()->get('succes') }}
                                    </div>
                                @endif

                                <!-- form input login -->
                                <form method="POST" action="{{ route('loginpost') }}">
                                    @csrf

                                    <!--- Email --->
                                    <div class="form-group">
                                        <small class="ml-2">Email</small>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}">

                                        @error('email')
                                            <div class="invalid-feedback mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!--- Password --->
                                    <div class="form-group">
                                        <small class="ml-2">Password</small>
                                        <input id="password" type="password" class="form-control" name="password"
                                            required>

                                        @error('password')
                                            <div class="invalid-feedback mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block ">
                                        Login
                                    </button>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="/auth">Dont have account ?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

@endsection
