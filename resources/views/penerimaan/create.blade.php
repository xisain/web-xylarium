
@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mt-5">Create Penerimaan</h1>
    <form action="{{ route('penerimaan.store') }}" method="POST">
        @csrf

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
            <input type="text" class="form-control" id="habitus" name="habitus">
        </div>
        <div class="form-group">
            <label for="tempat_asal">Tempat Asal:</label>
            <input type="text" class="form-control" id="tempat_asal" name="tempat_asal">
        </div>
        <div class="form-group">
            <label for="tanggal_terima">Tanggal Penerimaan :</label>
            <input type="date"class="form-control" name="tanggal_terima" id="tanggal_terima">
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
        </div>
        <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </form>
</div>
<script>
    var string = "Elaeocarpus angustifolius Blume"

fetch(`https://list.worldfloraonline.org/matching_rest.php?input_string=${string}`)
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    if(!data.match){  
      console.log('tidak ada data yang sesuai namun terdapat beberapa data kandidat')
      console.log(data.candidates) // return array data 
    } else {
      console.log(data.match) // perfect match 
    }
  })
  .catch(error => {
    console.error('There was a problem with the fetch operation:', error);
  });
</script>
@endsection

