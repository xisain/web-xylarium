@extends('layouts.app')
@section('content')
<section class="row">
        <div class="card shadow">
            <form action="{{ route('pola-trapesium.store') }}" method="post">
                @csrf

                <!-- Tanggal -->
                <div class="form-group ">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control">
                </div>

                <div class="row mt-4">
                    <!-- Koleksi Section -->
                    <div class="col-sm">
                        <div class="card p-3">
                            <h3>Koleksi</h3>
                            <div class="form-group">
                                <label for="tanaman_id" class="form-label">Pilih Koleksi</label>
                                <select name="tanaman_id" id="tanaman_id" class="form-select" data-placeholder="Pilih Koleksi">
                                    <option value="">Pilih koleksi</option>
                                    @foreach ($tanamans as $tanaman)
                                    <option
                                        value="{{ $tanaman->id }}"
                                        data-id-penomoran="{{ $tanaman->no_ketukan }}"
                                        data-nama-tanaman="{{ $tanaman->jenis }}"
                                        data-suku="{{ $tanaman->famili }}"
                                        data-habitus=""
                                        data-lokasi="{{ $tanaman->lokasi }}">
                                        {{ $tanaman->no_ketukan }}.{{ $tanaman->jenis }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Hidden ID Penomoran Koleksi -->
                            <input type="hidden" id="penomoran_koleksi_id" name="penomoran_koleksi_id">

                            <!-- Input Fields -->
                            <div class="form-group mt-3">
                                <label for="nomor_koleksi" class="form-label">Nomor Koleksi</label>
                                <input type="text" name="nomor_koleksi" id="nomor_koleksi" class="form-control" disabled>
                            </div>

                            <div class="form-group mt-3">
                                <label for="nama_tanaman" class="form-label">Nama Tanaman</label>
                                <input type="text" name="nama_tanaman" id="nama_tanaman" class="form-control" disabled>
                            </div>

                            <div class="form-group mt-3">
                                <label for="suku" class="form-label">Suku</label>
                                <input type="text" name="suku" id="suku" class="form-control" disabled>
                            </div>

                            <div class="form-group mt-3">
                                <label for="habitus" class="form-label">Habitus</label>
                                <input type="text" name="habitus" id="habitus" class="form-control" disabled>
                            </div>
                        </div>
                    </div>

                    <!-- Terpola Section -->
                    <div class="col-sm">
                        <div class="card p-3">
                            <h3>Terpola</h3>
                            <div class="row">
                                <div class="form-group col-sm">
                                    <label for="terpola_trapesium" class="form-label">Trapesium</label>
                                    <input type="text" name="terpola_trapesium" id="terpola_trapesium" class="form-control">
                                </div>

                                <div class="form-group col-sm mt-3">
                                    <label for="terpola_kubus" class="form-label">Kubus</label>
                                    <input type="text" name="terpola_kubus" id="terpola_kubus" class="form-control">
                                </div>

                                <div class="form-group col-sm mt-3">
                                    <label for="terpola_utuh" class="form-label">Utuh</label>
                                    <input type="text" name="terpola_utuh" id="terpola_utuh" class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="terpola_jumlah" class="form-label">Jumlah</label>
                                    <input type="number" name="terpola_jumlah" id="terpola_jumlah" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Keterangan -->
                <div class="form-group">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                </div>

                <!-- Hidden User ID -->
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <!-- Submit Button -->
                <div class="form-group">

                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>
            </form>
        </div>
</section>

<!-- Include Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap-5-theme@1.3.2/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
   
</script>
@endsection
