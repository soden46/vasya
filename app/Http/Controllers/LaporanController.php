<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\Barang;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\Pembelian;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\File;

class LaporanController extends Controller
{
    public function LaporanIndex(Request $request)
    {
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
        if (!empty($request["start_date"]) && !empty($request["end_date"])) {
            $laporan = DB::table('transaksi_penjualan as a')
                ->select('a.*', 'b.kode_jenis', 'b.satuan', 'c.kode_kategori')
                ->join('barang as b', 'a.kode_barang', '=', 'b.kode_barang')
                ->join('jenis as c', 'b.kode_jenis', '=', 'c.kode_jenis')
                ->join('kategori as d', 'c.kode_kategori', '=', 'd.kode_kategori')
                ->where('a.tanggal', '>=', $start_date)
                ->where('a.tanggal', '<=', $end_date)
                ->paginate(5);

            return view('admin.Laporan.index', compact('laporan'));
        } elseif (!empty($request["start_date"]) && empty($request["end_date"])) {
            $laporan = DB::table('transaksi_penjualan as a')
                ->select('a.*', 'b.kode_jenis', 'b.satuan', 'c.kode_kategori')
                ->join('barang as b', 'a.kode_barang', '=', 'b.kode_barang')
                ->join('jenis as c', 'b.kode_jenis', '=', 'c.kode_jenis')
                ->join('kategori as d', 'c.kode_kategori', '=', 'd.kode_kategori')
                ->where('a.tanggal', '>=', $start_date)
                ->paginate(5);

            return view('admin.Laporan.index', compact('laporan'));
        } else {
            $laporan = DB::table('transaksi_penjualan as a')
                ->select('a.*', 'b.kode_jenis', 'b.satuan', 'c.kode_kategori')
                ->join('barang as b', 'a.kode_barang', '=', 'b.kode_barang')
                ->join('jenis as c', 'b.kode_jenis', '=', 'c.kode_jenis')
                ->join('kategori as d', 'c.kode_kategori', '=', 'd.kode_kategori')
                ->paginate(5);

            return view('admin.Laporan.index', compact('laporan'));
        }
    }
    public function LaporanPDF(Request $request)
    {
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
        if (!empty($request["start_date"]) && !empty($request["end_date"])) {
            $laporan = DB::table('transaksi_penjualan as a')
                ->select('a.*', 'b.kode_jenis', 'b.satuan', 'c.kode_kategori')
                ->join('barang as b', 'a.kode_barang', '=', 'b.kode_barang')
                ->join('jenis as c', 'b.kode_jenis', '=', 'c.kode_jenis')
                ->join('kategori as d', 'c.kode_kategori', '=', 'd.kode_kategori')
                ->where('a.tanggal', '>=', $start_date)
                ->where('a.tanggal', '<=', $end_date)
                ->get();

            $currentTime = Carbon::now();
            $tgl = $currentTime->toDateString();
            $pdfPengiriman = FacadePdf::loadView('Admin.Laporan.PDF.index', compact('laporan', 'tgl'))->setPaper('a4', 'portrait');
            return $pdfPengiriman->stream('laporan' . '.pdf');
        } elseif (!empty($request["start_date"]) && empty($request["end_date"])) {
            $laporan = DB::table('transaksi_penjualan as a')
                ->select('a.*', 'b.kode_jenis', 'b.satuan', 'c.kode_kategori')
                ->join('barang as b', 'a.kode_barang', '=', 'b.kode_barang')
                ->join('jenis as c', 'b.kode_jenis', '=', 'c.kode_jenis')
                ->join('kategori as d', 'c.kode_kategori', '=', 'd.kode_kategori')
                ->where('a.tanggal', '>=', $start_date)
                ->get();

            $currentTime = Carbon::now();
            $tgl = $currentTime->toDateString();
            $pdfPengiriman = FacadePdf::loadView('Admin.Laporan.PDF.index', compact('laporan', 'tgl'))->setPaper('a4', 'portrait');
            return $pdfPengiriman->stream('laporan' . '.pdf');
        } else {
            $laporan = DB::table('transaksi_penjualan as a')
                ->select('a.*', 'b.kode_jenis', 'b.satuan', 'c.kode_kategori')
                ->join('barang as b', 'a.kode_barang', '=', 'b.kode_barang')
                ->join('jenis as c', 'b.kode_jenis', '=', 'c.kode_jenis')
                ->join('kategori as d', 'c.kode_kategori', '=', 'd.kode_kategori')
                ->get();

            $currentTime = Carbon::now();
            $tgl = $currentTime->toDateString();
            $pdfPengiriman = FacadePdf::loadView('Admin.Laporan.PDF.index', compact('laporan', 'tgl'))->setPaper('a4', 'portrait');
            return $pdfPengiriman->stream('laporan' . '.pdf');
        }
    }
}
