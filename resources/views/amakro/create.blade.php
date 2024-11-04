@extends('layouts.app')
@section('content')
<body>
   <div class="container">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach
@endif
    <form action="{{ route('anatomi-makroskopis.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <a href="{{ route('anatomi-makroskopis.index') }}" class="btn btn-danger">Kembali Ke Index</a>
        <button type="reset" class="btn btn-warning">Reset Form</button>
        <h2>Anatomi Makroskopis</h2>
        <div class="row">
            <div class="form-control col-sm m-2">
                <h3>Koleksi</h3>
                <select name="tanaman_id" id="tanaman_id" class="form-select mb-3">
                    <option value="">Pilih koleksi</option>
                    @foreach ($tanamans as $tanaman)
                    <option value="{{ $tanaman->id }}"
                        data-id-penomoran="{{ $tanaman->no_ketukan }}"
                        data-nama-tanaman="{{ $tanaman->jenis }}"
                        data-suku="{{ $tanaman->famili }}"
                        data-habitus=""
                        data-lokasi="{{ $tanaman->lokasi }}">
                        {{ $tanaman->no_ketukan }}.{{ $tanaman->jenis }}
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
            <div class="form-control col-sm m-2">
                <h2 class="text-center">Trapesium</h2>
                <div class="container">
                    <div class="row">
                        <div class="form-control m-3 col-sm">
                            <h3>Radial</h3>
                            <div id="radialContainer">
                                <div class="image-input-wrapper">
                                    <input type="file" name="radial_images[]" accept="image/*" class="form-control form-control-sm">
                                    <button type="button" onclick="removeImageInput(this)" class="btn btn-danger">-</button>
                                </div>
                            </div>
                            <button type="button" onclick="addImageInput('radialContainer')" class="btn btn-success">Add another image</button>
                        </div>

                        <div class="form-control m-3 col-sm">
                            <h3>Tangen</h3>
                            <div id="tangenContainer">
                                <div class="image-input-wrapper">
                                    <input type="file" name="tangen_images[]" accept="image/*" class="form-control form-control-sm">
                                    <button type="button" onclick="removeImageInput(this)" class="btn btn-danger">-</button>
                                </div>
                            </div>
                            <button type="button" onclick="addImageInput('tangenContainer')" class="btn btn-success">Add another image</button>
                        </div>

                        <div class="form-control m-3 col-sm">
                            <h3>Transversal</h3>
                            <div id="transversalContainer">
                                <div class="image-input-wrapper">
                                    <input type="file" name="transversal_images[]" accept="image/*" class="form-control form-control-sm">
                                    <button type="button" onclick="removeImageInput(this)" class="btn btn-danger">-</button>
                                </div>
                            </div>
                            <button type="button" onclick="addImageInput('transversalContainer')" class="btn btn-success">Add another image</button>
                        </div>


                    </div>

                </div>

            </div>
        </div>



        <div class="form-group mb-3">
            <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
            </div>
        <button type="submit" class="form-control btn btn-primary">Submit</button>
    </form>
   </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap-5-theme@1.3.2/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
<script>
     document.addEventListener('DOMContentLoaded', function(){
        $('#tanaman_id').select2({
            placeholder: 'Pilih Koleksi',
            allowClear: true,
        });

        $('#tanaman_id').on('select2:select', function(e) {
                const data = e.params.data.element.dataset;
                document.getElementById('nomor_koleksi').value = data.idPenomoran;
                document.getElementById('nama_tanaman').value = data.namaTanaman;
                document.getElementById('suku').value = data.suku;
                document.getElementById('habitus').value = data.lokasi;
            });
    });
    function addImageInput(containerId) {
        const imageInputContainer = document.getElementById(containerId);

        const imageWrapper = document.createElement('div');
        imageWrapper.className = 'image-input-wrapper';

        const newInput = document.createElement('input');
        newInput.type = 'file';
        newInput.className = "form-control form-control-sm"
        newInput.name = containerId.replace('Container', '_images[]'); // This dynamically sets the correct name
        newInput.accept = 'image/*';

        const removeButton = document.createElement('button');
        removeButton.className = "btn btn-danger";
        removeButton.type = 'button';
        removeButton.textContent = '-';
        removeButton.onclick = function() {
            imageInputContainer.removeChild(imageWrapper);
        };

        imageWrapper.appendChild(newInput);
        imageWrapper.appendChild(removeButton);
        imageInputContainer.appendChild(imageWrapper);
    }

    function removeImageInput(button) {
        button.parentNode.remove();
    }
</script>

<style>
    .image-input-wrapper {
        margin-bottom: 10px;
    }
</style>
@endsection
