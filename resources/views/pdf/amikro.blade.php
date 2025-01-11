<!DOCTYPE html>
<html>
<head>
    <title>Dokumentasi Anatomi Mikroskopis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }
        h1 {
            text-align: center;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: center;
            padding: 5px;
        }
        img {
            width: 50px;
            height: auto;
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
                <th rowspan="2" colspan="2">Nomor</th>
                <th rowspan="3">Tanggal</th>
                <th rowspan="3">Nama Jenis</th>
                <th rowspan="3">Suku</th>
                <th colspan="9" class="text-center">Kegiatan Mikroskopis</th>
                <th rowspan="3">Keterangan</th>
                <th rowspan="3">Pelaksana</th>
            </tr>
            <tr>
                <th colspan="3">Preparat Sayatan</th>
                <th colspan="6">Preparat Serat</th>
            </tr>
            <tr>
                <th>Urut</th>
                <th>Koleksi</th>
                <th>Tangen</th>
                <th>Radial</th>
                <th>Transversal</th>
                <th>Panjang Serat</th>
                <th>Diameter Serat</th>
                <th>Diameter Lumen</th>
                <th>Tebal Dinding</th>
                <th>Diameter Pembuluh</th>
                <th>Panjang Pembuluh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($amikro as $index => $amikros)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $amikros->tanaman->no_ketukan }}</td>
                <td>{{ $amikros->created_at->format('d-m-Y') }}</td>
                <td>{{ $amikros->tanaman->jenis }}</td>
                <td>{{ $amikros->tanaman->famili }}</td>
                <td>
                    <img src="{{ public_path('storage/' . $amikros->kegiatan_sayatan_tangen) }}" alt="Tangen">
                </td>
                <td>
                    <img src="{{ public_path('storage/' . $amikros->kegiatan_sayatan_radial) }}" alt="Radial">
                </td>
                <td>
                    <img src="{{ public_path('storage/' . $amikros->kegiatan_sayatan_transversal) }}" alt="Transversal">
                </td>
                <td>
                    <img src="{{ public_path('storage/' . $amikros->kegiatan_serat_panjang) }}" alt="Panjang Serat">
                </td>
                <td>
                    <img src="{{ public_path('storage/' . $amikros->kegiatan_serat_diameter) }}" alt="Diameter Serat">
                </td>
                <td>
                    <img src="{{ public_path('storage/' . $amikros->kegiatan_serat_diameterLumen) }}" alt="Diameter Lumen">
                </td>
                <td>
                    <img src="{{ public_path('storage/' . $amikros->kegiatan_serat_dindingSerat) }}" alt="Tebal Dinding">
                </td>
                <td>
                    <img src="{{ public_path('storage/' . $amikros->kegiatan_serat_diameterPembuluh) }}" alt="Diameter Pembuluh">
                </td>
                <td>
                    <img src="{{ public_path('storage/' . $amikros->kegiatan_serat_panjangPembuluh) }}" alt="Panjang Pembuluh">
                </td>
                <td>{{ $amikros->keterangan }}</td>
                <td>{{ $amikros->user->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
