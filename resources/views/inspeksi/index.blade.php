@extends('layouts.app')
@section('heading','Inspeksi')
@section('content')
<section class="row">
    <div class="card shadow">
      <div class="card-body">
        <a href="{{ route('inspeksi.create') }}" class="btn btn-primary mb-3">Data Baru</a>
        <button href="{{ route('inspeksi.create') }}" class="btn btn-success mb-3">Unduh Data</button>
        <table class="table table-striped w-100 table-sm" id="datatable">
            <thead>
                <tr>
                    <th colspan=2>Nomor</th>
                    <th rowspan="3">Tanggal</th>
                    <th rowspan="3">Nama Jenis</th>
                    <th rowspan="3">Suku</th>
                    <th colspan=9>Kegiatan</th>
                    <th rowspan="3">Keterangan</th>
                    <th rowspan="3">Pelaksana</th>

                </tr>
                <tr>
                    <th rowspan="2">Urut</th>
                    <th rowspan="2">Koleksi</th>
                    <th rowspan="2">Identifikasi Koleksi</th>
                    <th rowspan="2">Kondisi Koleksi</th>
                    <th colspan="2">Trapesium</th>
                    <th rowspan="2">Duplikasi No. Koleksi</th>
                    <th rowspan="2">Koleksi Serbuk</th>
                    <th colspan="2">Preparat</th>
                    <th rowspan="2">Kubus</th>
                </tr>
                <tr>
                    <th>Koleksi</th>
                    <th>Duplikat</th>
                    <th>Koleksi Sayatan</th>
                    <th>Koleksi Serat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inspeksis as $index => $inspeksi)

                        <td>
                            {{ $index+1 }}
                            </td>
                            <td>
                                {{ $inspeksi->tanaman->no_ketukan }}
                            </td>
                            <td>
                                {{ $inspeksi->created_at->format("d-m-Y") }}
                            </td>
                            <td>
                                {{ $inspeksi->tanaman->jenis }}
                            </td>
                            <td>
                                {{ $inspeksi->tanaman->famili }}
                            </td>
                            <td>
                                {{ $inspeksi->identifikasi_koleksi }}
                            </td>
                            <td>
                                {{ $inspeksi->kondisi_koleksi }}
                            </td>
                            <td>
                                {{ $inspeksi->trapesium_koleksi }}
                            </td>
                            <td>{{ $inspeksi->trapesium_koleksi }}</td>
                            <td>{{ $inspeksi->duplikasi_no_koleksi }}</td>
                            <td>{{ $inspeksi->koleksi_serbuk }}</td>
                            <td>{{ $inspeksi->preparat_koleksi_sayatan }}</td>
                            <td>{{ $inspeksi->preparat_koleksi_serat }}</td>
                            <td>{{ $inspeksi->kubus}}</td>
                            <td>{{ $inspeksi->keterangan}}</td>
                            <td>{{ $inspeksi->user->name}}</td>

                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</section>
@endsection
