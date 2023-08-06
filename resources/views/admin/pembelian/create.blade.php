@extends('layouts.app',[
'title' => 'Form Transaksi Pembelian',
'pageTitle' => 'Form Transaksi Pembelian',
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
                <h1>Form Transaksi Pembelian</h1>
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
                        <h3 class="card-title">Masukan Data Transaksi Pembelian</h3>
                    </div>
                    <form id="quickForm" action="{{route('pembelian/create/post')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="floatingInput">ID Transaksi Pembelian</label>
                                <input type="text" name="id_transaksi_pembelian" class="form-control @error('id_transaksi_pembelian')is-invalid @enderror" id="id_transaksi_pembelian" required value="{{old('id_transaksi_pembelian')}}" onchange="reSum();">
                                @error('id_transaksi_pembelian')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control @error('kode_barang')is-invalid @enderror" id="kode_barang" required value="{{old('kode_barang')}}" onchange="reSum();">
                                @error('kode_barang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <label for="floatingInput">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control @error('nama_barang')is-invalid @enderror" id="nama_barang" required value="{{old('nama_barang')}}" onchange="reSum();">
                                @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <label for="floatingInput">Jumlah</label>
                                <input type="text" name="jumlah" class="form-control @error('jumlah')is-invalid @enderror" id="jumlah" required value="{{old('jumlah')}}" onchange="reSum();">
                                @error('jumlah')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <label for="floatingInput">Harga</label>
                                <input type="text" name="harga" class="form-control @error('harga')is-invalid @enderror" id="harga" required value="{{old('harga')}}" onchange="reSum();">
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-12" type="submit">Simpan</button>
                        </div>
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
        var num2 = parseInt(document.getElementById("biaya_pengiriman").value);
        document.getElementById("sub_total_pengiriman").value = num1 + num2;

    }
</script>

@endsection