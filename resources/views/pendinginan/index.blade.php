@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h4>Pendinginan</h4>
        <a href="{{ route('pendinginan.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2">Nomor</th>
                    <th rowspan="2">Jenis</th>
                    <th rowspan="2">Suku</th>
                    <th rowspan="2">Habitus</th>
                    <th rowspan="2">Tempat Asal</th>
                    <th colspan="3">Xylarium</th>
                    <th colspan="2">Tanggal Perlakuan Pendinginan</th>
                    <th rowspan="2">Keterangan</th>
                    <th rowspan="2">Action</th>
                </tr>
                <tr>
                    <th> Urut</th>
                    <th>Koleksi</th>
                    <th>Bahan</th>
                    <th>Koleksi</th>
                    <th>Duplikat</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendinginans as $index => $pendinginan)
                    <tr>
                        <td>
                            {{ $index + 1 }}
                        </td>
                        <td>{{ $pendinginan->tanaman->no_ketukan }}</td>
                        <td>{{ $pendinginan->tanaman->jenis }}</td>
                        <td>{{ $pendinginan->tanaman->famili }}</td>
                        <td>{{ $pendinginan->tanaman->lokasi }}</td>
                        <td>{{ $pendinginan->tanaman->lokasi }}</td>
                        <td>{{ $pendinginan->xylarium_bahan }}</td>
                        <td>{{ $pendinginan->xylarium_koleksi }}</td>
                        <td>{{ $pendinginan->xylarium_duplikat }}</td>
                        <td>{{ $pendinginan->tanggal_masuk}}</td>
                        <td>{{ $pendinginan->tanggal_keluar}}</td>
                        <td>{{ $pendinginan->keterangan }}</td>
                        <td>Action</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection