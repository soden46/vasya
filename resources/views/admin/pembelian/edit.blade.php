@extends('layouts.app',[
'title' => 'Form Data Pembelian',
'pageTitle' => 'Form Data Pembelian',
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
                <h1>Form Data Pembelian</h1>
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
                        <h3 class="card-title">Masukan Data Pembelian</h3>
                    </div>
                    <form id="quickForm" action="{{route('pembelian/edit/post',$pembelian->id_transaksi_pembelian)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="id_transaksi_pembelian">ID Trasnsaksi Pembelian</label>
                                <input type="text" name="id_transaksi_pembelian" class="form-control @error('id_transaksi_pembelian')is-invalid @enderror" id="floatingInput" placeholder="id transaksi pembelian" readonly required value="{{$pembelian->id_transaksi_pembelian}}" readonly>
                                @error('id_transaksi_pembelian')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control @error('kode_barang')is-invalid @enderror" id="floatingInput" placeholder="Kode Barang" required value="{{$pembelian->kode_barang}}" readonly>
                                @error('kode_barang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control @error('nama_barang')is-invalid @enderror" id="floatingInput" placeholder="Nama Barang" required value="{{$pembelian->nama_barang}}">
                                @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control @error('jumlah')is-invalid @enderror" id="floatingInput" placeholder="Jumlah" required value="{{$pembelian->jumlah}}" onchange="reSum();">
                                @error('jumlah')
                                <div class=" invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Harga</label>
                                <input class="form-control @error('harga')is-invalid @enderror" type="text" id="harga" name="harga" placeholder="Masukan Harga" required value="{{$pembelian->harga}}" onchange="reSum();">
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mt-12" type="submit">Simpan</button>
                            <div class="card-body">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<script>
    function reSum() {
        var num1 = parseInt(document.getElementById("harga").value);
        var num2 = parseInt(document.getElementById("banyak_beli").value);
        document.getElementById("total_pembelian").value = num1 * num2;

    }
</script>
@endsection