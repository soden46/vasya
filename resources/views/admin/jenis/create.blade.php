@extends('layouts.app',[
'title' => 'Form Jenis',
'pageTitle' => 'Form Jenis',
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
                <h1>Form Jenis</h1>
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
                        <h3 class="card-title">Masukan Data Jenis</h3>
                    </div>
                    <form id="quickForm" action="{{route('jenis/create/post')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="kode_jenis">Kode Jenis</label>
                                <input type="text" name="kode_jenis" class="form-control @error('kode_jenis')is-invalid @enderror" id="kode_jenis" required value="{{old('kode_jenis')}}" onchange="reSum();">
                                @error('kode_jenis')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Nama Jenis</label>
                                <input type="text" name="nama_jenis" class="form-control @error('nama_jenis')is-invalid @enderror" id="nama_jenis" required value="{{old('nama_jenis')}}" onchange="reSum();">
                                @error('nama_jenis')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Kode Kategori</label>
                                <input type="text" name="kode_kategori" class="form-control @error('kode_kategori')is-invalid @enderror" id="kode_kategori" required value="{{old('kode_kategori')}}" onchange="reSum();">
                                @error('kode_kategori')
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