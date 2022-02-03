@extends('layouts.portal')

@section('kontenAuth')

<div class="container">
    <a href="/login" class="btn btn-dark mt-5"><i class="fas fa-chevron-left"></i> Back</a>
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
                                <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Reset Password</h1>
                            </div>
                            @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                          @endif
                          
                          <form action="{{ route('forget.password.post') }}" method="POST">
                              @csrf
                              <div class="form-group">
                                <small class="ml-2">E-Mail Address</small>
                                <input type="email" class="form-control"
                                    id="email" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                              {{-- <div class="form-group row">
                                  <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                  <div class="col-md-6">
                                      <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                      @if ($errors->has('email'))
                                          <span class="text-danger">{{ $errors->first('email') }}</span>
                                      @endif
                                  </div>
                              </div> --}}
                              {{-- <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      Send Password Reset Link
                                  </button>
                              </div> --}}
                              <button type="submit" class="btn btn-primary btn-user btn-block ">
                                Send Email Reset Password
                            </button>
                          </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>


 

@endsection