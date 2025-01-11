@extends('layouts.app')
@section('heading','Pemeliharaan')
@section('content')
    <div class="row">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('pemeliharaan.store') }}" method="post">
                    @csrf
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
                            <div class="form-group mb-3">
                                <label for="pengeringan_id" class="form-label">Pengeringan</label>
                                <select name="pengeringan_id" id="pengeringan_id" class="form-select mb-3">
                                    <option value="">Pilih Pengeringan</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="pendinginan_id" class="form-label">Pendinginan</label>
                                <select name="pendinginan_id" id="pendinginan_id" class="form-select mb-3">
                                    <option value="">Pilih Pendinginan</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal_pest_control">Pest Control</label>
                                <input type="date" name="tanggal_pest_control" id="tanggal_pest_control" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal_vacuum">Vacuum</label>
                                <input type="date" name="tanggal_vacuum" id="tanggal_vacuum" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal_fumigasi">Fumigasi</label>
                                <input type="date" name="tanggal_fumigasi" id="tanggal_fumigasi" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                            <textarea name="keterangan" class="form-control"></textarea>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
     @if ($errors->any())

        @foreach ($errors->all() as $error)
            Swal.fire({
                icon: 'error',
                            title: 'Save Error ',
                            text: '{{ $error }}',
                            confirmButtonText: 'OK'
            })
        @endforeach
        @endif
        @if ($errors->any())
        @endif
    document.addEventListener('DOMContentLoaded', function() {
        $('#tanaman_id').select2({
            placeholder: 'Pilih Koleksi',
            allowClear: true,
        });

        $('#tanaman_id').on('select2:select', function(e) {
            const tanamanId = e.params.data.id;
            const data = e.params.data.element.dataset;

            // Update form fields
            document.getElementById('nomor_koleksi').value = data.idPenomoran;
            document.getElementById('nama_tanaman').value = data.namaTanaman;
            document.getElementById('suku').value = data.suku;
            document.getElementById('habitus').value = data.habitus;

            // Fetch and update pengeringan options
            $.ajax({
                url: `/getPengeringan/${tanamanId}`,
                method: 'GET',
                success: function(response) {
                    const pengeringanSelect = $('#pengeringan_id');
                    pengeringanSelect.empty();
                    pengeringanSelect.append('<option value="">Pilih Pengeringan</option>');
                    if (Array.isArray(response) && response.length > 0) {
                        response.forEach(pengeringan => {
                            pengeringanSelect.append(`<option value="${pengeringan.id}"> Periode : ${pengeringan.tanggal_masuk} s.d. ${pengeringan.tanggal_keluar}</option>`);
                        });
                    } else {
                        // Show SweetAlert2 popup if no pengeringan data
                        Swal.fire({
                            icon: 'error',
                            title: 'Pengeringan Data',
                            text: 'Data Pengeringan Tidak Di temukan Untuk tanaman Ini ',
                            confirmButtonText: 'OK'
                        });
                        pengeringanSelect.attr('disabled')
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });

            // Fetch and update pendinginan options
            $.ajax({
                url: `/getPendinginan/${tanamanId}`,
                method: 'GET',
                success: function(response) {
                    const pendinginanSelect = $('#pendinginan_id');
                    pendinginanSelect.empty();
                    pendinginanSelect.append('<option value="">Pilih Pendinginan</option>');
                    if (Array.isArray(response) && response.length > 0) {
                        response.forEach(pendinginan => {
                            pendinginanSelect.append(`<option value="${pendinginan.id}"> Periode : ${pendinginan.tanggal_masuk} s.d. ${pendinginan.tanggal_keluar}</option>`);
                        });
                    } else {
                        // Show SweetAlert2 popup if no pendinginan data
                        Swal.fire({
                            icon: 'error',
                            title: 'No Pendinginan Data',
                            text: 'Data Pendinginan Tidak Di temukan',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        });
    });
</script>

@endsection
