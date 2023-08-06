@extends('layouts.app',[
'title' => 'Form Data Supplier',
'pageTitle' => 'Form Data Supplier'
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
                <h1>Form Data Supplier</h1>
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
                        <h3 class="card-title">Masukan Data Supplier</h3>
                    </div>
                    <form id="quickForm" action="{{route('supplier/create/post')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="floatingInput">ID Supplier</label>
                                <input type="text" name="Id_Supplier" class="form-control @error('Id_Supplier')is-invalid @enderror" id="floatingInput" placeholder="ID Supplier" required value="{{old('Id_Supplier')}}">
                                @error('Id_Supplier')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Nama Supplier</label>
                                <input type="text" name="Nama_Supplier" class="form-control @error('Nama_Supplier')is-invalid @enderror" id="floatingInput" placeholder="Nama Supplier" required value="{{old('Nama_Supplier')}}">
                                @error('Nama_Supplier')
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
    @endsection