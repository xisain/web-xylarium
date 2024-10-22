@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mt-5">Create Penerimaan</h1>
    <form action="{{ route('penerimaan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama_tanaman">Nama Tanaman:</label>
            <select class="form-control" id="nama_tanaman" name="nama_tanaman"></select>
        </div>
        <div class="form-group">
            <label for="suku">Suku:</label>
            <input type="text" class="form-control" id="suku" name="suku" readonly>
        </div>
        <div class="form-group">
            <label for="habitus">Habitus:</label>
            <input type="text" class="form-control" id="habitus" name="habitus">
        </div>
        <div class="form-group">
            <label for="tempat_asal">Tempat Asal:</label>
            <input type="text" class="form-control" id="tempat_asal" name="tempat_asal">
        </div>
        <div class="form-group">
            <label for="tanggal_terima">Tanggal Penerimaan:</label>
            <input type="date" class="form-control" name="tanggal_terima" id="tanggal_terima">
        </div>
        <div class="form-group">
            <label for="xylarium_log">Xylarium Log:</label>
            <input type="text" class="form-control" id="xylarium_log" name="xylarium_log">
        </div>
        <div class="form-group">
            <label for="xylarium_lempengan">Xylarium Lempengan:</label>
            <input type="text" class="form-control" id="xylarium_lempengan" name="xylarium_lempengan">
        </div>
        <div class="form-group">
            <label for="jumlah_material">Jumlah Material:</label>
            <input type="text" class="form-control" id="jumlah_material" name="jumlah_material">
        </div>
        <div class="form-group">
            <label for="Koordinat">Koordinat:</label>
            <input type="text" class="form-control" id="Koordinat" name="Koordinat">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan">
        </div>
        <input type="hidden" name="status" value="Belum di cek">
        <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </form>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script>
    $(document).ready(function() {
        // Initialize Select2 for the "Nama Tanaman" field
        $('#nama_tanaman').select2({
            placeholder: 'Select Nama Tanaman',
            ajax: {
                url: 'http://192.168.100.241/api/species/search', // Correct search endpoint
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        nama: params.term // The search query (term) is sent as 'nama'
                    };
                },
                processResults: function(data) {
                    return {
                        results: data.data.map(function(item) {
                            return {
                                id: item.id,
                                text: item.nama, // Display 'nama' in the dropdown
                                suku: item.suku, // Include 'suku' in the result
                                habitus: item.habitus // Include 'habitus' in the result
                            };
                        })
                    };
                },
                cache: true
            }
        });
        $('#nama_tanaman').on('select2:select', function(e) {
            var selectedItem = e.params.data;
            console.log(selectedItem)
          
        });

        // Listen to the Select2 select event
    });
</script>

@endsection
