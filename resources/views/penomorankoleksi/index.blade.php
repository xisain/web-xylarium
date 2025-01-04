@extends('layouts.app')
@section('heading', "Penomoran Koleksi")

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<section class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('penomorankoleksi.create') }}" class="btn btn-success mb-3">Penomoran Baru</a>
                <a href="{{ route('penomoran.export') }}" class="btn btn-primary mb-3">Export Data</a>
                <table class="table table-striped table-bordered w-100 table-sm" id="datatable">
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
        </div>
    </div>
</section>
@endsection
