{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')


<div class="container-fluid">

    <div class="row">
        <div class="col-lg">


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kuota Magang/Penelitian</h6>
                </div>
                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal Buka</th>
                                    <th scope="col">Tanggal Tutup</th>
                                    <th scope="col">Divisi</th>
                                    <th scope="col">Jenis Kuota</th>   
                                   <th scope="col">Kuota TW 1</th>
                                   <th scope="col">Kuota TW 2</th>
                                   <th scope="col">Kuota TW 3</th>
                                   <th scope="col">Kuota TW 4</th>
                                   <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $kuota)

                                <tr>
                                    <td>1</td>
                                    <td>{{ $kuota->tanggal_buka }}</td>
                                    <td>{{ $kuota->tanggal_tutup }}</td>
                                
                                    <td>{{ $kuota->divisi }}</td>
                                    <td>{{ $kuota->jenis_kuota }}</td>
                                    <td>{{$kuota->tw1}}</td>
                                    <td>{{$kuota->tw2}}</td>
                                    <td>{{$kuota->tw3}}</td>
                                    <td>{{$kuota->tw4}}</td>
                                    <td>
                                        @if(Auth::user()->id == $kuota->user_id)
                                        <a class="btn btn-warning p-1" href="/edit-kuota/{{ $kuota->id }}"
                                            role="button">Edit</a>
                                        <a class="btn btn-danger p-1" href="/hapus-kuota/{{$kuota->id}}" role="button">Hapus</a>
                                        @endif
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->


    </div>
</div>
<!-- End of Main Content -->
@endsection
