@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">

        <div class="row d-flex justify-content-between">

            <div class="card text-white bg-info col-sm-4" style="max-width: 18rem;">
                <a href="{{route('barang/create')}}" class="btn stretched-link">
                    <div class="card-header">Input Barang</div>
                    <div class="card-body">
                    </div>
                </a>
            </div>
            <div class="card text-white bg-info col-sm-4" style="max-width: 18rem;">
                <a href="{{route('kategori/create')}}" class="btn stretched-link">
                    <div class="card-header">Input Kategori</div>
                    <div class="card-body">
                    </div>
                </a>
            </div>
            <div class="card text-white bg-info col-sm-4" style="max-width: 18rem;">
                <a href="{{route('jenis/create')}}" class="btn stretched-link">
                    <div class="card-header">Input Jenis</div>
                    <div class="card-body">
                    </div>
                </a>
            </div>
            <div class="card text-white bg-info col-sm-4" style="max-width: 18rem;">
                <a href="{{route('detail/create')}}" class="btn stretched-link">
                    <div class="card-header">Input Detail Barang</div>
                    <div class="card-body">
                    </div>
                </a>
            </div>
            <div class="card text-white bg-info col-sm-4" style="max-width: 18rem;">
                <a href="{{route('supplier/create')}}" class="btn stretched-link">
                    <div class="card-header">Input Supplier</div>
                    <div class="card-body">
                    </div>
                </a>
            </div>
            <div class="card text-white bg-info col-sm-4" style="max-width: 18rem;">
                <a href="{{route('pembelian/create')}}" class="btn stretched-link">
                    <div class="card-header">Input Transaksi Pembelian</div>
                    <div class="card-body">
                    </div>
                </a>
            </div>
            <div class="card text-white bg-info col-sm-4" style="max-width: 18rem;">
                <a href="{{route('penjualan/create')}}" class="btn stretched-link">
                    <div class="card-header">Input Transaksi Penjualan</div>
                    <div class="card-body">
                    </div>
                </a>
            </div>
        </div>

    </div>
</section>
@endsection