@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mt-5">Create Penerimaan</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <form action="{{ route('penerimaan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="getTanaman">Nama Tanaman:</label>
            <select class="form-control" id="getTanaman" name="getTanaman"></select>
        </div>
        <div class="form-group">
            <label for="nama_tanaman">Nama Tanaman:</label>
            <input type="text" class="form-control" id="nama_tanaman" name="nama_tanaman" readonly>
        </div>
        <div class="form-group">
            <label for="suku">Suku:</label>
            <input type="text" class="form-control" id="suku" name="suku" readonly>
        </div>
        <div class="form-group">
            <label for="habitus">Habitus:</label>
            <input type="text" class="form-control" id="habitus" name="habitus" required>
        </div>
        <div class="form-group">
            <label for="tempat_asal">Tempat Asal:</label>
            <input type="text" class="form-control" id="tempat_asal" name="tempat_asal" required>
        </div>
        <div class="form-group">
            <label for="tanggal_terima">Tanggal Penerimaan:</label>
            <input type="date" class="form-control" name="tanggal_terima" id="tanggal_terima" required>
        </div>
        <div class="form-group">
            <label for="xylarium_log">Xylarium Log:</label>
            <input type="text" class="form-control" id="xylarium_log" name="xylarium_log" required>
        </div>
        <div class="form-group">
            <label for="xylarium_lempeng">Xylarium Lempengan:</label>
            <input type="text" class="form-control" id="xylarium_lempeng" name="xylarium_lempeng" required>
        </div>
        <div class="form-group">
            <label for="jumlah_material">Jumlah Material:</label>
            <input type="text" class="form-control" id="jumlah_material" name="jumlah_material" required>
        </div>
        <div class="form-group">
            <label for="Koordinat">Koordinat:</label>
            <input type="text" class="form-control" id="Koordinat" name="Koordinat" required>
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



<script>
    $(document).ready(function() {
        // Initialize Select2 for the "Nama Tanaman" field
        $('#getTanaman').select2({
            placeholder: 'Select Nama Tanaman',
            ajax: {
                url: '{{ route('species.search', [], true) }}', // Correct search endpoint
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
                                genera: item.genera, // Include 'suku' in the result
                                author:item.author_name,
                                spesies: item.spesies,
                                infra_rank_species: item.infra_rank_species,
                                infra_rank_ephitet: item.infra_rank_ephitet,

                            };
                        })
                    };
                },
                cache: true
            }
        });
        $('#getTanaman').on('select2:select', function(e) {
            var selectedItem = e.params.data;
            console.log(selectedItem)
            $('#suku').val(selectedItem.genera)
            $('#nama_tanaman').val(selectedItem.text)

        });

        // Listen to the Select2 select event
    });
</script>
@endsection
@section('scripts')
