<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <style>
        body {
            font-size: 12px;
            font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
        }

        .table,
        .td,
        .th,
        thead {
            border: 1px solid black;
            text-align: center
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .text-center {
            text-align: center;
        }

        .text-success {
            color: green
        }

        .text-danger {
            color: red
        }

        .fw-bold {
            font-weight: bold
        }

        .tandatangan {

            text-align: center;
            margin-left: 400px;

        }

        .header img {
            float: left;
            width: 100px;
            height: 100px;
            background: transparent;
        }

        .header h1 {
            font-size: 18px;
            font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
            position: relative;
            top: 5px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <div class="header mb-3">
                <img src="{{ public_path('storage/logo/logopdf.png') }}" alt="" width="42px" height="42px" />
                <h1 class="text-center">SRI ANDHINI SAKTI<br>
                    <P class="text-center">Jalan Diponegoro, Pasar Kranggan Ruko No.159, Gowongan, Kec. Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233</P>
                    <h1 class="text-center">LAPORAN</h1>
                </h1>
            </div>
            <table class=" table table-bordered" style="table-layout: fixed">
                <tr class="font-12">
                    <th style="width: 90px">Kode Kategoti</th>
                    <th style="width: 90px">Kode Jenis</th>
                    <th style="width: 90px">Nama Jenis</th>
                    <th style="width: 200px">Jumlah</th>
                    <th style="width: 200px">Satuan</th>
                    <th style="width: 200px">Harga</th>
                    <th style="width: 200px">Tanggal</th>
                </tr>
                @foreach ($laporan as $data)
                <tr>
                    <td>{{ $data->kode_kategori }}</td>
                    <td>{{ $data->kode_jenis }}</td>
                    <td>{{ $data->nama_barang}}</td>
                    <td>{{ $data->Qty}}</td>
                    <td>{{ $data->satuan}}</td>
                    <td>{{ $data->harga }}</td>
                    <td>{{ $data->tanggal }}</td>
                </tr>
                @endforeach
            </table>
            <div class=" tandatangan">

                <br>

                <p style="padding-bottom:25px">
                    Jogja, {!!$tgl!!}</p>


                <p>{{Auth::user()->nama}}</p>
            </div>
        </div>
    </div>
</body>

</html>