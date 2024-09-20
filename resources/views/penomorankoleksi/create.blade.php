@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<div class="container">
    <h1 class="mt-5">Create Penomoran Koleksi</h1>
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('penomorankoleksi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="date" name="date" required>
            @error('tanggal')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_jenis" class="form-label">Nama Jenis</label>
            <select class="form-control" id="nama_jenis" name="penerimaan_id" required>
                <option value="" selected disabled>Choose Nama Jenis</option>
                @foreach($penerimaan as $item)
                    <option value="{{ $item->id }}" data-suku="{{ $item->suku }}" data-tempat-asal="{{ $item->tempat_asal }}">
                        {{ $item->id }}. {{ $item->nama_tanaman }}
                    </option>
                @endforeach
            </select>
            @error('penerimaan_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="suku" class="form-label">Suku</label>
            <input type="text" class="form-control" id="suku" name="suku" disabled>
        </div>
        <div class="mb-3">
            <label for="tempat_asal" class="form-label">Tempat Asal</label>
            <input type="text" class="form-control" id="tempat_asal" name="tempat_asal" disabled>
        </div>
        <div class="mb-3">
            <label for="nomor_koleksi" class="form-label">Nomor Koleksi</label>
            <input type="text" class="form-control" id="nomor_koleksi" name="nomor_koleksi" value="{{ $paddedNomorKoleksi }}" required>
            @error('koleksi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
        </div>
        <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const namaJenisSelect = document.getElementById('nama_jenis');
        const sukuInput = document.getElementById('suku');
        const tempatAsalInput = document.getElementById('tempat_asal');

        namaJenisSelect.addEventListener('change', function() {
            const selectedOption = namaJenisSelect.options[namaJenisSelect.selectedIndex];
            sukuInput.value = selectedOption.getAttribute('data-suku');
            tempatAsalInput.value = selectedOption.getAttribute('data-tempat-asal');
        });
    });
</script>
@endsection
