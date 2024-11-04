<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Penerimaan</h2>
    {{ $penerimaan }}
    <form action="{{ route('penerimaan.update', $penerimaan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_tanaman">Nama Tanaman:</label>
            <input type="text" class="form-control" id="nama_tanaman" name="nama_tanaman" value="{{ $penerimaan->nama_tanaman }}">
        </div>
        <div class="form-group">
            <label for="suku">Suku:</label>
            <input type="text" class="form-control" id="suku" name="suku" value="{{ $penerimaan->suku }}">
        </div>
        <div class="form-group">
            <label for="habitus">Habitus:</label>
            <input type="text" class="form-control" id="habitus" name="habitus" value="{{ $penerimaan->habitus }}">
        </div>
        <div class="form-group">
            <label for="tempat_asal">Tempat Asal:</label>
            <input type="text" class="form-control" id="tempat_asal" name="tempat_asal" value="{{ $penerimaan->tempat_asal }}">
        </div>
        <div class="form-group">
            <label for="xylarium_log">Xylarium Log:</label>
            <input type="text" class="form-control" id="xylarium_log" name="xylarium_log" value="{{ $penerimaan->xylarium_log }}">
        </div>
        <div class="form-group">
            <label for="xylarium_lempeng">Xylarium Lempengan:</label>
            <input type="text" class="form-control" id="xylarium_lempeng" name="xylarium_lempeng" value="{{ $penerimaan->xylarium_lempeng }}">
        </div>
        <div class="form-group">
            <label for="jumlah_material">Jumlah Material:</label>
            <input type="text" class="form-control" id="jumlah_material" name="jumlah_material" value="{{ $penerimaan->jumlah_material }}">
        </div>
        <div class="form-group">
            <label for="Koordinat">Koordinat:</label>
            <input type="text" class="form-control" id="Koordinat" name="Koordinat" value="{{ $penerimaan->koordinat }}">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $penerimaan->keterangan }}">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status">
                @if($penerimaan->status)
                <option value="{{ $penerimaan->status }}" selected>{{ $penerimaan->status }}</option>
                <option value="belum di cek">Belum di Cek</option>
                <option value="layak">Layak</option>
                <option value="tidak">Tidak</option>
                @endif
            </select>
        </div>
        <input type="hidden" name="author_id" value="{{$penerimaan->author_id }}">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

</body>
</html>
