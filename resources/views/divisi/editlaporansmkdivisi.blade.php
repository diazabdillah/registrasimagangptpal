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
                            <form action="/proseseditlaporansmk-divisi/{{ $data->id }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <div class="form-group">
                                    <small class="ml-2">Nama Pembimbing Lapangan</small>
                                    <input type="text" class="form-control" id="nama_pembimbing_lapangan" name="nama_pembimbing_lapangan" required>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Revisi Laporan</small>
                                    <textarea class="form-control" rows="10" name="revisi_divisi" required></textarea>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">File Revisi Laporan</small>
                                    <input type="file" class="form-control" id="path" name="path" required>
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
