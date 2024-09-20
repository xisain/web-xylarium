@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<div class="container">
    <h1 class="mt-5"> Penomoran Koleksi</h1>
    <a href="{{ route('penomorankoleksi.create') }}" class="btn btn-success mb-3">Penomoran Baru</a>
    <a href="{{ route('penomoran.export') }}" class="btn btn-primary mb-3">Export Data</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Jenis</th>
                <th>Suku</th>
                <th>Tempat Asal</th>
                <th>Nomor Koleksi</th>
                <th>Keterangan</th>
                <th>author</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penomoran as $penomoranItem)
            <tr>
                <td>{{ $penomoranItem->id }}</td>
                <td>{{ $penomoranItem->date }}</td>
                <td>{{ $penomoranItem->penerimaan->nama_tanaman ?? 'N/A' }}</td>
                <td>{{ $penomoranItem->penerimaan->suku ?? 'N/A' }}</td>
                <td>{{ $penomoranItem->penerimaan->tempat_asal ?? 'N/A' }}</td>
                <td>{{ $penomoranItem->nomor_koleksi }}</td>
                <td>{{ $penomoranItem->keterangan }}</td>
                <td>{{ $penomoranItem->user->name }}</td>
                <td>
                    <a href="{{ route('penomorankoleksi.show',$penomoranItem -> id) }}" class="btn btn-primary">Show </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
   toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
},

@if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
@endif

@if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
@endif

</script>
@endsection
