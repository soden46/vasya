@extends('layouts.app',[
'title' => 'Laporan ',
'pageTitle' => 'Laporan '
])
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tabel Laporan</h1>
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
                    <form action="/Laporan" method="GET" class="d-flex justify-content-start px-2">
                        <span>Filter Tanggal Laporan</span>
                        <div class="form-row px-2">
                            <input type="date" class="form-control col-3 px-4 start_date" name="start_date" id="start_date" value="{{old('start_date')}}">
                            <div class="px-2">
                                <span> S/D </span>
                            </div>
                            <input type="date" class="form-control col-3 -4 end_date" name="end_date" id="end_date">
                            <div class="px-2"></div>
                            <div class="px-2">
                                <button class="btn btn-primary" type="submit">Pilih</button>
                            </div>
                        </div>
                    </form>
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
                        <div class="row">

                            <div class="col-sm-12">
                                <table id="dataTable" name="dataTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 90px">Kode Kategoti</th>
                                            <th style="width: 90px">Kode Jenis</th>
                                            <th style="width: 90px">Nama Jenis</th>
                                            <th style="width: 200px">Jumlah</th>
                                            <th style="width: 200px">Satuan</th>
                                            <th style="width: 200px">Harga</th>
                                            <th style="width: 200px">Tanggal</th>
                                        </tr>
                                    </thead>
                                    @foreach ($laporan as $data)
                                    <tbody>
                                        <tr>
                                            <td>{{ $data->kode_kategori }}</td>
                                            <td>{{ $data->kode_jenis }}</td>
                                            <td>{{ $data->nama_barang}}</td>
                                            <td>{{ $data->Qty}}</td>
                                            <td>{{ $data->satuan}}</td>
                                            <td>{{ $data->harga }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <form action="{{ route('laporanpdf') }}" method="GET" class="d-flex justify-content-end px-2">
                                    <span>Filter Tanggal PDF</span>
                                    <div class="form-row px-2">
                                        <input type="date" class="form-control col-3 px-4 start_date" name="start_date" id="start_date" value="{{old('start_date')}}">
                                        <div class="px-2">
                                            <span> S/D </span>
                                        </div>
                                        <input type="date" class="form-control col-3 -4 end_date" name="end_date" id="end_date">
                                        <div class="px-2"></div>
                                        <div class="px-2">
                                            <button class="btn btn-success" type="submit"><i class="fa fa-print"></i>Cetak PDF</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="row text-center">
                                    {!! $laporan->links() !!}
                                </div>
                                <script type="text/javascript">
                                    var minDate, maxDate;

                                    // Custom filtering function which will search data in column four between two values
                                    $.fn.dataTable.ext.search.push(
                                        function(settings, data, dataIndex) {
                                            var min = minDate.val();
                                            var max = maxDate.val();
                                            var date = new Date(data[4]);

                                            if (
                                                (min === null && max === null) ||
                                                (min === null && date <= max) ||
                                                (min <= date && max === null) ||
                                                (min <= date && date <= max)
                                            ) {
                                                return true;
                                            }
                                            return false;
                                        }
                                    );

                                    $(document).ready(function() {
                                        // Create date inputs
                                        minDate = new DateTime($('#min'), {
                                            format: 'yyyy-mm-dd'
                                        });
                                        maxDate = new DateTime($('#max'), {
                                            format: 'yyyy-mm-dd'
                                        });

                                        // DataTables initialisation
                                        var table = $('#dataTable').DataTable();

                                        // Refilter the table
                                        $('#min, #max').on('change', function() {
                                            table.draw();
                                        });
                                    });

                                    //datepicker
                                    $(function() {
                                        $(".datepicker").datepicker({
                                            format: 'yyyy-mm-dd',
                                            autoclose: true,
                                            todayHighlight: true,
                                        });
                                    });
                                </script>
                                @endsection