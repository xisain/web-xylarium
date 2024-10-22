@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Tabel Pembuatan Bahan Koleksi</h3>
        <a href="{{ route('pembuatan-bahan-koleksi.create') }}" class="btn btn-primary">Data Baru</a>
        <a href="{{ route('pembuatan-bahan-koleksi.export') }}" class="btn btn-success">Unduh Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nomor Koleksi</th>
                    <th>Tanggal</th>
                    <th>Nama Jenis</th>
                    <th>Suku</th>
                    <th>Lokasi</th>
                    <th>Kegiatan Gergaji</th>
                    <th>Kegiatan Hamplas</th>
                    <th>Jumlah Potongan</th>
                    <th>Keterangan</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pembuatanBahanKoleksi as $pbk)
                <tr>
                    <td>{{ $pbk->id }}</td>
                    <td>{{ $pbk->tanaman->no_ketukan }}</td>
                    <td>{{ $pbk->tanggal }}</td>
                    <td>{{ $pbk->tanaman->jenis }}</td>
                    <td>{{ $pbk->tanaman->famili }}</td>
                    <td>{{ $pbk->tanaman->lokasi }}</td>
                    <td>{{ $pbk->kegiatan_gergaji }} Keping</td>
                    <td>{{ $pbk->kegiatan_hamplas }} Keping</td>
                    <td>{{ $pbk->jumlah_potongan }}</td>
                    <td>{{ $pbk->keterangan }}</td>
                    <td>{{ $pbk->user->name}}</td>
                    <td><form action="{{ route('pembuatan-bahan-koleksi.destroy', $pbk->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('penerimaan.edit',$pbk->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
