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
                        <div class="card-header">
                            Edit Laporan
                        </div>
                        <div class="card-body">
                            <form action="/proses-edit-laporan-mhs/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <div class="form-group">
                                    <small class="ml-2">Judul Laporan</small>
                                    <input type="text" class="form-control" name="judul" value="{{$data->judul}}" required>
                                </div>
                                <div class="form-group">
                                    <span>File Laporan</span><br>
                                    <input type="file" name="path" required>
                                </div>

                                <button type="submit" class="btn btn-primary mt-4">Upload Laporan</button>
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
