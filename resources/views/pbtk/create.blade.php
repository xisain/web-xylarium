@extends('layouts.app')
@section('heading','Pembuatan Bahan Trapesium Koleksi')
@section('content')
   <section>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('pbtk.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control">
                </div>
               <div class="row">
                <div class="form-control col-sm m-2  bg-white">
                    <h4 class="text-center">Koleksi</h4>
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
                        <h2>Kegiatan</h2>
                        <div class="row">
                            <div class="form-control col-sm m-2 bg-white" >
                                <p><strong>Gergaji</strong></p>
                                <div class="form-group mb-3">
                                    <label for="kegiatan_gergaji_trapesium">Trapesium</label>
                                    <input type="text" name="kegiatan_gergaji_trapesium" id="kegiatan_gergaji_trapesium" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="kegiatan_gergaji_utuh">Utuh</label>
                                    <input type="text" name="kegiatan_gergaji_utuh" id="kegiatan_gergaji_utuh" class="form-control">
                                </div>
                            </div>
                            <div class="form-control col-sm m-2 bg-white">
                                <p><strong>Hamplas</strong></p>
                                <div class="form-group mb-3">
                                    <label for="kegiatan_hamplas_trapesium">Trapesium</label>
                                    <input type="text" name="kegiatan_hamplas_trapesium" id="kegiatan_hamplas_trapesium" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="kegiatan_hamplas_utuh">Utuh</label>
                                    <input type="text" name="kegiatan_hamplas_utuh" id="kegiatan_hamplas_utuh" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kegiatan_kubus">Kubus</label>
                                <input type="text" name="kegiatan_kubus" id="kegiatan_kubus" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-control mt-2 bg-white">
                        <label for="jumlah_potongan">Jumlah Potongan</label>
                        <input type="number" name="jumlah_potongan" id="jumlah_potongan" class="form-control">
                        <label for="keterangan">keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="form-control mt-2 btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
   </section>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
