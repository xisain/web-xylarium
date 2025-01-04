@extends('layouts.app')
@section('heading', 'Tanaman')
@section('content')
<section class="row">
   <div class="card shadow-sm">
    <div class="card-body">
        <a href="{{ route('tanaman.create') }}" class="btn btn-primary mb-4">Tambah Tanaman</a>
        <table id="datatable" class="table w-100 h-100 table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No Ketukan</th>
                    <th class="text-center">Jenis</th>
                    <th class="text-center">Synonime</th>
                    <th class="text-center">Famili</th>
                    <th class="text-center">Nomor Vak</th>
                    <th class="text-center">Nama Lokal</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Aksi</th>
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
   </div>
</section>
@endsection
