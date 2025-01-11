@extends('layouts.app')
@section('heading','Anatomi Makroskopis')
@section('content')
    <secttion class="row">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
        @endif
       <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('anatomi-mikroskopis.store') }}" method="post" enctype="multipart/form-data">
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
                        <h3 class="text-center">Kegiatan</h3>
                        <h4>Preparat Sayatan</h4>
                        <div class="form-group form-control mb-2 bg-white ">
                            <label for="kegiatan_sayatan_tangen">Tangen</label>
                            <input type="file" name="kegiatan_sayatan_tangen" id="kegiatan_sayatan_tangen" accept="image/*" class="form-control">
                        </div>
                        <div class="form-group form-control mb-2 bg-white">
                            <label for="kegiatan_sayatan_radial">Radial</label>
                            <input type="file" name="kegiatan_sayatan_radial" id="kegiatan_sayatan_radial" accept="image/*" class="form-control">
                        </div>
                        <div class="form-group form-control mb-2 bg-white">
                            <label for="kegiatan_sayatan_transversal" class="">Transversal</label>
                            <input type="file" name="kegiatan_sayatan_transversal" id="kegiatan_sayatan_transversal" accept="image/*" class="form-control" >
                        </div>
                        <h4>Preparat Serat</h4>
                        <div class="form-group form-control mb-2 bg-white">
                            <label for="kegiatan_serat_panjang" class="">Panjang</label>
                            <input type="file" name="kegiatan_serat_panjang" id="kegiatan_serat_panjang" accept="image/*" class="form-control" >
                        </div>
                        <div class="form-group form-control mb-2 bg-white">
                            <label for="kegiatan_serat_diameter" class="">Diameter</label>
                            <input type="file" name="kegiatan_serat_diameter" id="kegiatan_serat_diameter" accept="image/*" class="form-control">
                        </div>
                        <div class="form-group form-control mb-2 bg-white">
                            <label for="kegiatan_serat_diameterLumen" class="">Diameter Lumen</label>
                            <input type="file" name="kegiatan_serat_diameterLumen" id="kegiatan_serat_diameterLumen" accept="image/*" class="form-control">
                        </div>
                        <div class="form-group form-control mb-2 bg-white">
                            <label for="kegiatan_serat_dindingSerat" class="">Dinding Serat</label>
                            <input type="file" name="kegiatan_serat_dindingSerat" id="kegiatan_serat_dindingSerat" accept="image/*" class="form-control">
                        </div>
                        <div class="form-group form-control mb-2 bg-white">
                            <label for="kegiatan_serat_diameterPembuluh" class="">Diameter Pembuluh</label>
                            <input type="file" name="kegiatan_serat_diameterPembuluh" id="kegiatan_serat_diameterPembuluh" accept="image/*" class="form-control">
                        </div>
                        <div class="form-group form-control mb-2 bg-white">
                            <label for="kegiatan_serat_panjangPembuluh" class="">Panjang Pembuluh</label>
                            <input type="file" name="kegiatan_serat_panjangPembuluh" id="kegiatan_serat_panjangPembuluh" accept="image/*" class="form-control">

                        </div>
                    </div>
                </div>
                <div class="form-group bg-white">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                    <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                </div>
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </form>
        </div>
       </div>
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
