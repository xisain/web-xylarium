@extends('layouts.app')
@section('heading','Inspeksi')
@section('content')
    <section class="row">
        @if ($errors->any())

        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach

        @endif
       <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('inspeksi.store') }}" method="post">
                @csrf
                <a href="{{ route('inspeksi.index') }}" class="btn btn-success"> < Kembali Ke List</a>
                <button type="reset" class="btn btn-warning">Reset Form</button>
                <div class="row">
                    <div class="form-control col-sm m-2 bg-white">
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
                        <H2>Kegiatan</H2>

                        <div class="form-group">
                            <label for="identifikasi_koleksi">Identifikasi Koleksi</label>
                            <input type="text" name="identifikasi_koleksi" id="identifikasi_koleksi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="kondisi_koleksi">Kondisi Koleksi</label>
                            <input type="text" name="kondisi_koleksi" id="kondisi_koleksi" class="form-control">
                        </div>
                      <div class="form-group form-control mt-3 bg-white">
                        <h3 class="text-center">Trapesium</h3>
                        <div class="form-group">
                            <label for="trapesium_koleksi"> Koleksi</label>
                            <input type="text" name="trapesium_koleksi" id="trapesium_koleksi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="trapesium_duplikat">Duplikat</label>
                            <input type="text" name="trapesium_duplikat" id="trapesium_duplikat" class="form-control">
                        </div>
                      </div>
                        <div class="form-group mt-3">
                            <label for="duplikasi_no_koleksi">Duplikasi No Koleksi</label>
                            <input type="text" name="duplikasi_no_koleksi" id="duplikasi_no_koleksi" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="koleksi_serbuk">Koleksi Serbuk</label>
                            <input type="text" name="koleksi_serbuk" id="koleksi_serbuk" class="form-control">
                        </div>
                       <div class="form-group form-control mt-3 bg-white">
                        <h3 class="text-center">Preparat</h3>
                        <div class="form-group">
                            <label for="preparat_koleksi_sayatan">Koleksi Sayatan</label>
                            <input type="text" name="preparat_koleksi_sayatan" id="preparat_koleksi_sayatan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="preparat_koleksi_serat">Koleksi Serat</label>
                            <input type="text" name="preparat_koleksi_serat" id="preparat_koleksi_serat" class="form-control">
                        </div>
                       </div>
                        <div class="form-group">
                            <label for="kubus">Kubus</label>
                            <input type="text" name="kubus" id="kubus" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>
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

            $('#tanaman_id').on('select2:select', function(e){
                const data = e.params.data.element.dataset;
                console.log(data)
                document.getElementById('nomor_koleksi').value=data.idPenomoran
                document.getElementById('nama_tanaman').value = data.namaTanaman;
                document.getElementById('suku').value = data.suku;
                document.getElementById('habitus').value = data.habitus;

            });
        });
        </script>
@endsection
