{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>
                <div class="alert alert-success">
                    <span>
                        <b>Peraturan Laporan Akhir:</b><br>
                        - Sebelum laporan akhir dikumpulkan, harap ke Divisi Human Capital Management (Departemen Human Capital Development) untuk menemui koordinator internship
                        untuk melakukan presentasi singkat laporan akhir sewaktu para praktikan hampir selesai magangnya. <br>
                        - Jika sudah melakukan Presentasi mohon klik button "upload laporan" untuk softfile laporan akhir diupload.
                        - Jika Laporan Akhir Anda terdapat revisi Mohon segera upload kembali file lapran akhir di button "edit" laporan yang sudah di perbaiki atau di revisi
                    </span>
                    <br>
                    <br>
                    <a class="btn btn-primary btn-sm mb-3" href="/upload-laporan-penelitian" role="button"><i class="fas fa-plus"></i>
                        upload laporan</a>
                </div>
              
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan Akhir</h6>
                    </div>
                    <div class="card-body">


                        <div class="row mt-4">
                            @foreach ($users as $laporans)

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-md-4 mb-3 mt-3 ">
                                                <img width="150px" height="150px" style="margin-left:10px;"
                                                    src="{{ asset('img/book.png') }}" class="gambar1" alt="pt pal">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body" style="margin-left:15px;">
                                                    <h5 class="card-title"><b>{{ $laporans->judul }}</b></h5>
                                                    <p class="card-text">{{ $laporans->divisi }}</p>
                                                   <p class="card-text"><small class="text-muted">Diposting
                                                            {{ date('d-m-Y', strtotime($laporans->created_at)) }}</small>
                                                    </p>
                                                    @if ($laporans->path != null)
                                                        <a class="btn btn-primary"
                                                            href="/lihat-laporan-penelitian/{{ $laporans->id }}">lihat</a>

                                                       
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach


                        </div>
                      
                    </div>
                </div>
                <div class="alert alert-danger" role="alert">
                    <p class="card-text">
                        <b> Note :</b> <br>
                        - Mohon para Penelitian bisa mencari refrensi format laporan akhir di perpustakaan ini dan bisa ke halaman depan bagian menu "Info Internship" <br>
                        - Mohon para Penelitian mengupload berkas laporan akhir berupa pdf dan tidak boleh isi laporan akhir sama dengan orang lain atau copy paste laporan akhir orang lain <br>
                        - Mohon Para Penelitian mengikuti peraturan laporan akhir jika melanggar/tidak jujur akan diberikan sanksi. 
    
                    </p>
                </div>
            </div>
            <!-- /.container-fluid -->


        </div>
    </div>
    <!-- End of Main Content -->
@endsection
