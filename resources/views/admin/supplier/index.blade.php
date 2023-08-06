@extends('layouts.app',[
'title' => 'Data Supplier',
'pageTitle' => 'Data Supplier'
])
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tabel Data Supplier</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
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
                    <h3 class="card-title">Data Supplier</h3>
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
                        <a class="btn btn-primary mb-3" href="{{ route('supplier/create') }}"><i class="fas fa-fw fa-plus"></i>Tambah</a>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering ID Supplier: activate to sort column descending">ID Supplier</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Nama Supplier: activate to sort column ascending">Nama Supplier</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Aksi: activate to sort column ascending">Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($supplier as $data)
                                    <tbody>
                                        <tr>
                                            <td>{{ $data->Id_Supplier }}</td>
                                            <td>{{ $data->Nama_Supplier }}</td>
                                            <td>
                                                <div class="btn-group" style="width:135px">
                                                    <form action="{{ route('supplier/hapus',$data->Id_Supplier) }}" method="POST">
                                                        <a class="btn btn-primary" href="{{ route('supplier/edit',$data->Id_Supplier) }}">Edit</a>
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
                                        {!! $supplier->links() !!}
                                    </div>
                                </div>


                                @endsection