@extends('layouts.app',[
'title' => 'Form Barang',
'pageTitle' => 'Form Barang',
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
                <h1>Form Barang</h1>
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
                        <h3 class="card-title">Masukan Data Barang</h3>
                    </div>
                    <form id="quickForm" action="{{route('barang/edit/post',$barang->kode_barang)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="floatingInput">Kode Barang</label>
                                <input readonly type="text" name="kode_barang" class="form-control @error('kode_barang')is-invalid @enderror" id="kode_barang" required value="{{$kode_barang}}">
                                @error('kode_barang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control @error('nama_barang')is-invalid @enderror" id="nama_barang" required value="{{$barang->nama_barang}}" onchange="reSum();">
                                @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <label for="kode_jenis">Kode Jenis</label>
                                <input type="text" name="kode_jenis" class="form-control @error('kode_jenis')is-invalid @enderror" id="kode_jenis" required value="{{$barang->kode_jenis}}">
                                @error('kode_jenis')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <label for="floatingInput">Satuan</label>
                                <input type="text" name="satuan" class="form-control @error('satuan')is-invalid @enderror" id="satuan" required value="{{$barang->satuan}}">
                                @error('satuan')
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