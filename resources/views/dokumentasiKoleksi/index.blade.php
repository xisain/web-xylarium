@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Dokumentasi Koleksi</h3>
        <a href="{{ route('dokumentasi-koleksi.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
        <a href="{{ route('dokumentasi-koleksi.export') }}" class="btn btn-success mb-3">Unduh Data</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2">Nomor</th>
                    <th rowspan="2">Tanggal</th>
                    <th rowspan="2">Nama Tanaman</th>
                    <th rowspan="2">Suku</th>
                    <th rowspan="2">Tempat Asal</th>
                    <th colspan="2" class="text-center">Foto</th>
                    <th rowspan="2">Pelaksana</th>
                    <th rowspan="2">Keterangan</th>
                </tr>
                <tr>
                    <th>No Urut</th>
                    <th>No Koleksi</th>
                    <th>Pola</th>
                    <th>Trapesium</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokumentasiKoleksi as $index => $koleksi)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $koleksi->tanaman->no_ketukan }}</td>
                        <td>{{ $koleksi->created_at->format('d-m-Y') }}</td>
                        <td>{{ $koleksi->tanaman->jenis }}</td>
                        <td>{{ $koleksi->tanaman->famili }}</td>
                        <td>{{ $koleksi->tanaman->lokasi }}</td>
                        <td>
                            @if ($koleksi->foto_pola)
                                <img src="{{ asset('storage/' .json_decode($koleksi->foto_pola)) }}" alt="{{ $koleksi->tanaman->jenis }} Pola Foto" style="width: 100px; height: auto;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            @if ($koleksi->foto_trapesium)
                                <img src="{{ asset('storage/' . json_decode($koleksi->foto_trapesium)) }}" alt="{{ $koleksi->tanaman->jenis }} Trapesium Foto" style="width: 100px; height: auto;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="text-center">{{ $koleksi->user->name ?? 'N/A' }}</td>
                        <td>{{ $koleksi->keterangan}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
