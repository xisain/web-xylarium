<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <!-- DataTables Bootstrap Integration CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container-fluid">
        <h1>Daftar Tanaman</h1>
        <a href="{{ route('tanaman.create') }}" class="btn btn-primary">Tambah Tanaman</a>
        <table id="tanamanTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>No Ketukan</th>
                    <th>Jenis</th>
                    <th>Synonime</th>
                    <th>Famili</th>
                    <th>Nomor Vak</th>
                    <th>Nama Lokal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tanamans as $tanaman)
                    <tr>
                        <td>{{ $tanaman->no_ketukan }}</td>
                        <td>{{ $tanaman->jenis }}</td>
                        <td>{{ $tanaman->synonime }}</td>
                        <td>{{ $tanaman->famili }}</td>
                        <td>{{ $tanaman->nomor_vak }}</td>
                        <td>{{ $tanaman->nama_lokal }}</td>
                        <td>{{ $tanaman->keterangan }}</td>
                        <td>
                            <a href="{{ route('tanaman.show', $tanaman->id) }}" class="btn btn-primary">Show</a>
                            <a href="{{ route('tanaman.edit', $tanaman->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('tanaman.destroy', $tanaman->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Data Tanaman belum tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            new DataTable('#tanamanTable',{
                responsive:true,
                rowReorder:{
                    selector:'td:nth-child(2)'
                }
            })
        

            // Toastr messages
            @if(session()->has('success'))
                toastr.success('{{ session('success') }}', 'BERHASIL!');
            @elseif(session()->has('error'))
                toastr.error('{{ session('error') }}', 'GAGAL!');
            @endif
        });
    </script>
</body>
</html>
