@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>PENGETOKAN NOMOR PADA TRAPESIUM KOLEKSI XYLARIUM </h3>
        <a href="{{ route('pnptk.create') }}" class="btn btn-primary mb-3">Data Baru</a>
        <a href="{{ route('pnptk.export') }}" class="btn btn-success mb-3">Unduh Data</a>
        {{-- Export --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2" class="text-center">Nomor</th>
                    <th rowspan="3"class="text-center">Nama Jenis</th>
                    <th rowspan="3"class="text-center">Suku</th>
                    <th colspan="7" class="text-center">Xylarium Terketok</th>
                    <th rowspan="3"class="text-center">Keterangan</th>
                    <th rowspan="3">Pelaksana</th>
                    <th rowspan="3"class="text-center">Action</th>

                </tr>
                <tr>
                    <th rowspan="2">Urut</th>
                    <th rowspan="2">Koleksi</th>
                    <th rowspan="2">Trapesium</th>
                    <th rowspan="2">Utuh</th>
                    <th rowspan="2">Dekat Kulit</th>
                    <th rowspan="2">Serbuk</th>
                    <th colspan="2" class="text-center">Preparat</th>
                    <th rowspan="2">Potongan</th>
                </tr>
                <tr>
                    <th>Sayatan</th>
                    <th>Serat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pnptks as $index => $pnptk)
                <tr>
                <td>{{ $index+1 }}</td>
                <td>{{$pnptk->tanaman->no_ketukan  }}</td>
                <td>{{ $pnptk->tanaman->jenis }}</td>
                <td>{{ $pnptk->tanaman->famili }}</td>
                <td>{{ $pnptk->xylarium_trapesium }}</td>
                <td>{{ $pnptk->xylarium_utuh }}</td>
                <td>{{ $pnptk->xylarium_dekatKulit }}</td>
                <td>{{ $pnptk->xylarium_serbuk }}</td>
                <td>{{ $pnptk->xylarium_prepat_sayatan }}</td>
                <td>{{ $pnptk->xylarium_prepat_serat }}</td>
                <td>{{ $pnptk->xylarium_potongan }}</td>
                <td>{{ $pnptk->keterangan }}</td>
                <td>{{ $pnptk->user->name }}</td>
                <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection