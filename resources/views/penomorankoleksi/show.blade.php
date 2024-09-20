@extends("layouts.app")
@section('content')
<title>{{ $penomoran->penerimaan->nama_tanaman ?? 'Default Title' }}</title>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>{{ $penomoran->penerimaan->nama_tanaman }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Nomor Koleksi: </strong>{{ $penomoran->nomor_koleksi }}</p>
            <p><strong>Suku:</strong> {{ $penomoran->penerimaan->suku }}</p>
            <p><strong>Habitus:</strong> {{ $penomoran->penerimaan->habitus }}</p>
            <p><strong>Tempat Asal:</strong> {{ $penomoran->penerimaan->tempat_asal }}</p>
            <p><strong>Xylarium Log:</strong> {{ $penomoran->penerimaan->xylarium_log }}</p>
            <p><strong>Xylarium Lempengan:</strong> {{ $penomoran->penerimaan->xylarium_lempengan }}</p>
            <p><strong>Jumlah Material:</strong> {{ $penomoran->penerimaan->jumlah_material }}</p>
            <p><strong>Koordinat:</strong> {{ $penomoran->penerimaan->Koordinat }}</p>
            <p><strong>Keterangan:</strong> {{ $penomoran->penerimaan->keterangan }}</p>
            <p><strong>Author: </strong>{{ $penomoran->user->name }}</p>
        <div class="card-footer">
             <a class="btn btn-primary" href="{{ route('penomorankoleksi.index') }}">Back to List</a>
            {{-- <a class="btn btn-warning" href="{{ route('penerimaan.edit', $penerimaan->id) }}">Edit</a>
            <form action="{{ route('penerimaan.destroy', $penerimaan->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>  --}}


        </div>
    </div>
</div>
@endsection