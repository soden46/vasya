@extends('layouts.app',[
'title' => 'Form Detail Barang',
'pageTitle' => 'Form Detail Barang',
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
                <h1>Form Detail Barang</h1>
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
                        <h3 class="card-title">Masukan Data Detail Barang</h3>
                    </div>
                    <form id="quickForm" action="{{route('detail/create/post')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="floatingInput">Kode Detail Barang</label>
                                <input type="text" name="kode_detail_barang" class="form-control @error('kode_detail_barang')is-invalid @enderror" id="kode_detail_barang" required value="{{old('kode_detail_barang')}}">
                                @error('kode_detail_barang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control @error('kode_barang')is-invalid @enderror" id="kode_barang" required value="{{old('kode_barang')}}">
                                @error('kode_barang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Size</label>
                                <input type="text" name="size" class="form-control @error('size')is-invalid @enderror" id="size" required value="{{old('size')}}" onchange="reSum();">
                                @error('size')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <label for="Qty">Qty</label>
                                <input type="text" name="Qty" class="form-control @error('Qty')is-invalid @enderror" id="Qty" required value="{{old('Qty')}}" onchange="reSum();">
                                @error('Qty')
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