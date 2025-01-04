@extends('layouts.app')
@section('heading', 'Anatomi Makroskopis')
@section('content')
<section class="row">
    <div class="card shadow">
        <div class="card-body">
            <a href="{{ route('anatomi-makroskopis.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-striped table-bordered w-100 table-sm" id="datatable">
        <thead>
            <tr>
                <th class="text-center"colspan="2">Nomor</th>
                <th class="text-center"rowspan="2">Tanggal</th>
                <th class="text-center"rowspan="2">Nama Jenis</th>
                <th class="text-center"rowspan="2">Suku </th>
                <th class="text-center"colspan="3">Trapesium</th>
                <th class="text-center"rowspan="2">Keterangan</th>
                <th class="text-center"rowspan="2">Pelaksana</th>
                <th class="text-center"rowspan="2">Action</th>
            </tr>
            <tr>
                <th class="text-center">Nomor Urut</th>
                <th class="text-center">Nomor Koleksi</th>
                <th class="text-center">Tangen</th>
                <th class="text-center">Radial</th>
                <th class="text-center">Transversal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($amakro as $index => $makro)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $makro->tanaman->no_ketukan }}</td>
                    <td>{{ $makro->created_at->format('d-m-Y') }}</td>
                    <td>{{ $makro->tanaman->jenis }}</td>
                    <td>{{ $makro->tanaman->famili }}</td>
                    <td>
                       @if ($makro->tangen_images)
                       @foreach(json_decode($makro->tangen_images) as $img_index =>$image)
                       <img src="{{ asset('storage/' . $image) }}" alt="{{ $makro->tanaman->jenis ." ".$img_index+1 }}" width="100">
                       <hr>
                   @endforeach
                       @else
                           <p>No Images</p>
                       @endif


                    </td>
                    <td>
                        @foreach(json_decode($makro->radial_images) as $img_index =>$image)
                        <img src="{{ asset('storage/' . $image) }}" alt="{{ $makro->tanaman->jenis ." ".$img_index+1 }}" width="100">
                        <hr>
                    @endforeach
                    </td>
                    <td>
                        @foreach(json_decode($makro->transversal_images) as $img_index =>$image)
                        <img src="{{ asset('storage/' . $image) }}" alt="{{ $makro->tanaman->jenis ." ".$img_index+1 }}" width="100">
                        <hr>
                    @endforeach
                    </td>
                    <td>{{ $makro->keterangan }}</td>
                    <td>{{ $makro->user->name }}</td>
                    <td><form id="delete-form-{{ $makro->id }}" action="{{ route('anatomi-makroskopis.destroy', $makro->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $makro->id }})">Delete</button>
                    </form></td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</section>
@endsection
