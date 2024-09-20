@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

<div class="container my-5">
    <h1 class="mb-4">Perlakuan Pengovenan</h1>
    <form action="{{ route('pengeringan.store') }}" method="POST" class="border border-dark rounded p-4">
        @csrf

        <div class="form-group mb-3">
            <label for="tanaman_id" class="form-label">Nomor Koleksi</label>
            <div class="border border-dark rounder p-4 bg-white">
                <select id="tanaman_id" name="tanaman_id" class="form-select form-select-lg">
                    <option value="">Pilih Nomor Koleksi</option>
                    @foreach($tanaman as $tanaman)
                        <option value="{{ $tanaman->id }}" 
                            data-id-penomoran=""
                            data-nama-tanaman="{{ $tanaman->jenis }}"
                            data-suku="{{ $tanaman->famili }}"
                            data-habitus=""
                            data-lokasi="{{ $tanaman->lokasi }}"
                            >{{ $tanaman->no_ketukan }}. {{ $tanaman->jenis }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Fields to display related data -->
        <div class="form-group mb-3">
            <label for="nama_tanaman" class="form-label">Nama Tanaman</label>
            <input type="text" id="nama_tanaman" class="form-control border border-dark" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="suku" class="form-label">Suku</label>
            <input type="text" id="suku" class="form-control border border-dark" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="habitus" class="form-label">Habitus</label>
            <input type="text" id="habitus" class="form-control border border-dark" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="tempat_asal" class="form-label">Tempat Asal</label>
            <input type="text" id="tempat_asal" class="form-control border border-dark" disabled>
        </div>

        <!-- Tanggal Masuk, Tanggal Keluar, and Keterangan -->
        <div class="form-group mb-3">
            <h4 class="mb-3">Tanggal Perlakuan Pengovenan</h4>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                    <input type="date" class="form-control border border-dark bg-white" name="tanggal_masuk" id="tanggal_masuk">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                    <input type="date" class="form-control border border-dark bg-white" name="tanggal_keluar" id="tanggal_keluar">
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control bg-white" rows="3"></textarea>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function(){
        $('#tanaman_id').select2({
            placeholder: 'Pilih Koleksi',
            allowClear: true,
        });
        
        $('#tanaman_id').on('select2:select', function(e){
            const data = e.params.data.element.dataset;
            console.log(data)
            document.getElementById('nama_tanaman').value = data.namaTanaman;
            document.getElementById('suku').value = data.suku;
            document.getElementById('habitus').value = data.habitus;
            document.getElementById('tempat_asal').value = data.lokasi;
            const penomoran_koleksi_id = document.getElementById('penomoran_koleksi_id')
            penomoran_koleksi_id.value = data.idPenomoran
        });
    });
</script>
@endsection
