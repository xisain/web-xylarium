@extends('layouts.app')
@section('heading','Pendinginan')
@section('content')
    <section class="row">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('pendinginan.store') }}" method="post">
                    @csrf
                   <div class="row">
                    <div class="form-control col-sm m-2 bg-white">
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
                        <h3 class="text-center">Pendinginan</h3>
                        <div class="form-group form-control mb-3 bg-white">
                            <h4>Xylarium</h4>
                            <label for="xylarium_bahan">Bahan</label>
                            <input type="text" name="xylarium_bahan" id="xylarium_bahan" class="form-control">
                            <label for="xylarium_koleksi">Koleksi</label>
                            <input type="text" name="xylarium_koleksi" id="xylarium_koleksi" class="form-control">
                            <label for="xylarium_duplikat">Duplikat</label>
                            <input type="text" name="xylarium_duplikat" id="xylarium_duplikat" class="form-control">
                        </div>
                        <div class="form-control form-group mb-3 bg-white">
                            <h4>Tanggal</h4>
                            <label for="tanggal_masuk">Masuk</label>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control">
                            <label for="tanggal_masuk">Keluar</label>
                            <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                   </div>
                </form>
            </div>
        </div>
    </section>
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
