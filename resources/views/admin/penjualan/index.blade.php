@extends('layouts.app',[
'title' => 'Data Transaksi Penjualan',
'pageTitle' => 'Data Transaksi Penjualan'
])
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tabel Data Transaksi Penjualan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content d-flex justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Transaksi Penjualan</h3>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <a class="btn btn-primary mb-3" href="{{ route('penjualan/create') }}"><i class="fas fa-fw fa-plus"></i>Tambah</a>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering ID Penjualan: activate to sort column descending">ID Transaksi Penjualan</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Nama Barang: activate to sort column ascending">Kode Barang</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Nama Customer: activate to sort column ascending">Nama Barang</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Tanggal Beli: activate to sort column ascending">Tanggal</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Harga: activate to sort column ascending">Harga</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Total Pembelian: activate to sort column ascending">Qty</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Aksi: activate to sort column ascending">Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($penjualan as $data)
                                    <tbody>
                                        <tr>
                                            <td>{{ $data->id_transaksi_penjualan }}</td>
                                            <td>{{ $data->kode_barang }}</td>
                                            <td>{{ $data->nama_barang}}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->harga }}</td>
                                            <td>{{ $data->Qty }}</td>
                                            <td>
                                                <div class="btn-group" style="width:135px">
                                                    <form action="{{ route('penjualan/hapus',$data->id_transaksi_penjualan) }}" method="POST">
                                                        <a class="btn btn-primary" href="{{ route('penjualan/edit',$data->id_transaksi_penjualan) }}">Edit</a>
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row text-center">
                                    <div>
                                        {!! $penjualan->links() !!}
                                    </div>
                                </div>


                                @endsection