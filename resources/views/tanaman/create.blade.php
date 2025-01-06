@extends('layouts.app')
@section('heading', 'Tanaman Baru')
@section('content')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
<section class="row">
    <div class="card shadow-sm">
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{ route('tanaman.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="penomoran_koleksi_id">Pilih Penomoran Koleksi:</label>
                    <select name="penomoran_koleksi_id" id="penomoran_koleksi_id" class="form-control" required>
                        <option value="">Pilih koleksi</option>
                        @foreach($penomoranKoleksi as $koleksi)
                            <option
                            value="{{ $koleksi->id }}"
                            data-no_ketukan="{{ $koleksi->nomor_koleksi }}"
                            data-jenis="{{ $koleksi->penerimaan->nama_tanaman }}"
                            data-suku="{{ $koleksi->penerimaan->suku }}"
                            data-lokasi="{{ $koleksi->penerimaan->tempat_asal }}"
                            >{{ $koleksi->id }} - {{ $koleksi->penerimaan->nama_tanaman }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="no_ketukan">Nomor Ketuk</label>
                    <input type="text" name="no_ketukan" id="no_ketukan" class="form-control" disabled>
                    <input type="hidden" name="no_ketukan" id="no_ketukan-hidden">
                </div>

                <div class="form-group">
                    <label for="jenis">Jenis:</label>
                    <input type="text" name="jenis" id="jenis" class="form-control" disabled>
                    <input type="hidden" name="jenis" id="jenis-hidden">
                </div>

                <div class="form-group">
                    <label for="synonime">Synonime:</label>
                    <input type="text" name="synonime" id="synonime" class="form-control">
                </div>

                <div class="form-group">
                    <label for="famili">Famili:</label>
                    <input type="text" name="famili" id="famili" class="form-control" disabled>
                    <input type="hidden" name="famili" id="famili-hidden">
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" disabled>
                    <input type="hidden" name="lokasi" id="lokasi-hidden">
                </div>

                <div class="form-group">
                    <label for="nomor_vak">Nomor Vak:</label>
                    <input type="text" name="nomor_vak" id="nomor_vak" class="form-control">
                </div>

                <div class="form-group">
                    <label for="nama_lokal">Nama Lokal:</label>
                    <input type="text" name="nama_lokal" id="nama_lokal" class="form-control">
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Select2 on the select element
            $('#penomoran_koleksi_id').select2({
                placeholder: 'Pilih koleksi',
                allowClear: true
            });

            // Set up the event listener for Select2
            $('#penomoran_koleksi_id').on('select2:select', function(e) {
                // Get the selected option data
                const data = e.params.data.element.dataset;
                console.log(data)
                const nomorKetukInput = document.getElementById('no_ketukan');
                const nomorKetukHidden = document.getElementById('no_ketukan-hidden');
                const jenisInput = document.getElementById('jenis');
                const jenisHidden = document.getElementById('jenis-hidden');
                const sukuInput = document.getElementById('famili');
                const sukuHidden = document.getElementById('famili-hidden');
                const lokasiInput = document.getElementById('lokasi')
                const lokasiHidden = document.getElementById('lokasi-hidden')

                nomorKetukInput.value = data.no_ketukan;
                nomorKetukHidden.value = data.no_ketukan;
                lokasiHidden.value = data.lokasi
                lokasiInput.value = data.lokasi
                jenisInput.value = data.jenis;
                jenisHidden.value = data.jenis;

                sukuInput.value = data.suku;
                sukuHidden.value = data.suku;
            });
        });
    </script>

@endsection
