@extends('layouts.app')

@section('content')

<section class="row">
    @if ($errors->any())
    <div class="col">
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('dokumentasi-koleksi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-control col-sm m-2 bg-white">
                        <h3>Koleksi</h3>
                        <select name="tanaman_id" id="tanaman_id" class="form-select mb-3">
                            <option value="">Pilih koleksi</option>
                            @foreach ($tanamans as $tanaman)
                            <option value="{{ $tanaman->id }}" data-id-penomoran="{{ $tanaman->no_ketukan }}"
                                data-nama-tanaman="{{ $tanaman->jenis }}" data-suku="{{ $tanaman->famili }}" data-habitus=""
                                data-lokasi="{{ $tanaman->lokasi }}">
                                {{ $tanaman->no_ketukan }}.{{ $tanaman->jenis }}
                            </option>
                            @endforeach
                        </select>
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
                            <label for="habitus" class="form-label">Habitus</label>
                            <input type="text" name="habitus" id="habitus" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-control col-sm m-2 bg-white">
                        <h3 class="text-center">Foto</h3>
                        <div class="form-group mb-3">
                            <label for="foto_trapesium">Trapesium</label>
                            <input type="file" name="foto_trapesium" id="foto_trapesium" class="form-control" accept="image/*"
                                onchange="previewImage('foto_trapesium', 'trapesium_preview')">
                            <img id="trapesium_preview" src="" alt="" class="img-fluid mt-2" style="max-height: 200px;">
                        </div>
                        <div class="form-group mb-3">
                            <label for="foto_pola">Pola</label>
                            <input type="file" name="foto_pola" id="foto_pola" class="form-control" accept="image/*"
                                onchange="previewImage('foto_pola', 'pola_preview')">
                            <img id="pola_preview" src="" alt="" class="img-fluid mt-2" style="max-height: 200px;">
                        </div>
                    </div>
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control mb-3"></textarea>
                    <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

<script>
    $(document).ready(function() {
            $('#tanaman_id').select2({
                placeholder: 'Pilih Koleksi',
                allowClear: true,
            });

            $('#tanaman_id').on('select2:select', function(e) {
                const data = e.params.data.element.dataset;
                document.getElementById('nomor_koleksi').value = data.idPenomoran;
                document.getElementById('nama_tanaman').value = data.namaTanaman;
                document.getElementById('suku').value = data.suku;
                document.getElementById('habitus').value = data.habitus;
            });
        });

        function previewImage(inputId, imgPreviewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(imgPreviewId);
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
</script>

@endsection
