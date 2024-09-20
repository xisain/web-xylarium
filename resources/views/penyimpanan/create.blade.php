@extends('layouts.app')
@section('content')
<div class="container">
    @if ($errors->any())
       
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    
        @endif
    <form action="{{ route('penyimpanan.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <a href="{{ route('penyimpanan.index') }}" class="btn btn-warning">Kembali Ke Index</a>
        <button type="reset" class="btn btn-danger">Reset Form</button>

        <div class="row">
            <div class="form-control col-md col-sm m-2">
                <h3>Koleksi</h3>
                <select name="tanaman_id" id="tanaman_id" class="form-select mb-3">    
                    <option value="">Pilih koleksi</option>
                    @foreach ($tanamans as $tanaman)
                        <option value="{{ $tanaman->id }}" 
                            data-id-penomoran="{{ $tanaman->no_ketukan }}"
                            data-nama-tanaman="{{ $tanaman->jenis }}"
                            data-suku="{{ $tanaman->famili }}"
                            data-habitus=""
                            data-lokasi="{{ $tanaman->lokasi }}">
                            {{ $tanaman->no_ketukan }}.{{ $tanaman->jenis }}
                        </option>
                    @endforeach
                </select>

                <div class="form-group mb-3">
                    <label for="nomor_koleksi" class="form-label">Nomor Koleksi</label>
                    <input type="text" id="nomor_koleksi" class="form-control" disabled>
                </div>

                <div class="form-group mb-3">
                    <label for="nama_tanaman" class="form-label">Nama Tanaman</label>
                    <input type="text" id="nama_tanaman" class="form-control" disabled>
                </div>

                <div class="form-group mb-3">
                    <label for="suku" class="form-label">Suku</label>
                    <input type="text" id="suku" class="form-control" disabled>
                </div>

                <div class="form-group mb-3">
                    <label for="habitus" class="form-label">Habitus</label>
                    <input type="text" id="habitus" class="form-control" disabled>
                </div>
            </div>

            <div class="form-control col-md col-sm m-2">
                <h3>Kegiatan</h3>

                <div class="form-group mb-3">
                    <label for="tersimpan_koleksi_trapesium" class="form-label">Trapesium</label>
                    <input type="text" name="tersimpan_koleksi_trapesium" id="tersimpan_koleksi_trapesium" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="tersimpan_koleksi_utuh" class="form-label">Koleksi Utuh</label>
                    <input type="number" name="tersimpan_koleksi_utuh" id="tersimpan_koleksi_utuh" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="tersimpan_koleksi_dekatKulit" class="form-label">Koleksi Dekat Kulit</label>
                    <input type="number" name="tersimpan_koleksi_dekatKulit" id="tersimpan_koleksi_dekatKulit" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="tersimpan_koleksi_potongan" class="form-label">Koleksi Potongan</label>
                    <input type="number" name="tersimpan_koleksi_potongan" id="tersimpan_koleksi_potongan" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="tersimpan_koleksi_preparat_sayatan" class="form-label">Koleksi Preparat Sayatan</label>
                    <input type="hidden" name="tersimpan_koleksi_preparat_sayatan" value="off">
                    <input type="checkbox" name="tersimpan_koleksi_preparat_sayatan" id="tersimpan_koleksi_preparat_sayatan" class="form-check-input">
                </div>

                <div class="form-group mb-3">
                    <label for="tersimpan_koleksi_preparat_serat" class="form-label">Koleksi Preparat Serat</label>
                    <input type="hidden" name="tersimpan_koleksi_preparat_serat" value="off">
                    <input type="checkbox" name="tersimpan_koleksi_preparat_serat" id="tersimpan_koleksi_preparat_serat" class="form-check-input">
                </div>

                <div class="form-group mb-3">
                    <label for="tersimpan_koleksi_kubus" class="form-label">Koleksi Kubus</label>
                    <input type="number" name="tersimpan_koleksi_kubus" id="tersimpan_koleksi_kubus" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="tersimpan_koleksi_serbuk" class="form-label">Koleksi Serbuk</label>
                    <input type="hidden" name="tersimpan_koleksi_serbuk" value="off">
                    <input type="checkbox" name="tersimpan_koleksi_serbuk" id="ada" class="form-check-input"> 
                   
                </div>
            </div>

            <div class="form-control col-md col-sm m-2">
                <h3>Duplikat</h3>

                <div class="form-group mb-3">
                    <label for="tersimpan_duplikat_trapesium" class="form-label">Duplikat Trapesium</label>
                    <input type="text" name="tersimpan_duplikat_trapesium" id="tersimpan_duplikat_trapesium" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="tersimpan_duplikat_utuh" class="form-label">Duplikat Utuh</label>
                    <input type="number" name="tersimpan_duplikat_utuh" id="tersimpan_duplikat_utuh" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="tersimpan_duplikat_dekatKulit" class="form-label">Duplikat Dekat Kulit</label>
                    <input type="number" name="tersimpan_duplikat_dekatKulit" id="tersimpan_duplikat_dekatKulit" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="tersimpan_duplikat_potongan" class="form-label">Duplikat Potongan</label>
                    <input type="number" name="tersimpan_duplikat_potongan" id="tersimpan_duplikat_potongan" class="form-control">
                </div>
                
                <div class="form-group mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    
                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                    <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                </div>

                
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap-5-theme@1.3.2/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
<script>
     document.addEventListener('DOMContentLoaded', function(){
        $('#tanaman_id').select2({
            placeholder: 'Pilih Koleksi',
            allowClear: true,
        });
        
        $('#tanaman_id').on('select2:select', function(e) {
                const data = e.params.data.element.dataset;
                document.getElementById('nomor_koleksi').value = data.idPenomoran;
                document.getElementById('nama_tanaman').value = data.namaTanaman;
                document.getElementById('suku').value = data.suku;
                document.getElementById('habitus').value = data.lokasi;
            });
    });
    </script>
@endsection