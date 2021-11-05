<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">

                    <div class="table-responsive">
                        <div class="scroll">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Universitas</th>
                                        <th>Strata</th>
                                        <th>No Hp</th>
                                        <th>Divisi</th>
                                        <th>Departemen</th>
                                        <th>Status</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $i = 0;
                                    ?>

                                    @foreach ($users as $rekap)
                                    @if ($rekap->role_id != 1)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$rekap->nama}}</td>
                                        <td>{{$rekap->univ}}</td>
                                        <td>{{$rekap->strata}}</td>
                                        <td>{{$rekap->no_hp}}</td>
                                        <td>{{$rekap->divisi}}</td>
                                        <td>{{$rekap->departemen}}</td>
                                        <td>
                                            @if ($rekap->role_id == 3)
                                            <span class="badge badge-success p-1">{{ $rekap->role_id }}</span>
                                            @elseif($rekap->role_id !=3)
                                            <span class="badge badge-danger p-1">{{ $rekap->role_id }}</span>
                                            @endif
                                        </td>
                                        <td>{{$rekap->created_at}}</td>
                                        <td>{{$rekap->mulai}}</td>
                                        <td>{{$rekap->selesai}}</td>

                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->
    </div>


</div>
<!-- End of Main Content -->
