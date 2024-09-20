@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Tanaman</h1>
        <div class="card mb-3">
            <div class="card-header">
                <h2>{{ $tanaman->jenis }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Jenis: </strong>{{ $tanaman->jenis }}</p>
                <p><strong>No Koleksi: </strong>{{ $tanaman->no_ketukan }}</p>
                <p><strong>Synonime:</strong> {{ $tanaman->synonime }}</p>
                <p><strong>Famili:</strong> {{ $tanaman->famili }}</p>
                <p><strong>Nomor Vak:</strong> {{ $tanaman->nomor_vak }}</p>
                <p><strong>Nama Lokal:</strong> {{ $tanaman->nama_lokal }}</p>
                <p><strong>Keterangan:</strong> {{ $tanaman->keterangan }}</p>
                <a href="{{ route('tanaman.edit', $tanaman->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>

        <!-- Pengeringan -->
        @if($pengeringan->isNotEmpty())
            <div class="card mb-3">
                <div class="card-header">
                    <h2>Pengeringan</h2>
                </div>
                <div class="card-body">
                    @foreach($pengeringan as $item)
                        <p><strong>Tanggal Masuk:</strong> {{ $item->tanggal_masuk }}</p>
                        <p><strong>Tanggal Keluar:</strong> {{ $item->tanggal_keluar }}</p>
                        <p><strong>Pelaksana:</strong> {{ $item->pelaksana }}</p>
                        <p><strong>Keterangan:</strong> {{ $item->keterangan }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Pembuatan Bahan Koleksi -->
        @if($pembuatanBahanKoleksi->isNotEmpty())
            <div class="card mb-3">
                <div class="card-header">
                    <h2>Pembuatan Bahan Koleksi</h2>
                </div>
                <div class="card-body">
                    @foreach($pembuatanBahanKoleksi as $item)
                        <p><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                        <p><strong>Kegiatan Gergaji:</strong> {{ $item->kegiatan_gergaji }}</p>
                        <p><strong>Kegiatan Hamplas:</strong> {{ $item->kegiatan_hamplas }}</p>
                        <p><strong>Jumlah Potongan:</strong> {{ $item->jumlah_potongan }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Pola Trapesium -->
        @if($polatrapesium->isNotEmpty())
            <div class="card mb-3">
                <div class="card-header">
                    <h2>Pola Trapesium</h2>
                </div>
                <div class="card-body">
                    @foreach($polatrapesium as $item)
                        <p><strong>Trapesium:</strong> {{ $item->terpola_trapesium }}</p>
                        <p><strong>Utuh:</strong> {{ $item->terpola_utuh }}</p>
                        <p><strong>Kubus:</strong> {{ $item->terpola_kubus }}</p>
                        <p><strong>Jumlah:</strong> {{ $item->terpola_jumlah }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- PBTK -->
        @if($pbtk->isNotEmpty())
            <div class="card mb-3">
                <div class="card-header">
                    <h2>PBTK</h2>
                </div>
                <div class="card-body">
                    @foreach($pbtk as $item)
                        <p><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                        <p><strong>Kegiatan Gergaji Trapesium:</strong> {{ $item->kegiatan_gergaji_trapesium }}</p>
                        <p><strong>Kegiatan Gergaji Utuh:</strong> {{ $item->kegiatan_gergaji_utuh }}</p>
                        <p><strong>Kegiatan Hamplas Trapesium:</strong> {{ $item->kegiatan_hamplas_trapesium }}</p>
                        <p><strong>Kegiatan Hamplas Utuh:</strong> {{ $item->kegiatan_hamplas_utuh }}</p>
                        <p><strong>Kegiatan Kubus:</strong> {{ $item->kegiatan_kubus }}</p>
                        <p><strong>Jumlah Potongan:</strong> {{ $item->jumlah_potongan }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- PNPTK -->
        @if($pnptk->isNotEmpty())
            <div class="card mb-3">
                <div class="card-header">
                    <h2>PNPTK</h2>
                </div>
                <div class="card-body">
                    @foreach($pnptk as $item)
                        <p><strong>Xylarium Trapesium:</strong> {{ $item->xylarium_trapesium }}</p>
                        <p><strong>Xylarium Utuh:</strong> {{ $item->xylarium_utuh }}</p>
                        <p><strong>Xylarium Serbuk:</strong> {{ $item->xylarium_serbuk }}</p>
                        <p><strong>Xylarium Dekat Kulit:</strong> {{ $item->xylarium_dekatKulit }}</p>
                        <p><strong>Xylarium Prepat Sayatan:</strong> {{ $item->xylarium_prepat_sayatan }}</p>
                        <p><strong>Xylarium Prepat Serat:</strong> {{ $item->xylarium_prepat_serat }}</p>
                        <p><strong>Xylarium Potongan:</strong> {{ $item->xylarium_potongan }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Dokumentasi Koleksi -->
        @if($dokumentasiKoleksi->isNotEmpty())
            <div class="card mb-3">
                <div class="card-header">
                    <h2>Dokumentasi Koleksi</h2>
                </div>
                <div class="card-body">
                    @foreach($dokumentasiKoleksi as $item)
                        <div class="row">
                           <div class="col-sm mb-2" class="card">
                            <div class="card-header">
                                <h4>Foto Trapesium</h4>
                            </div>
                           <div class="card-body">
                            <img src={{ asset('storage/'.json_decode($item->foto_trapesium) )}} alt="" width="300" id="foto_trapesium">
                           </div>
                           </div>
                           <div class="col-sm mb-2" class="card">
                            <div class="card-header">
                                <h4>Foto Pola</h4>
                            </div>
                           <div class="card-body">
                            <img src={{ asset('storage/'.json_decode($item->foto_pola) )}} alt="" width="300" id="foto_trapesium">
                           </div>
                           </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Anatomi Mikroskopis -->
        @if($anatomiMikroskopis->isNotEmpty())
        <div class="card mb-3">
            <div class="card-header">
                <h2>Anatomi Mikroskopis</h2>
            </div>
            <div class="card-body">
                @foreach($anatomiMikroskopis as $am)
                    <div class="row">
                        <div class="col-md-3 col-sm-6 mb-3">
                            <p><strong>Kegiatan Sayatan Tangen:</strong></p>
                            <img src="{{ asset('storage/'. $am->kegiatan_sayatan_tangen) }}" alt="Kegiatan Sayatan Tangen" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <p><strong>Kegiatan Sayatan Radial:</strong></p>
                            <img src="{{ asset('storage/'. $am->kegiatan_sayatan_radial) }}" alt="Kegiatan Sayatan Radial" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <p><strong>Kegiatan Sayatan Tranversal:</strong></p>
                            <img src="{{ asset('storage/'. $am->kegiatan_sayatan_transversal) }}" alt="Kegiatan Sayatan Tranversal" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <p><strong>Kegiatan Serat Panjang:</strong></p>
                            <img src="{{ asset('storage/'. $am->kegiatan_serat_panjang) }}" alt="Kegiatan Serat Panjang" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <p><strong>Kegiatan Serat Diameter:</strong></p>
                            <img src="{{ asset('storage/'. $am->kegiatan_serat_diameter) }}" alt="Kegiatan Serat Diameter" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <p><strong>Kegiatan Serat Diameter Lumen:</strong></p>
                            <img src="{{ asset('storage/'. $am->kegiatan_serat_diameterLumen) }}" alt="Kegiatan Serat Diameter Lumen" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <p><strong>Kegiatan Serat Dinding Serat:</strong></p>
                            <img src="{{ asset('storage/'. $am->kegiatan_serat_dindingSerat) }}" alt="Kegiatan Serat Dinding Serat" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <p><strong>Kegiatan Serat Diameter Pembuluh:</strong></p>
                            <img src="{{ asset('storage/'. $am->kegiatan_serat_diameterPembuluh) }}" alt="Kegiatan Serat Diameter Pembuluh" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <p><strong>Kegiatan Serat Panjang Pembuluh:</strong></p>
                            <img src="{{ asset('storage/'. $am->kegiatan_serat_panjangPembuluh) }}" alt="Kegiatan Serat Panjang Pembuluh" class="img-fluid img-thumbnail">
                        </div>
                    </div>
                    <p><strong>Keterangan:</strong> {{ $am->keterangan ?? 'NA'}}</p>
                @endforeach
            </div>
        </div>
    @endif
    

        <!-- Anatomi Makroskopis -->
        @if($anatomiMakroskopis->isNotEmpty())
        <div class="card mb-3">
            <div class="card-header">
                <h2>Anatomi Makroskopis</h2>
            </div>
            <div class="card-body">
                @foreach($anatomiMakroskopis as $am)
                    <div class="row">
                        <!-- Trapesium Tangen Images -->
                        <div class="col-md-4 col-sm-6 mb-3">
                            <p><strong>Trapesium Tangen Images:</strong></p>
                            @foreach(json_decode($am->tangen_images) as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Trapesium Tangen Image" class="img-fluid img-thumbnail">
                                <hr>
                            @endforeach
                        </div>
    
                        <!-- Trapesium Radial Images -->
                        <div class="col-md-4 col-sm-6 mb-3">
                            <p><strong>Trapesium Radial Images:</strong></p>
                            @foreach(json_decode($am->radial_images) as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Trapesium Radial Image" class="img-fluid img-thumbnail">
                                <hr>
                            @endforeach
                        </div>
    
                        <!-- Trapesium Tranversal Images -->
                        <div class="col-md-4 col-sm-6 mb-3">
                            <p><strong>Trapesium Tranversal Images:</strong></p>
                            @foreach(json_decode($am->transversal_images) as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Trapesium Tranversal Image" class="img-fluid img-thumbnail">
                                <hr>
                            @endforeach
                        </div>
                    </div>
                    <p><strong>Keterangan:</strong> {{ $am->keterangan ?? 'NA' }}</p>
                @endforeach
            </div>
        </div>
    @endif
    

    </div>


      
@endsection
