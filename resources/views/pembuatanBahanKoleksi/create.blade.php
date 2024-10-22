@extends('layouts.app')
@section('content')
 <div class="container">
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('pembuatan-bahan-koleksi.store') }}" method="post">
        @csrf
        <a href="{{ route('pembuatan-bahan-koleksi.index') }}" class="btn btn-danger">Kembali Ke Index</a>
        <button type="reset" class="btn btn-warning">Reset Form</button>
        <h2>Pembuatan Bahan Koleksi Xylarium </h2>
        <div class="form-group mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control">
        </div>
       <div class="row">    
        <div class="form-control col-sm">
            <div class="form-group mb-3">
                <label for="tanaman_id" class="form-label">Nomor Koleksi</label>
                <div class="border rounded p-2">
                    <select id="tanaman_id" name="tanaman_id" class="form-control">
                        <option value="">Pilih Koleksi</option>
                        @foreach($tanaman as $item)
                            <option value=" {{ $item->id }}" 
                                data-id-penomoran="{{ $item->id }}"
                                data-nama-tanaman="{{ $item->jenis }}"
                                data-suku="{{ $item->famili }}"
                                data-habitus=""
                                data-lokasi="{{ $item->lokasi }}"
                                >{{ $item->no_ketukan }}. {{ $item->jenis }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="nomor_koleksi" class="form-label">Nomor Koleksi</label>
                <input type="text" name="nomor_koleksi" id="nomor_koleksi" class="form-control" disabled>
               </div>
            <div class="form-group mb-3">
             <label for="nama_tanaman" class="form-label">Nama Tanaman</label>
             <input type="text" name="nama_tanaman" id="nama_tanaman" class="form-control" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="suku" class="form-label">Suku</label>
                <input type="text" name="suku" id="suku" class="form-control" disabled>
    
            </div>
            <div class="form-group mb-3">
                <label for="habitus" class="form-label">Lokasi</label>
                <input type="text" name="habitus" id="habitus" class="form-control" disabled>
            </div>
        </div>
        <div class="border rounded p-2 col-sm">
            <div class="form-group mb-3 border rounded p-2">
                <h3 class="text-center">Kegiatan</h3>
                <div class="row">
                    <div class="col-md-6">
                        <label for="kegiatan_gergaji" class="form-label">Gergaji</label>
                        <input type="number" name="kegiatan_gergaji" id="kegiatan_gergaji" class="form-control-sm form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="kegiatan_hamplas" class="form-label">Hamplas</label>
                        <input type="number" name="kegiatan_hamplas" id="kegiatan_hamplas" class="form-control-sm form-control">
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            </div>
        </div>
       </div>
        

        <div class="form-group mb-3">
            <label for="jumlah_potongan">Jumlah Potongan</label>
            <input type="number" name="jumlah_potongan" id="jumlah_potongan" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary mb-3 form-control" type="submit">Submit</button>
    </form>
    </div> 
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script>
        
        document.addEventListener('DOMContentLoaded', function(){
        $('#tanaman_id').select2({
            placeholder: 'Pilih Koleksi',
            allowClear: true,
        });
        
        $('#tanaman_id').on('select2:select', function(e){
            const data = e.params.data.element.dataset;
            console.log(data)
            document.getElementById('nomor_koleksi').value=data.idPenomoran
            document.getElementById('nama_tanaman').value = data.namaTanaman;
            document.getElementById('suku').value = data.suku;
            document.getElementById('habitus').value = data.lokasi;
            document.getElementById('tempat_asal').value = data.lokasi;
            
        });
    });
    </script>  
@endsection