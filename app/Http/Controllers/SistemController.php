<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\Pembelian;
use App\Models\Customer;
use App\Models\Barang;
use App\Models\BahanBaku;
use App\Models\DetailBarang;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class SistemController extends Controller
{
    public function barangIndex()
    {
        $barang = Barang::paginate(5);
        return view('admin.barang.index', compact('barang'));
    }
    public function barangCreate()
    {
        $jenis = Jenis::get();
        return view('admin.barang.create', compact('jenis'));
    }
    public function barangCreatePost(Request $request)
    {
        $ValidatedData = $request->validate([
            'kode_barang' => ['required'],
            'nama_barang' => ['required'],
            'kode_jenis' => ['required'],
            'satuan' => ['required']
        ]);

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kode_jenis' => $request->kode_jenis,
            'satuan' => $request->satuan
        ]);
        return redirect('barang')->with('success', 'Data Barang Sukses Ditambahkan');
    }
    public function barangEdit(Request $request, $kode_barang)
    {
        $kdbarang = Barang::find($kode_barang);
        $barang = Barang::find($kode_barang);
        return view('admin.barang.edit', compact('barang', 'kode_barang'));
    }
    public function barangEditPost(Request $request, $kode_barang)
    {
        $kode_barang = $request->kode_barang;
        $ValidatedData = $request->validate([
            'kode_barang' => ['required'],
            'nama_barang' => ['required'],
            'kode_jenis' => ['required'],
            'satuan' => ['required']
        ]);

        Barang::find($kode_barang)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kode_jenis' => $request->kode_jenis,
            'satuan' => $request->satuan
        ]);
        return redirect('barang')->with('success', 'Data Barang Sukses Diubah');
    }
    public function barangHapus(Request $request, $kode_barang)
    {
        $kode_barang = $request->kode_barang;
        Barang::where('kode_barang', '=', $kode_barang)->delete();
        return back()->with('success', 'Data Barang Sukses Ditambahkan');
    }
    public function kategoriIndex()
    {
        $kategori = Kategori::paginate(5);
        return view('admin.kategori.index', compact('kategori'));
    }
    public function kategoriCreate()
    {
        $kategori = Kategori::paginate(5);
        return view('admin.kategori.create', compact('kategori'));
    }
    public function kategoriCreatePost(Request $request)
    {
        $ValidatedData = $request->validate([
            'kode_kategori' => ['required'],
            'nama_kategori' => ['required'],
        ]);

        Kategori::create([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);
        return back()->with('succes', 'Data Kategori Sukses Ditambahkan');
    }
    public function kategoriEdit(Request $request, $kode_kategori)
    {
        $kategori = Kategori::find($kode_kategori);
        return view('admin.kategori.edit', compact('kategori'));
    }
    public function kategoriEditPost(Request $request, $kode_kategori)
    {
        $ValidatedData = $request->validate([
            'kode_kategori' => ['required'],
            'nama_kategori' => ['required'],
        ]);

        Kategori::where('kode_kategori', '=', $kode_kategori)->update([
            'kode_kategori' => $request->kode_kategori,
            'nama_kategori' => $request->nama_kategori,
        ]);
        return back()->with('succes', 'Data Kategori Sukses Ditambahkan');
    }
    public function kategoriHapus(Request $request, $kode_kategori)
    {
        Kategori::where('kode_kategori', '=', $kode_kategori)->delete();
        return redirect('kategori')
            ->with('success', 'Data Kategori Berhasil Dihapus');
    }
    public function jenisIndex()
    {
        $jenis = Jenis::paginate(5);
        return view('admin.jenis.index', compact('jenis'));
    }
    public function jenisCreate()
    {

        return view('admin.jenis.create');
    }
    public function jenisCreatePost(Request $request)
    {
        $ValidatedData = $request->validate([
            'kode_jenis' => ['required'],
            'nama_jenis' => ['required'],
            'kode_kategori' => ['required'],
        ]);

        Jenis::create([
            'kode_jenis' => $request->kode_jenis,
            'nama_jenis' => $request->nama_jenis,
            'kode_kategori' => $request->kode_kategori,
        ]);
        return back()->with('succes', 'Data Kategori Sukses Ditambahkan');
    }
    public function jenisEdit($kode_jenis)
    {
        $jenis = Jenis::find($kode_jenis);
        return view('admin.jenis.edit', compact('jenis'));
    }
    public function jenisEditPost(Request $request, $kode_jenis)
    {
        $ValidatedData = $request->validate([
            'kode_jenis' => ['required'],
            'nama_jenis' => ['required'],
            'kode_kategori' => ['required'],
        ]);

        Jenis::where('kode_jenis', '=', $kode_jenis)->update([
            'kode_jenis' => $request->kode_jenis,
            'nama_jenis' => $request->nama_jenis,
            'kode_kategori' => $request->kode_kategori,
        ]);
        return back()->with('succes', 'Data Kategori Sukses Ditambahkan');
    }
    public function jenisHapus(Request $request, $kode_jenis)
    {
        Jenis::where('kode_jenis', '=', $kode_jenis)->delete();
        return back()
            ->with('success', 'Data Jenis Barang Berhasil Dihapus');
    }
    public function detailIndex()
    {
        $detail = DetailBarang::paginate(5);
        return view('admin.detail.index', compact('detail'));
    }
    public function detailCreate()
    {

        return view('admin.detail.create');
    }
    public function detailCreatePost(Request $request)
    {
        $ValidatedData = $request->validate([
            'kode_detail_barang' => ['required'],
            'kode_barang' => ['required'],
            'size' => ['required'],
            'Qty' => ['required'],
        ]);

        DetailBarang::create([
            'kode_detail_barang' => $request->kode_detail_barang,
            'kode_barang' => $request->kode_barang,
            'size' => $request->size,
            'Qty' => $request->Qty,
        ]);
        return back()->with('succes', 'Data Kategori Sukses Ditambahkan');
    }
    public function detailEdit($kode_detail_barang)
    {
        $detail = DetailBarang::find($kode_detail_barang);
        return view('admin.detail.edit', compact('detail'));
    }
    public function detailEditPost(Request $request, $kode_detail_barang)
    {
        $ValidatedData = $request->validate([
            'kode_detail_barang' => ['required'],
            'kode_barang' => ['required'],
            'size' => ['required'],
            'Qty' => ['required'],
        ]);

        DetailBarang::where('kode_detail_barang', '=', $kode_detail_barang)->update([
            'kode_detail_barang' => $request->kode_detail_barang,
            'kode_barang' => $request->kode_barang,
            'size' => $request->size,
            'Qty' => $request->Qty,
        ]);
        return back()->with('succes', 'Data Kategori Sukses Ditambahkan');
    }
    public function detailHapus(Request $request, $kode_detail_barang)
    {
        DetailBarang::where('kode_detail_barang', '=', $kode_detail_barang)->delete();
        return back()
            ->with('success', 'Data Detail Barang Berhasil Dihapus');
    }

    public function PembelianIndex()
    {
        $pembelian = Pembelian::paginate(5);
        return view('admin.pembelian.index', compact('pembelian'));
    }
    public function PembelianCreate()
    {

        return view('admin.pembelian.create');
    }
    public function PembelianCreatePost(Request $request)
    {
        $ValidatedData = $request->validate([
            'id_transaksi_pembelian' => ['required'],
            'kode_barang' => ['required'],
            'nama_barang' => ['required'],
            'jumlah' => ['required'],
            'harga' => ['required'],
        ]);

        Pembelian::create([
            'id_transaksi_pembelian' => $request->id_transaksi_pembelian,
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);
        return back()->with('succes', 'Data Kategori Sukses Ditambahkan');
    }
    public function PembelianEdit(Request $request, $id_transaksi_pembelian)
    {
        $pembelian = Pembelian::find($id_transaksi_pembelian);
        return view('admin.pembelian.edit', compact('pembelian'));
    }
    public function PembelianEditPost(Request $request, $id_transaksi_pembelian)
    {
        $ValidatedData = $request->validate([
            'id_transaksi_pembelian' => ['required'],
            'kode_barang' => ['required'],
            'nama_barang' => ['required'],
            'jumlah' => ['required'],
            'harga' => ['required'],
        ]);

        Pembelian::where('id_transaksi_pembelian', '=', $id_transaksi_pembelian)->update([
            'id_transaksi_pembelian' => $request->id_transaksi_pembelian,
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);
        return back()->with('success', 'Data Pembelian Berhasil Diupdate');
    }
    public function PembelianHapus(Request $request, $id_transaksi_pembelian)
    {
        Pembelian::where('id_transaksi_pembelian', '=', $id_transaksi_pembelian)->delete();
        return back()
            ->with('success', 'Data Pembelian Berhasil Dihapus');
    }
    public function penjualanIndex()
    {
        $penjualan = Penjualan::paginate(5);
        return view('admin.penjualan.index', compact('penjualan'));
    }
    public function penjualanCreate()
    {
        return view('admin.penjualan.create');
    }
    public function penjualanCreatePost(Request $request)
    {
        $ValidatedData = $request->validate([
            'id_transaksi_penjualan' => ['required'],
            'kode_barang' => ['required'],
            'nama_barang' => ['required'],
            'tanggal' => ['required'],
            'harga' => ['required'],
            'Qty' => ['required'],
        ]);

        Penjualan::create([
            'id_transaksi_penjualan' => $request->id_transaksi_penjualan,
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'tanggal' => $request->tanggal,
            'harga' => $request->harga,
            'Qty' => $request->Qty,
        ]);
        return back()->with('success', 'Data Kategori Sukses Ditambahkan');
    }
    public function penjualanEdit(Request $request, $id_transaksi_penjualan)
    {
        $penjualan = penjualan::find($id_transaksi_penjualan);
        return view('admin.penjualan.edit', compact('penjualan'));
    }
    public function PenjualanEditPost(Request $request, $id_transaksi_penjualan)
    {
        $ValidatedData = $request->validate([
            'id_transaksi_penjualan' => ['required'],
            'kode_barang' => ['required'],
            'nama_barang' => ['required'],
            'tanggal' => ['required'],
            'harga' => ['required'],
            'Qty' => ['required'],
        ]);

        Penjualan::where('id_transaksi_penjualan', '=', $id_transaksi_penjualan)->update([
            'id_transaksi_penjualan' => $request->id_transaksi_penjualan,
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'tanggal' => $request->tanggal,
            'harga' => $request->harga,
            'Qty' => $request->Qty,
        ]);
        return back()->with('success', 'Data Penjualan Sukses Diubah');
    }
    public function PenjualanHapus(Request $request, $id_transaksi_penjualan)
    {
        Penjualan::where('id_transaksi_penjualan', '=', $id_transaksi_penjualan)->delete();
        return back()
            ->with('success', 'Data Penjualan Berhasil Dihapus');
    }
    public function supplierIndex()
    {
        $supplier = Supplier::paginate(5);
        return view('admin.supplier.index', compact('supplier'));
    }
    public function SupplierCreate()
    {
        return view('admin.supplier.create');
    }
    public function SupplierCreateStore(Request $request)
    {
        $ValidatedData = $request->validate([
            'Id_Supplier' => ['required'],
            'Nama_Supplier' => ['required'],
        ]);

        Supplier::create([
            'Id_Supplier' => $request->Id_Supplier,
            'Nama_Supplier' => $request->Nama_Supplier,
        ]);
        return back()->with('succes', 'Data Supplier Sukses Ditambahkan');
    }
    public function SupplierEdit($Id_Supplier)
    {
        $supplier = Supplier::find($Id_Supplier);
        return view('admin.supplier.edit', compact('supplier'));
    }
    public function SupplierEditPost(Request $request, $Id_Supplier)
    {
        $ValidatedData = $request->validate([
            'Id_Supplier' => ['required'],
            'Nama_Supplier' => ['required'],
        ]);

        Supplier::where('Id_Supplier', '=', $Id_Supplier)->update([
            'Id_Supplier' => $request->Id_Supplier,
            'Nama_Supplier' => $request->Nama_Supplier,
        ]);
        return back()->with('success', 'Data Supplier Berhasil Diupdate');
    }
    public function SupplierHapus($Id_Supplier)
    {
        Supplier::find($Id_Supplier)->delete();
        return back()->with('success', 'Data Supplier Berhasil Dihapus');
    }
}
