@extends('layouts.app')
@section('heading','Pengetokan Nomor Pada Trapesium Koleksi')
@section('content')
<section class="row">
    <div class="card shadow">
        <div class="card-body">
            <h2></h2>
            <form action="{{ route('pnptk.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-control col-sm m-2 bg-white">
                        <h4>Koleksi</h4>
                        <select name="tanaman_id" id="tanaman_id" class="form-select mb-">
                            <option value="">pilih koleksi</option>
                            @foreach ($tanamans as $tanaman)
                            <option value="{{ $tanaman->id }}"
                                data-id-penomoran="{{ $tanaman->no_ketukan }}"
                                data-nama-tanaman="{{ $tanaman->jenis }}"
                                data-suku="{{ $tanaman->famili }}"
                                data-habitus=""
                                data-lokasi="{{ $tanaman->lokasi }}"
                                >{{ $tanaman->no_ketukan }} - {{ $tanaman->jenis }}
                            </option>
                            @endforeach
                        </select>
                        <div class="form-group mb-3 mt-3">
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
                        <h4>Xylarium</h4>
                        <div class="form-group">
                            <label for="xylarium_trapesium">Trapesium</label>
                            <input type="text" name="xylarium_trapesium" id="xylarium_trapesium" class="form-control mb-2">
                        </div>
                        <div class="form-group">
                            <label for="xylarium_utuh">Utuh</label>
                            <input type="text" name="xylarium_utuh" id="xylarium_utuh" class="form-control mb-2">
                        </div>
                        <div class="form-group">
                            <label for="xylarium_serbuk">Serbuk</label>
                            <input type="text" name="xylarium_serbuk" id="xylarium_serbuk" class="form-control mb-2">
                        </div>
                        <div class="form-group">
                            <label for="xylarium_dekatKulit">Dekat Kulit</label>
                            <input type="text" name="xylarium_dekatKulit" id="xylarium_dekatKulit" class="form-control mb-2">
                        </div>
                        <h4>Prepat</h4>
                        <div class="form-group">
                        <label for="xylarium_prepat_sayatan">Sayatan</label>
                        <input type="text" name="xylarium_prepat_sayatan" id="xylarium_prepat_sayatan" class="form-control mb2">
                        </div>
                        <div class="form-group">
                            <label for="xylarium_prepat_serat">Serat</label>
                            <input type="text" name="xylarium_prepat_serat" id="xylarium_prepat_serat" class="form-control mb2">
                            </div>
                        <h4>Potongan</h4>
                        <div class="form-group">
                            <label for="xylarium_potongan">Potongan</label>
                            <input type="text" name="xylarium_potongan" id="xylarium_potongan" class="form-control mb2">
                            </div>
                    </div>
                </div>
                <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                <button type="submit" class="btn btn-primary form-control mt-3">Submit</button>
            </form>
        </div>
    </div>
</section>
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
                document.getElementById('nama_tanaman').value = data.namaTanaman;
                document.getElementById('suku').value = data.suku;
                document.getElementById('habitus').value = data.habitus;

            });
        });
        </script>
@endsection
