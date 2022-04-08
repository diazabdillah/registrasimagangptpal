<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT.PAL</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>



    <div class="card-body">
    
            <div style="margin-bottom:20px;margin-top:-20px;">
                <img class="ml-4" src="{{ public_path('img/bumn.png') }}" alt="image" style="width: 130px;">
                <img src="{{ public_path('img/logo_pal.png') }}" alt="Card image cap"
                    style="width: 130px;margin-left:500px;">
            </div>
            <div class="text-center">

                <h4 style="font-family:Lucida Sans;"><b><u>SURAT PERIZINAN BARANG </u></b></h4>

                <h6 style="font-family:Lucida Sans;">Nomor :
                    PKL/{{ $mahasiswa[0]->id }}/44200/{{ date('F', strtotime(now())) }}/{{ date('Y', strtotime(now())) }}
                </h6>
                </b>

            </div>
            <div class="justify-content-center ml-4" style="margin-top: 30px">

                <p>Yang mengetahui dibawah ini:</p>
            </div>
            <div class="justify-content-center ml-4">

                <p style="margin-top: 30px">Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : I Dewa Gede Adi
                    S Y</p>
                <p style="margin-top: -10px">Jabatan &nbsp;&nbsp; : Kepala Departemen Human Capital
                    Development</p>
            </div>
    
        
        <div class="justify-content-center ml-4">

            <p style="margin-top: 30px">Menerangkan bahwa para Praktikan dari {{ $mahasiswa[0]->univ }} melaksanakan
                Praktik Kerja
                Lapangan (PKL) di Divisi {{ $mahasiswa[0]->divisi }}, atas nama :</p>

        </div>
        <div class="justify-content-center ml-4" style="margin-top: 30px">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Asal Kampus</th>
                        <th>Nama Barang</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $surat)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $surat->nama }}</td>
                            <td>{{ $surat->univ }}</td>
                            <td>{{ $surat->nama_barang }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="ml-2">Bahwa nama tersebut di atas membawa barang pribadi masuk ke
                lingkungan PT. PAL Indonesia (Persero) untuk dipergunakan sebagai persyaratan selama
                Praktik Kerja Lapangan (PKL) pada tanggal {{ date('d F Y', strtotime($mahasiswa[0]->mulai)) }} s/d
                {{ date('d F Y', strtotime($mahasiswa[0]->selesai)) }} di Divisi {{ $mahasiswa[0]->divisi }}.</p>
        </div>
        <div class="justify-content-center ml-4">

            <p style="margin-top: 30px">Demikian surat keterangan dibuat dengan sesungguhnya, untuk
                dipergunakan sebagaimana mestinya.
        </div>
        <div style="font-size: 16px;">
            <p style="margin-left:600px;">Surabaya,
                {{ date('d-F-Y', strtotime(now())) }} </p>
            <p style="margin-top: -20px;margin-left:600px;"> PT PAL Indonesia (Persero)</p>

            <img style="margin-left:600px; width:20%;"  src="{{ public_path('frontend/img/TTD-KADEP-HCD.png')}}">
                                        
        </div>
    </div>

</body>

</html>
