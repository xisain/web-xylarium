@extends('layouts.app')
@section('heading', 'Pemeliharaan')
@section('content')
<section class="row">
    <div class="card shadow">
        <div class="card-body">
            <a href="{{ route('pemeliharaan.create') }}" class="btn btn-primary mb-4">Data Baru</a>
            <table class="table table-striped table-bordered w-100 table-sm" id="datatable">
                <thead>
                    <tr>
                        <th colspan="2">Nomor</th>
                        <th rowspan="2">Nama Jenis</th>
                        <th rowspan="2">Suku</th>
                        <th colspan="5" class="text-center">Tanggal Pelaksanaan</th>
                        <th rowspan="2">Keterangan</th>
                        <th rowspan="2">Pelaksana</th>

                    </tr>
                    <tr>
                        <th>Urut</th>
                        <th>Koleksi</th>
                        <th>Pengeringan</th>
                        <th>Pendinginan</th>
                        <th>Pest Control</th>
                        <th>Vacuum</th>
                        <th>Fumigasi</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($pemeliharaans as $index => $p)
                   <tr>
                       <td>{{ $index+1 }}</td>
                       <td>{{ $p->tanaman->no_ketukan }}</td>
                       <td>{{ $p->tanaman->jenis }}</td>
                       <td>{{ $p->tanaman->famili }}</td>
                       <td>{{ $p->pengeringan->tanggal_masuk .' s.d. '.  $p->pengeringan->tanggal_keluar}}</td>
                       <td>{{ $p->pendinginan->tanggal_masuk .' s.d. '.  $p->pendinginan->tanggal_keluar}}</td>
                       <td>{{ $p->tanggal_pest_control }}</td>
                       <td>{{ $p->tanggal_vacuum }}</td>
                       <td>{{ $p->tanggal_fumigasi }}</td>
                       <td>{{ $p->keterangan }}</td>
                       <td>{{ $p->user->name }}</td>
                    </tr>
                       @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>


@endsection
