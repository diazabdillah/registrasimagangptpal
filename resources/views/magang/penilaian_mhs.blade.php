@extends('layouts.webBack')

@section('kontenWebBack')

<div class="container-fluid">

  <div class="row">
    <div class="col-lg">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Penilaian</h6>
        </div>
        @foreach ( $users as $penilaian)

        <div class="card-body">
          <div>
            <h6>Nama : {{$penilaian->nama}}</h6>

          </div>
          <div>
            <h6>Nim : {{$penilaian->nim}}</h6>
          </div>
          {{-- <div>
                            <h6>Lokasi Kp : PT. PAL Indonesia(Persero)</h6>
                        </div>
                        <div>
                            <h6>Alamat Lokasi Kp : Jalan Ujung, Ujung, Kec. Semampir, Kota Surabaya, Jawa Timur 60155 </h6>
                        </div> --}}
          <div>
            <h6>Waktu Pelaksanaan : {{$penilaian->mulai}} s/d {{$penilaian->selesai}}</h6>
          </div>
          <div>
            <h6>Nama Pembimbing : {{$penilaian->pembimbing}}</h6>
          </div> <br>


          <div class="table-responsive">


            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">AKTIVITAS YANG DINILAI</th>
                  <th scope="col">NILAI</th>

                </tr>
              </thead>
              <tbody>

                <tr>
                  <th scope="row">1</th>
                  <td>Kerjasama</td>
                  <td>{{$penilaian->kerjasama}}</td>

                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Motivasi</td>
                  <td>{{$penilaian->motivasi}}</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Inisiatif Kerja</td>
                  <td>{{$penilaian->InisiatifKerja}}</td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Loyalitas</td>
                  <td>{{$penilaian->Loyalitas}}</td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>Etika</td>
                  <td>{{$penilaian->etika}}</td>
                </tr>
                <tr>
                  <th scope="row">6</th>
                  <td>Disiplin</td>
                  <td>{{$penilaian->disiplin}}</td>
                </tr>
                <tr>
                  <th scope="row">7</th>
                  <td>Percaya Diri</td>
                  <td>{{$penilaian->PercayaDiri}}</td>
                </tr>
                <tr>
                  <th scope="row">8</th>
                  <td>Tanggung Jawab Kerja</td>
                  <td>{{$penilaian->TanggungJawab}}</td>
                </tr>
                <tr>
                  <th scope="row">9</th>
                  <td>kemampuan dan pemahaman kerja</td>
                  <td>{{$penilaian->PemahamanKemampuan}}</td>
                </tr>
                <tr>
                  <th scope="row">10</th>
                  <td>kesehatan dan keselamatan kerja</td>
                  <td>{{$penilaian->KesehatanKeselamatanKerja}}</td>
                </tr>
                <tr>
                  <td colspan="2" class="text-center">RATA-RATA</td>
                  <td>{{$penilaian->average}}</td>
                </tr>
                <tr>
                  <td colspan="2" class="text-center">NILAI HURUF</td>
                  <td>{{$penilaian->nilai_huruf}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>


        @endforeach
      </div>

    </div>
    <!-- /.container-fluid -->


  </div>
</div>

@endsection