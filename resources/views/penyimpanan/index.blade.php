@extends('layouts.app')
@section('heading', 'Penyimpanan')
@section('content')
<section class="row">
    <div class="card shadow">
        <div class="card-body">
            <a href="{{ route('penyimpanan.create') }}" class="btn btn-primary mb-3">Tambah data</a>
            <a href="{{ route('penyimpanan.export') }}" class="btn btn-success mb-3">Unduh data</a>
            <table class="table table-striped table-bordered w-100 table-sm" id="datatable">
                <thead>
                    <tr>
                        <th colspan="2"class="text-center">Nomor</th>
                        <th rowspan="4"class="text-center">Nama Jenis</th>
                        <th rowspan="4"class="text-center">Suku</th>
                        <th colspan="12" class="text-center">Kegiatan</th>
                        <th rowspan="4"class="text-center">Keterangan</th>
                        <th rowspan="4"class="text-center">Pelaksana</th>
                    </tr>
                    <tr>
                        <th rowspan="3"class="text-center">Urut</th>
                        <th rowspan="3"class="text-center">Koleksi</th>
                        <th colspan="8"class="text-center">Koleksi</th>
                        <th colspan="4"class="text-center">Duplikat</th>
                    </tr>
                    <tr>
                        <th rowspan="2"class="text-center">Trapesium</th>
                        <th rowspan="2"class="text-center">Utuh</th>
                        <th rowspan="2"class="text-center">Dekat Kulit</th>
                        <th rowspan="2"class="text-center">Potongan</th>
                        <th colspan="2"class="text-center">Preparat</th>
                        <th rowspan="2"class="text-center">Kubus</th>
                        <th rowspan="2"class="text-center">Serbuk</th>
                        <th rowspan="2"class="text-center">Trapesium</th>
                        <th rowspan="2"class="text-center">Utuh</th>
                        <th rowspan="2"class="text-center">Dekat Kulit</th>
                        <th rowspan="2"class="text-center">Potongan</th>
                    </tr>
                    <tr>
                        <th class="text-center">Sayatan</th>
                        <th class="text-center">Serat</th>
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
