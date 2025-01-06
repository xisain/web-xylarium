
    <title>Detail {{ $penerimaan->nama_tanaman }}</title>

    @extends('layouts.app')
    @section('heading', 'Detail \'' . $penerimaan->nama_tanaman . '\'')

    @section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>{{ $penerimaan->nama_tanaman }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Suku:</strong> {{ $penerimaan->suku }}</p>
                <p><strong>Habitus:</strong> {{ $penerimaan->habitus }}</p>
                <p><strong>Tempat Asal:</strong> {{ $penerimaan->tempat_asal }}</p>
                <p><strong>Xylarium Log:</strong> {{ $penerimaan->xylarium_log }}</p>
                <p><strong>Xylarium Lempengan:</strong> {{ $penerimaan->xylarium_lempengan }}</p>
                <p><strong>Jumlah Material:</strong> {{ $penerimaan->jumlah_material }}</p>
                <p><strong>Koordinat:</strong> {{ $penerimaan->Koordinat }}</p>
                <p><strong>Keterangan:</strong> {{ $penerimaan->keterangan }}</p>
                <p><strong>Status:</strong>
                    @if($penerimaan->status == 'layak')
                    <span class="badge bg-success">Layak</span>
                    @elseif($penerimaan->status == 'tidak')
                    <span class="badge bg-danger">Tidak Layak</span>
                    @else
                    <span class="badge bg-secondary">Belum di cek</span>
                     @endif
                </p>
                <p><strong>Author : </strong>{{ $penerimaan->user->name }}</p>


            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="{{ route('penerimaan.index') }}">Back to List</a>
                <a class="btn btn-warning" href="{{ route('penerimaan.edit', $penerimaan->id) }}">Edit</a>
                <form action="{{ route('penerimaan.destroy', $penerimaan->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>


            </div>
        </div>
    </div>
    @endsection
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
