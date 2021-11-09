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
                        Upload Laporan
                    </div>
                    <div class="card-body">
                        <form action="/proses-laporan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <small class="ml-2">Judul</small>
                                <input type="text" class="form-control" id="judul" name="judul">
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Sinopsis Buku</small>
                                <textarea class="form-control" rows="10" name="sinopsis"></textarea>
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Tanggal Kumpul</small>
                                <input type="date" class="form-control" id="tanggal" name="tanggal_kumpul" value={{now()}}>
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Pilih Divisi</small>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="divisi">
                                        <option selected>Pilih Divisi</option>
                                        <option value="Divisi 1">Divisi 1</option>
                                        <option value="Divisi 2">Divisi 2</option>
                                        <option value="Divisi 3">Divisi 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Upload Cover Laporan</small>
                                <input type="file" class="form-control" id="cover" name="cover">
                            </div>

                            <div class="form-group">
                                <small class="ml-2">Upload Laporan</small>
                                <input type="file" class="form-control" id="path" name="path">
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