@extends('layouts.app',[
'title' => 'Form Transaksi Penjualan',
'pageTitle' => 'Form Transaksi Penjualan'
])
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Transaksi Penjualan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Masukan Transaksi Penjualan</h3>
                    </div>
                    <form id="quickForm" action="{{route('penjualan/edit/post',$penjualan->id_transaksi_penjualan)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="floatingInput">ID Transaksi Penjualan</label>
                                <input type="text" name="id_transaksi_penjualan" class="form-control @error('id_transaksi_penjualan')is-invalid @enderror" id="floatingInput" placeholder="ID Transaksi Penjualan" required value="{{$penjualan->id_transaksi_penjualan}}" readonly>
                                @error('id_transaksi_penjualan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" class="form-control" id="floatingInput" id="kode_barang" name="kode_barang" value="{{$penjualan->kode_barang}}" readonly>
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Nama Barang</label>
                                <input class="form-control @error('nama_barang')is-invalid @enderror" type="text" id="nama_barang" name="nama_barang" value="{{$penjualan->nama_barang}}">
                                @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Tanggal</label>
                                <input class="form-control @error('tanggal')is-invalid @enderror" type="date" id="tanggal" name="tanggal" required value="{{$penjualan->tanggal}}" onchange="reSum();">
                                @error('tanggal')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Harga</label>
                                <input class="form-control @error('harga')is-invalid @enderror" type="number" id="harga" name="harga" required value="{{$penjualan->harga}}" onchange="reSum();">
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Qty</label>
                                <input class="form-control @error('Qty')is-invalid @enderror" type="number" id="Qty" name="Qty" required value="{{$penjualan->Qty}}" onchange="reSum();">
                                @error('Qty')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            </br>
                            <button class="btn btn-primary mt-12" type="submit">Edit Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function reSum() {
            var num1 = parseInt(document.getElementById("banyak_beli").value);
            var num2 = parseInt(document.getElementById("harga").value);
            document.getElementById("total_pembelian").value = num1 * num2;

        }
    </script>
    @endsection