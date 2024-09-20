@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif
        <form action="{{ route('pola-trapesium.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="tangal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>
            <div class="row">
                <div class="form-control col-sm ml-2 ">
                    <h3>Koleksi</h3>
                    <select name="tanaman_id" id="tanaman_id" class="form-select mb-3">    
                        <option value="">pilih koleksi</option>
                        @foreach ($tanamans as $tanaman)
                        <option value="{{ $tanaman->id }}" 
                            data-id-penomoran="{{ $tanaman->no_ketukan }}"
                            data-nama-tanaman="{{ $tanaman->jenis }}"
                            data-suku="{{ $tanaman->famili }}"
                            data-habitus=""
                            data-lokasi="{{ $tanaman->lokasi }}"
                            >{{ $tanaman->no_ketukan }}.{{ $tanaman->jenis }}
                        </option>
                        @endforeach
                    </select>
                    <div class="form-group mb-3">
                        <input type="hidden" id="penomoran_koleksi_id" name="penomoran_koleksi_id">
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
                        <label for="habitus" class="form-label">Habitus</label>
                        <input type="text" name="habitus" id="habitus" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-control col-sm">
                    <h3>Terpola</h3>
                    <div class="row">
                        <div class="form-group col-sm ">
                            <label for="terpola_trapesium" class="form-label">Trapesium</label>
                            <input type="text" name="terpola_trapesium" id="terpola_trapesium" class="form-control">
                        </div>
                        <div class="form-group col-sm mt-2">
                            <label for="terpola_kubus">Kubus</label>
                            <input type="text" name="terpola_kubus" id="terpola_kubus" class="form-control">
                        </div>
                        <div class="form-group col-sm mt-2">
                            <label for="terpola_utuh">Utuh</label>
                            <input type="text" name="terpola_utuh" id="terpola_utuh" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="terpola_jumlah">jumlah</label>
                            <input type="number" name="terpola_jumlah" id="terpola_jumlah" class="form-control">
                        </div>
                        
                    </div>
    
                </div>
            </div>
            <div class="form-control mt-3">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-primary mt-4 form-control">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap-5-theme@1.3.2/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
            document.getElementById('penomoran_koleksi_id').value=data.idPenomoran
            document.getElementById('nama_tanaman').value = data.namaTanaman;
            document.getElementById('suku').value = data.suku;
            document.getElementById('habitus').value = data.habitus;
            
        });
    });
    </script>
@endsection