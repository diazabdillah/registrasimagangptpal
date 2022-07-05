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
                <p class="text-center">Hi {{ Auth::user()->name }},</p> <br>
               <p class="text-center"> Mohon di isi Testimoni di link ini   <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Testimoni</a> <br>Testimoni ini untuk perkembangan Aplikasi Registrasi Magang, pelayanan dan fasilitas magang di PT PAL.</p>
                <p class="text-center">Terima Kasih Telah Melaksanakan Internship di PT PAL Indonesia (Persero) dan sudah mengisi Testimoni. <br> Sampai jumpa semoga sehat dan sukses selalu Good Luck Ya :).</p>
                <p class="text-center" style="font-size: small;">Sebagai Informasi : Akun anda setelah ini otomatis akan dinonaktifkan</p>
            </div>

            <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nilai Aplikasi Registrasi Magang PT PAL</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="myForm" action="tambah-testimoni-mhs" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="message-text" class="col-form-label">Rating Aplikasi Registrasi magang PT PAL :</label>
                        <div class="rating-css">
                            <div class="star-icon">
                               
                                <input type="radio" value="1" name="star_rating" checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="star_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="star_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="star_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="star_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            </div>
                        </div>
            
                   
                        <div>
                            <label for="message-text" class="col-form-label">Pengalaman Magang di PT PAL :</label>
                            <textarea rows="5" class="form-control" id="message-text" name="pesan" placeholder="Beritahu pengguna lain mengapa Anda sangat senang magang di PT PAL" autofocus required></textarea>
                        </div>
                        <label for="message-text" class="col-form-label">Pelayanan kepada anak Magang :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pelayanan" value="buruk" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Buruk
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="pelayanan" value="baik" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Baik
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="pelayanan" value="sangat baik" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Sangat Baik
                            </label>
                          </div>

                          <label for="message-text" class="col-form-label">Fasilitas Tempat Magang :</label>
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="fasilitas" value="buruk" id="flexRadioDefault1">
                              <label class="form-check-label" for="flexRadioDefault1">
                                Buruk
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="fasilitas" value="baik" id="flexRadioDefault2" checked>
                              <label class="form-check-label" for="flexRadioDefault2">
                                  Baik
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="fasilitas" value="sangat baik" id="flexRadioDefault2" checked>
                              <label class="form-check-label" for="flexRadioDefault2">
                                  Sangat Baik
                              </label>
                            </div>

                        {{-- <div>
                            <input type="text" class="form-control" id="recipient-name" value="{{Auth::user()->name}}" name="nama_rating" disabled>
                        </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim Testimoni</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
