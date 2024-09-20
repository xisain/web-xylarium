@extends('layouts.app')
@section('content')
    <div class="container-fluid px-5">
        <h3>Tabel Pemeliharaan</h3>
        <a href="{{ route('pemeliharaan.create') }}" class="btn btn-primary">Data Baru</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2">Nomor</th>
                    <th rowspan="2">Nama Jenis</th>
                    <th rowspan="2">Suku</th>
                    <th colspan="5" class="text-center">Tanggal Pelaksanaan</th>
                    <th rowspan="2">Keterangan</th>
                    <th rowspan="2">Pelaksana</th>

                </tr>
                <tr>
                    <th>Urut</th>
                    <th>Koleksi</th>
                    <th>Pengeringan</th>
                    <th>Pendinginan</th>
                    <th>Pest Control</th>
                    <th>Vacuum</th>
                    <th>Fumigasi</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($pemeliharaans as $index => $p)
               <tr>
                   <td>{{ $index+1 }}</td>
                   <td>{{ $p->tanaman->no_ketukan }}</td>
                   <td>{{ $p->tanaman->jenis }}</td>
                   <td>{{ $p->tanaman->famili }}</td>
                   <td>{{ $p->pengeringan->tanggal_masuk .' s.d. '.  $p->pengeringan->tanggal_keluar}}</td>
                   <td>{{ $p->pendinginan->tanggal_masuk .' s.d. '.  $p->pendinginan->tanggal_keluar}}</td>
                   <td>{{ $p->tanggal_pest_control }}</td>
                   <td>{{ $p->tanggal_vacuum }}</td>
                   <td>{{ $p->tanggal_fumigasi }}</td>
                   <td>{{ $p->keterangan }}</td>
                   <td>{{ $p->user->name }}</td>
                </tr>
                   @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(Session::has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ Session::get('success') }}"
        });
        @endif
    
        @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ Session::get('error') }}"
        });
        @endif
    </script>
    
@endsection