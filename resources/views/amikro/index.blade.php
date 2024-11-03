@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h2>Anatomi Mikroskopis</h2>
    <a href="{{ route('anatomi-mikroskopis.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="2" colspan="2">Nomor</th>
                <th rowspan="3">Tanggal</th>
                <th rowspan="3">Nama Jenis</th>
                <th rowspan="3">Suku</th>
                <th colspan="9">Kegiatan Mikroskopis</th>
                <th rowspan="3">Keterangan</th>
                <th rowspan="3">Pelaksana</th>
                <th rowspan="3">Action</th>
            </tr>
            <tr>
                <th colspan="3">Preparat Sayatan</th>
                <th colspan="6">Preparat Serat</th>
            </tr>
            <tr>
                <th>Urut</th>
                <th>Koleksi</th>
                <th>Tangen</th>
                <th>Radial</th>
                <th>Transversal</th>
                <th>Panjang Serat</th>
                <th>Diameter Serat</th>
                <th>Diameter Lumen</th>
                <th>Tebal Dinding Serat</th>
                <th>Diameter Pembuluh</th>
                <th>Panjang Pembuluh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($amikro as $index => $amikros)
                <td>
                    {{ $index+1 }}
                </td>
                <td>
                    {{ $amikros->tanaman->no_ketukan }}
                </td>
                <td>
                    {{ $amikros->created_at->format('d-m- Y') }}
                </td>
                <td>
                    {{ $amikros->tanaman->jenis }}
                </td>
                <td>
                    {{ $amikros->tanaman->famili }}
                </td>
                <td>
                   <img src="{{ 'storage/'.$amikros->kegiatan_sayatan_tangen }}" alt="{{ $amikros->tanaman->jenis . 'Tangen' }}" width="100">
                </td>
                <td>
                   <img src="{{ 'storage/'.$amikros->kegiatan_sayatan_radial }}" alt="{{ $amikros->tanaman->jenis . 'Radial' }}" width="100">
                </td>
                <td>
                   <img src="{{ 'storage/'.$amikros->kegiatan_sayatan_transversal }}" alt="{{ $amikros->tanaman->jenis . 'Tranversal' }}" width="100">
                </td>
                <td>
                   <img src="{{ 'storage/'.$amikros->kegiatan_serat_panjang }}" alt="{{ $amikros->tanaman->jenis . 'panjang' }}" width="100">
                </td>
                <td>
                   <img src="{{ 'storage/'.$amikros->kegiatan_serat_diameter }}" alt="{{ $amikros->tanaman->jenis . 'Diameter' }}" width="100">
                </td>
                <td>
                   <img src="{{ 'storage/'.$amikros->kegiatan_serat_diameterLumen }}" alt="{{ $amikros->tanaman->jenis . '' }}" width="100">
                </td>
                <td>
                   <img src="{{ 'storage/'.$amikros->kegiatan_serat_dindingSerat }}" alt="{{ $amikros->tanaman->jenis . '' }}" width="100">
                </td>
                <td>
                   <img src="{{ 'storage/'.$amikros->kegiatan_serat_diameterPembuluh }}" alt="{{ $amikros->tanaman->jenis . '' }}" width="100">
                </td>
                <td>
                   <img src="{{ 'storage/'.$amikros->kegiatan_serat_panjangPembuluh }}" alt="{{ $amikros->tanaman->jenis . '' }}" width="100">
                </td>
                <td>
                    {{ $amikros->keterangan }}
                </td>
                <td>
                    {{ $amikros->user->name }}
                </td>
                <td>
                   Action
                </td>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
