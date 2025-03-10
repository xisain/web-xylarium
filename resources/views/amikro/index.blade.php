@extends('layouts.app')
@section('heading','Anatomi Mikroskopis')
@section('content')
<section class="row">
<div class="card shadow">
    <div class="card-body">
    <a href="{{ route('anatomi-mikroskopis.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <a href="{{ route('anatomi-mikroskopis.pdf') }}" class="btn btn-danger mb-3">Unduh PDF</a>
    <table class="table table-striped table-bordered w-100 table-sm" id="datatable">
        <thead>
            <tr>
                <th rowspan="2" colspan="2">Nomor</th>
                <th rowspan="3">Tanggal</th>
                <th rowspan="3">Nama Jenis</th>
                <th rowspan="3">Suku</th>
                <th colspan="9" class="text-center">Kegiatan Mikroskopis</th>
                <th rowspan="3">Keterangan</th>
                <th rowspan="3">Pelaksana</th>
                <th rowspan="3">Action</th>
            </tr>
            <tr>
                <th colspan="3" class="text-center">Preparat Sayatan</th>
                <th colspan="6" class="text-center">Preparat Serat</th>
            </tr>
            <tr>
                <th class="text-center">Urut</th>
                <th class="text-center">Koleksi</th>
                <th class="text-center">Tangen</th>
                <th class="text-center">Radial</th>
                <th class="text-center">Transversal</th>
                <th class="text-center">Panjang Serat</th>
                <th class="text-center">Diameter Serat</th>
                <th class="text-center">Diameter Lumen</th>
                <th class="text-center">Tebal Dinding Serat</th>
                <th class="text-center">Diameter Pembuluh</th>
                <th class="text-center">Panjang Pembuluh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($amikro as $index => $amikros)
            <tr>

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
                    <form id="delete-form-{{ $amikros->id }}" action="{{ route('anatomi-mikroskopis.destroy', $amikros->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $amikros->id }})">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</section>
@endsection
