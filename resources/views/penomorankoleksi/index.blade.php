@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<div class="container">
    <h1 class="mt-5"> Penomoran Koleksi</h1>
    <a href="{{ route('penomorankoleksi.create') }}" class="btn btn-success mb-3">Penomoran Baru</a>
    <a href="{{ route('penomoran.export') }}" class="btn btn-primary mb-3">Export Data</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Jenis</th>
                <th>Suku</th>
                <th>Tempat Asal</th>
                <th>Nomor Koleksi</th>
                <th>Keterangan</th>
                <th>author</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penomoran as $penomoranItem)
            <tr>
                <td>{{ $penomoranItem->id }}</td>
                <td>{{ $penomoranItem->date }}</td>
                <td>{{ $penomoranItem->penerimaan->nama_tanaman ?? 'N/A' }}</td>
                <td>{{ $penomoranItem->penerimaan->suku ?? 'N/A' }}</td>
                <td>{{ $penomoranItem->penerimaan->tempat_asal ?? 'N/A' }}</td>
                <td>{{ $penomoranItem->nomor_koleksi }}</td>
                <td>{{ $penomoranItem->keterangan }}</td>
                <td>{{ $penomoranItem->user->name }}</td>
                <td>
                <form id="delete-form-{{ $penomoranItem->id }}" action="{{ route('penomorankoleksi.destroy', $penomoranItem->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('penomorankoleksi.edit', $penomoranItem->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $penomoranItem->id }})">Delete</button>
                </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
