<!-- need to remove -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Beranda</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('barang/index')}}">
        <i class="fas fa-fw fa-clipboard"></i>
        <span>Barang</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('kategori/index')}}">
        <i class="fas fa-fw fa-clipboard-list"></i>
        <span>Kategori</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('jenis/index')}}">
        <i class="fas fa-fw fa-list"></i>
        <span>Jenis</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('detail-barang/index')}}">
        <i class="fas fa-fw fa-receipt"></i>
        <span>Detail Barang</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('supplier/index')}}">
        <i class="fas fa-fw fa-truck"></i>
        <span>Supplier</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('transaksi/pembelian/index')}}">
        <i class="fas fa-fw fa-money-bill"></i>
        <span>Transaksi Pembelian</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('penjualan/index')}}">
        <i class="fas fa fa-shopping-cart"></i>
        <span>Transkasi Penjualan</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('laporan/index')}}">
        <i class="fas fa fa-file"></i>
        <span>Laporan</span>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>
</li>