@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>
            Pola Trapesium Xylarium
        </h2>
        <a href="{{ route('pola-trapesium.create') }}" class="btn btn-primary mb-3">Tambahkan Data</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="2" class="text-center" style="100px">Nomor</th>
                    <th rowspan="2" class="text-center">Tanggal</th>
                    <th rowspan="2" class="text-center">Nama Jenis</th>
                    <th rowspan="2"class="text-center">Suku</th>
                    <th colspan="4" class="text-center" style="width:100px">Terpola</th>
                    <th rowspan="2" class="text-center">Keterangan</th>
                    <th rowspan="2" class="text-center">Action</th>
                </tr>
                <tr>
                    <th style="width:100px">No Urut</th>
                    <th style="width:100px">No Koleksi</th>
                    <th style="width:100px">Trapesium</th>
                    <th style="width:100px">Utuh</th>
                    <th style="width:100px">Kubus</th>
                    <th style="width:100px">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($polatrapesium as $index => $pola)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $pola->tanaman->no_ketukan }}</td>
                        <td>{{ $pola->tanggal }}</td>
                        <td>{{ $pola->tanaman->jenis }}</td>
                        <td>{{ $pola->tanaman->famili }}</td>
                        <td>{{ $pola->terpola_trapesium }}</td>
                        <td>{{ $pola->terpola_utuh  }}</td>
                        <td>{{ $pola->terpola_kubus }}</td>
                        <td>{{ $pola->terpola_jumlah }}</td>
                        <td>{{ $pola->keterangan }}</td>
                        <td>
                            <form id="delete-form-{{ $pola->id }}" action="{{ route('pola-trapesium.destroy', $pola->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $pola->id }})">Delete</button>
                            </form>
                        </td>

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
