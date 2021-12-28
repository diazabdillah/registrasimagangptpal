{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-7">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

                <div class="card shadow">
                    <div class="card">

                        <div class="card-body">
                            <form action="/proses-divisi" method="POST">
                                @csrf
                                <div class="form-group">
                                    <small class="ml-2">Nama Divisi</small>
                                    <input type="text" class="form-control" id="bagian" name="nama_divisi">
                                </div>


                                <button type="submit" class="btn btn-primary mt-4">Tambah Divisi</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->


        </div>
    </div>
    <!-- End of Main Content -->

@endsection
