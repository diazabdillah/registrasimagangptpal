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
                        - Jika sudah melakukan Presentasi mohon klik button "upload laporan" untuk softfile laporan akhir diupload. <br>
                        - Jika Laporan Akhir Anda terdapat revisi Mohon segera upload kembali file lapran akhir di button "edit" laporan yang sudah di perbaiki atau di revisi. <br>
                        - Jika Anda ingin melihat file revisi dari Pembimbing Divisi/Pembimbing HCM mohon tekan tombol "lihat revisi".
                  
                    </span>
                    <br>
                    <br>
                    <a class="btn btn-primary btn-sm mb-3" href="/upload-laporan" role="button"><i class="fas fa-plus"></i>
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
                                                <div class="card-body" style="margin-left:20px;">
                                                    <h5 class="card-title"><b>{{ $laporans->judul }}</b></h5>
                                                    <p class="card-text">{{ $laporans->divisi }}</p>
                                                    <p class="card-text">Nama Pembimbing Lapangan : {{ $laporans->nama_pembimbing_lapangan }}</p>
                                                    <p class="card-text">Revisi : {{ $laporans->revisi_divisi }}</p>
                                                    <p class="card-text">Nama Pembimbing Dept. HCD : {{ $laporans->nama_pembimbing_hcd }}</p>
                                                    <p class="card-text">Revisi : {{ $laporans->revisi }}</p>
                                                  <p class="card-text"><small class="text-muted">Diposting :
                                                            {{ date('d-m-Y', strtotime($laporans->created_at)) }}</small>
                                                    </p>
                                                    @if ($laporans->path != null)
                                                    @if($laporans->revisi==null)
                                                        <a class="btn btn-primary"
                                                            href="/lihat-laporan-mhs/{{ $laporans->id }}">Lihat Laporan</a>
                                                            @endif
                                                            <a class="btn btn-warning"
                                                            href="/edit-laporan-mhs/{{ $laporans->id }}">Edit</a>
                                                            @if($laporans->revisi != null)
                                                            <a class="btn btn-danger"
                                                            href="/lihat-laporan-mhs-revisi/{{ $laporans->id }}">Lihat Revisi</a>
                                                            @endif

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach


                        </div>
                        <h3 class="text-center">Perpustakaan Laporan Akhir Mahasiswa</h3>
                        <div class="container">
                            
                                <div class="d-flex justify-content-center">
                                    <form action="/mhs/cari" method="GET">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="cari"
                                                placeholder="Cari Laporan ..">

                                            <button class="btn btn-primary" type="submit">cari</button>

                                        </div>
                                    </form>
                                </div>
                        
                        </div>
                        {{-- <div class="container">
                            <div class="row">

                                <form method="GET" action="/mhs/cari">

                                    @csrf
                                    <label for="">Kategori Jurusan:</label>
                                    <div class="input-group" style="width:200px;">
                                        <select class="custom-select" name="kategori" required>
                                           
                                            <option value="Informatika">
                                                Informatika
                                            </option>
                                            <option value="Elektro">
                                                Elektro
                                            </option>
                                            <option value="Komputer">
                                                Komputer
                                            </option>
                                            <option value="Industri">
                                                Industri
                                            </option>
                                            <option value="Mesin">
                                                Mesin
                                            </option>
                                            <option value="Arsitek">
                                                Arsitek
                                            </option>
                                            <option value="Matematika">
                                                Matematika
                                            </option>
                                            <option value="ManajemenBisnis">
                                                Manajemen Bisnis
                                            </option>
                                            <option value="Manajemen">
                                                Manajemen
                                            </option>
                                            <option value="Ekonomi">
                                                Ekonomi
                                            </option>
                                            <option value="Akutansi">
                                                Akutansi
                                            </option>
                                            <option value="Hukum">
                                                Hukum
                                            </option>
                                            <option value="SistemInformasi">
                                                Sistem Informasi
                                            </option>
                                            <option value="Sipil">
                                                Sipil
                                            </option>
                                            <option value="Lingkungan">
                                                Lingkungan
                                            </option>
                                            <option value="Perkapalan">
                                                Perkapalan
                                            </option>
                                            <option value="Hubungan Internasional">
                                                Hubungan Internasional
                                            </option>
                                            <option value="Adminstrasi Perkantoran">
                                                Adminstrasi Perkantoran
                                            </option>
                                          
                                            <option value="Listrik">
                                            Listrik
                                            </option>
                                            <option value="Bahasa Inggris">
                                                Bahasa Inggris
                                            </option>
                                            <option value="Psikologi">
                                                Psikologi
                                            </option>
                                            <option value="Bisnis dan Manajemen">
                                                Bisnis dan Manajemen
                                            </option>
                                            <option value="Bisnis dan Manajemen">
                                                Bisnis dan Manajemen
                                            </option>
                                            <option value="Ilmu Komputer">
                                                Ilmu Komputer
                                            </option>
                                            <option value="Kimia">
                                                Kimia
                                            </option>
                                            <option value="Fisika">
                                                Fisika
                                            </option>
                                            <option value="Statistik">
                                                Statistik
                                            </option>
                                            <option value="Kelautan">
                                                Kelautan
                                            </option>
                                        </select>

                                        <button class="btn btn-primary" type="submit">Cari</button>

                                    </div>

                                </form>

                            </div>
                        </div> --}}

                        <div class="row mt-4">
                            @foreach ($user as $laporan)
                                @if ($status_user == 'Mahasiswa' || $status_user == 'Mahasiswa Kelompok')

                                    <div class="card ml-2" style="width: 500px;">
                                        <div class="row no-gutters">
                                            <div class="col-md-4 mb-3 mt-3 ">
                                                <img width="100px" height="90px" style="margin-left:10px;"
                                                    src="{{ asset('img/book.png') }}" class="gambar1" alt="pt pal">
                                            </div>
                                            <div class="col-md-6 mt-2 mb-2">
                                                <h6 class="card-title"> <b> {{ $laporan->judul }}</b>
                                                </h6>
                                                <p style="font-size:15px;" class="card-text">
                                                    {{ $laporan->divisi }}</p>
                                                <p class="card-text"><small class="text-muted">Diposting
                                                        {{ date('d-M-Y', strtotime($laporan->created_at)) }}</small>
                                                </p>

                                            </div>
                                            <div class="col-md-2 mb-4">
                                                @if ($laporan->path != null)
                                                    {{-- <a class="btn btn-primary"
                                                            href="{{ asset('file/laporan-mhs/isi/' . $laporan->path) }}">Download</a> --}}
                                                    <a class="mr-4 mt-4 btn btn-primary"
                                                        href="/lihat-laporan-mhs/{{ $laporan->id }}">Lihat Laporan</a>

                                                @endif
                                            </div>


                                        </div>
                                    </div>
                                @endif
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="alert alert-danger" role="alert">
                    <p class="card-text">
                        <b> Note :</b> <br>
                        - Mohon para Praktikan bisa mencari refrensi format laporan akhir di perpustakaan ini dan bisa ke halaman depan bagian menu "Info Internship" <br>
                        - Mohon para Praktikan mengupload berkas laporan akhir berupa pdf dan tidak boleh isi laporan akhir sama dengan orang lain atau copy paste laporan akhir orang lain <br>
                        - Mohon Para Praktikan mengikuti peraturan laporan akhir jika melanggar/tidak jujur akan diberikan sanksi. 
    
                    </p>
                </div>
            </div>
            <!-- /.container-fluid -->


        </div>
    </div>
    
    <!-- End of Main Content -->
@endsection
