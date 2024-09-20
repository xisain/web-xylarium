@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<style>
    .card {
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.5s ease-in-out;
    }

    .card.animate {
        opacity: 1;
        transform: translateY(0);
    }

    .btn {
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.3s ease-in-out;
    }

    .btn.animate {
        opacity: 1;
        transform: scale(1);
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Hello, {{ Auth::user()->name }}!</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="/penerimaan" class="btn btn-primary mb-3">Penerimaan & Kelayakan</a>
                    <a href="/penomorankoleksi" class="btn btn-primary mb-3">penomoran koleksi</a>
                    <a href="/tanaman" class="btn btn-primary mb-3">Kekayaan</a>
                    <a href="/pengeringan" class="btn btn-primary mb-3">Pengovenan</a>
                    <a href="{{ route('pembuatan-bahan-koleksi.index') }}" class="btn btn-primary mb-3">Pembuatan Bahan Koleksi</a>
                    <a href="{{ route('pola-trapesium.index') }}" class="btn btn-primary mb-3">Pembuatan Pola Trapesium</a>
                    <a href="{{ route('pbtk.index') }}" class="btn btn-primary mb-3">Pembuatan Bahan Trapesium Koleksi </a>
                    <a href="{{ route('pnptk.index') }}" class="btn btn-primary mb-3">Pengetokan Nomor pada Trapesium Koleksi </a>
                    <a href="{{ route('dokumentasi-koleksi.index') }}" class="btn btn-primary mb-3">Dokumentasi Koleksi</a>
                    <a href="{{ route('anatomi-makroskopis.index') }}"  class="btn btn-primary mb-3" >Anatomi Makroskopis</a>
                    <a href="{{ route('anatomi-mikroskopis.index') }}"  class="btn btn-primary mb-3" >Anatomi Mikroskopis</a>
                    <a href="{{ route('pendinginan.index') }}"  class="btn btn-primary mb-3" >Pendingingan</a>
                    <a href="{{ route('penyimpanan.index') }}"  class="btn btn-primary mb-3" >Tersimpan</a>
                    <a href="{{ route('inspeksi.index') }}"  class="btn btn-primary mb-3" >Inspeksi</a>
                    <a href="{{ route('pemeliharaan.index') }}"  class="btn btn-primary mb-3" >pemeliharaan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    window.addEventListener('DOMContentLoaded', function() {

        function belumTersedia() {
            alert("belum ready")
        }
        var card = document.querySelector('.card');
        var buttons = document.querySelectorAll('.btn');

        card.classList.add('animate');

        buttons.forEach(function(button) {
            button.classList.add('animate');
        });
    });
</script>