<!DOCTYPE html>
<html>
<head>
    <title>Dokumentasi Koleksi Xylarium</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        h1, h2 {
            text-align: center;
        }
        .header-table {
            width: 100%;
            margin-bottom: 10px;
            border: 1px solid black;
        }
        .header-table td {
            border: 1px solid black;
            padding: 10px;
        }
        .logo {
            width: 80px;
        }
        .header-text {
            font-size: 14px;
            font-weight: bold;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th {
            text-align: center;
            padding: 5px;
        }
        td {
            vertical-align: top;
        }
        .images {
            text-align: center;
            padding: 5px;
        }
        .images img {
            width: 50px; /* Lebar gambar diatur ke 80px */
            height: auto; /* Menjaga proporsi gambar */
            margin-bottom: 5px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
        .footer-table {
            width: 100%;
            margin-top: 20px;
        }
        .footer-table td {
            text-align: center;
            padding-top: 40px;
        }
    </style>
</head>
<body>
    <div class="header">
        <table class="header-table">
            <tr>
                <td rowspan="2" style="width: 15%; text-align: center;">
                    <img src="{{ public_path('images/logo-brin.png') }}" alt="BRIN Logo" class="logo">
                </td>
                <td class="header-text">DIREKTORAT PENGELOLAAN KOLEKSI ILMIAH</td>
            </tr>
            <tr>
                <td class="header-text">ANATOMI MAKROSKOPIS</td>
            </tr>
        </table>
        <p>Formulir 10</p>
    </div>

    <table>
        <thead>
            <tr>
                <th colspan="2">Nomor</th>
                <th rowspan="2">Tanggal</th>
                <th rowspan="2">Nama Jenis</th>
                <th rowspan="2">Suku</th>
                <th colspan="3">Trapesium</th>
                <th rowspan="2">Keterangan</th>
                <th rowspan="2">Pelaksana</th>
            </tr>
            <tr>
                <th>Urut</th>
                <th>Koleksi</th>
                <th>Tangen</th>
                <th>Radial</th>
                <th>Transversal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($amakro as $index => $makro)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $makro->tanaman->no_ketukan }}</td>
                    <td>{{ $makro->created_at->format('d-m-Y') }}</td>
                    <td>{{ $makro->tanaman->jenis }}</td>
                    <td>{{ $makro->tanaman->famili }}</td>
                    <td class="images">
                        @if ($makro->tangen_images)
                            @foreach (json_decode($makro->tangen_images) as $img_index => $image)
                                <img src="{{ public_path('storage/' . $image) }}" alt="{{ $makro->tanaman->jenis . ' ' . ($img_index + 1) }}">
                                <hr>
                            @endforeach
                        @else
                            <p>No Images</p>
                        @endif
                    </td>
                    <td class="images">
                        @foreach (json_decode($makro->radial_images) as $img_index => $image)
                            <img src="{{ public_path('storage/' . $image) }}" alt="{{ $makro->tanaman->jenis . ' ' . ($img_index + 1) }}">
                            <hr>
                        @endforeach
                    </td>
                    <td class="images">
                        @foreach (json_decode($makro->transversal_images) as $img_index => $image)
                            <img src="{{ public_path('storage/' . $image) }}" alt="{{ $makro->tanaman->jenis . ' ' . ($img_index + 1) }}">
                            <hr>
                        @endforeach
                    </td>
                    <td>{{ $makro->keterangan }}</td>
                    <td>{{ $makro->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
