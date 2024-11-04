@extends("layouts.app")
@section('content')


<div class="container">
    <h1 class="mt-5">Penerimaan List</h1>
    <a href="{{ route('penerimaan.create') }}" class="btn btn-primary mb-3">Create New Penerimaan</a>
    <a class="btn btn-success mb-3" href="{{ route('penerimaan.export', 'without-status') }}">Export to Excel (Without Status)</a>
    <a class="btn btn-info mb-3" href="{{ route('penerimaan.export', 'with-status') }}">Export to Excel (With Status)</a>
    <table class="table table-bordered">
        <tr>
            <th rowspan="2">No</th>
            <th  rowspan="2">Nama Tanaman</th>
            <th  rowspan="2">Suku</th>
            <th  rowspan="2">Habitus</th>
            <th rowspan="2">Tempat Asal</th>
            <th  rowspan="2">tanggal penerimaan</th>
            <th colspan="2">Xylarium</th>
            <th rowspan="2">Jumlah Material</th>
            <th rowspan="2">Koordinat</th>
            <th rowspan="2">Keterangan</th>
            <th rowspan="2">Status</th>
            <th rowspan="2">Pelaksana</th>
            <th width="280px" rowspan="2">Action</th>
        </tr>
        <tr>
            <th>Log</th>
            <th>Lempengan</th>

        </tr>
        <tbody>
        @foreach ($penerimaans as $penerimaan)
        <tr>
            <td>{{ $penerimaan->id }}</td>
            <td>{{ $penerimaan->nama_tanaman }}</td>
            <td>{{ $penerimaan->suku }}</td>
            <td>{{ $penerimaan->habitus }}</td>
            <td>{{ $penerimaan->tempat_asal }}</td>
            <td>{{ $penerimaan->tanggal_terima }}</td>
            <td>{{ $penerimaan->xylarium_log }}</td>
            <td>{{ $penerimaan->xylarium_lempeng }}</td>
            <td>{{ $penerimaan->jumlah_material }}</td>
            <td>{{ $penerimaan->koordinat }}</td>
            <td>{{ $penerimaan->keterangan }}</td>

            <td>
                @if($penerimaan->status == 'layak')
                    <span class="badge bg-success">Layak</span>
                @elseif($penerimaan->status == 'tidak')
                    <span class="badge bg-danger">Tidak Layak</span>
                @else
                    <span class="badge bg-secondary">Belum di cek</span>
                @endif
            </td>
            <td>{{ $penerimaan->user->name }}</td>
            <td>
                <form id="delete-form-{{ $penerimaan->id }}" action="{{ route('penerimaan.destroy', $penerimaan->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('penerimaan.show', $penerimaan->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('penerimaan.edit', $penerimaan->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $penerimaan->id }})">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{ $penerimaans -> links() }}
</div>


@endsection
@section('scripts')
