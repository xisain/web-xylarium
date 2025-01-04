@extends('layouts.app')
@section('content')
<section class="row">
    <div class="card shadow">
        <div class="card-body">


            <h3>Tersimpan</h3>
            <a href="{{ route('penyimpanan.create') }}" class="btn btn-primary mb-3">Tambah data</a>
            <table class="table table-striped table-bordered w-100 table-sm" id="datatable">
                <thead>
                    <tr>
                        <th colspan="2">Nomor</th>
                        <th rowspan="4">Nama Jenis</th>
                        <th rowspan="4">Suku</th>
                        <th colspan="12">Kegiatan</th>
                        <th rowspan="4">Keterangan</th>
                        <th rowspan="4">Pelaksana</th>
                    </tr>
                    <tr>
                        <th rowspan="3">Urut</th>
                        <th rowspan="3">Koleksi</th>
                        <th colspan="8">Koleksi</th>
                        <th colspan="4">Duplikat</th>
                    </tr>
                    <tr>
                        <th rowspan="2">Trapesium</th>
                        <th rowspan="2">Utuh</th>
                        <th rowspan="2">Dekat Kulit</th>
                        <th rowspan="2">Potongan</th>
                        <th colspan="2">Preparat</th>
                        <th rowspan="2">Kubus</th>
                        <th rowspan="2">Serbuk</th>
                        <th rowspan="2">Trapesium</th>
                        <th rowspan="2">Utuh</th>
                        <th rowspan="2">Dekat Kulit</th>
                        <th rowspan="2">Potongan</th>
                    </tr>
                    <tr>
                        <th>Sayatan</th>
                        <th>Serat</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($penyimpanans as $index => $penyimpanan )
                    <tr>
                        <td>
                            {{ $index+1 }}
                        </td>
                        <td>{{ $penyimpanan->tanaman->no_ketukan }}</td>
                        <td>{{ $penyimpanan->tanaman->jenis }}</td>
                        <td>{{ $penyimpanan->tanaman->famili }}</td>
                        <td>{{ $penyimpanan->tersimpan_koleksi_trapesium }}</td>
                        <td>{{ $penyimpanan->tersimpan_koleksi_utuh }}</td>
                        <td>{{ $penyimpanan->tersimpan_koleksi_dekatKulit }}</td>
                        <td>{{ $penyimpanan->tersimpan_koleksi_potongan }}</td>
                        <td>{{ $penyimpanan->tersimpan_koleksi_preparat_sayatan ? "✓":"✗" }}</td>
                        <td>{{ $penyimpanan->tersimpan_koleksi_preparat_serat ? "✓":"✗" }}</td>
                        <td>{{ $penyimpanan->tersimpan_koleksi_kubus }}</td>
                        <td>{{ $penyimpanan->tersimpan_koleksi_serbuk ? "✓":"✗" }}</td>
                        <td> {{ $penyimpanan->tersimpan_duplikat_trapesium }}</td>
                        <td> {{ $penyimpanan->tersimpan_duplikat_utuh }}</td>
                        <td> {{ $penyimpanan->tersimpan_duplikat_dekatKulit }}</td>
                        <td> {{ $penyimpanan->tersimpan_duplikat_potongan }}</td>
                        <td>{{ $penyimpanan->keterangan }}</td>
                        <td>{{ $penyimpanan->user->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
