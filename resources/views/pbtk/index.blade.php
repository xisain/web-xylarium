@extends('layouts.app')
@section('heading', 'PEMBUATAN BAHAN TRAPESIUM KOLEKSI XYLARIUM')
@section('content')
<section class="row">
    <div class="card shadow">
        <div class="card-header">

        </div>
        <div class="card-body">

            <a href="{{ route('pbtk.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
            <table class="table table-striped table-bordered w-100 table-sm" id="datatable">
                <thead>
                    <tr>
                        <th colspan="2" class="text-center">Nomor</th>
                        <th rowspan="3">Tanggal</th>
                        <th rowspan="3">Nama Jenis</th>
                        <th rowspan="3">Suku</th>
                        <th colspan="5" class="text-center">Kegiatan</th>
                        <th rowspan="3">Jumlah</th>
                        <th rowspan="3">Keterangan</th>
                        <th rowspan="3">Pelaksana</th>
                        <th rowspan="3">Action</th>
                    </tr>
                    <tr>
                        <th rowspan="2">Urut</th>
                        <th rowspan="2">Koleksi</th>
                        <th colspan="2" class=text-center>Gergaji</th>
                        <th colspan="2" class="text-center">Hamplas</th>
                        <th rowspan="2" class="text-center">Kubus</th>
                    </tr>
                    <tr>
                        <th>Trapesium</th>
                        <th>Utuh</th>
                        <th>Trapesium</th>
                        <th>Utuh</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($pbtks as $index => $pbtk )
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $pbtk->tanaman->no_ketukan }}</td>
                            <td>{{ $pbtk->tanggal }}</td>
                            <td>{{ $pbtk->tanaman->jenis }}</td>
                            <td>{{ $pbtk->tanaman->famili }}</td>
                            <td>{{ $pbtk->kegiatan_gergaji_trapesium }}</td>
                            <td>{{ $pbtk->kegiatan_gergaji_utuh }}</td>
                            <td>{{ $pbtk->kegiatan_hamplas_trapesium }}</td>
                            <td>{{ $pbtk->kegiatan_gergaji_trapesium }}</td>
                            <td>{{ $pbtk->kegiatan_kubus }}</td>
                            <td>{{ $pbtk->jumlah_potongan }}</td>
                            <td>{{ $pbtk->keterangan ? $pbtk->keterangan:'Kosong' }}</td>
                            <td>{{ $pbtk->user->name }}</td>
                            <td><form id="delete-form-{{ $pbtk->id }}" action="{{ route('pbtk.destroy', $pbtk->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $pbtk->id }})">Delete</button>
                            </form></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
