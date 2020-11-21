<!--sidebar-menu-->
<div id="sidebar"><a href="{{url('/admin')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        @if (Auth::user()->penjual == 1)
        <li {{$menu_active==1? ' class=active':''}}><a href="{{url('/admin')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu {{$menu_active==2? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Kategori</span></a>
            <ul>
                <li><a href="{{url('/admin/category/create')}}">Tambah Kategori Produk</a></li>
                <li><a href="{{route('category.index')}}">Daftar Kategori</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==3? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Produk</span></a>
            <ul>
                <li><a href="{{url('/admin/product/create')}}">TambahProduk</a></li>
                <li><a href="{{route('product.index')}}">Daftar Produk</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==4? ' active':''}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Kupon</span></a>
            <ul>
                <li><a href="{{route('coupon.create')}}">Tambah Coupon</a></li>
                <li><a href="{{route('coupon.index')}}">Daftar Kupon</a></li>
            </ul>
        </li>
        <li class="submenu {{$menu_active==5? ' active':''}}"> <a href="#"><i class="icon icon-shopping-cart"></i> <span>Pemesanan</span></a>
            <ul>
                <li><a href="/data">Data Pemesanan</a></li>
            </ul>
        </li>
        @endif
        @if (Auth::user()->admin == 1)
        <li {{$menu_active==1? ' class=active':''}}><a href="{{url('/admin')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="submenu {{$menu_active==5? ' active':''}}"> <a href="#"><i class="icon icon-user"></i> <span>Admin</span></a>
            <ul>
                <li><a href="/users">Akun</a></li>
                <li><a href="/data_pembelian">Data Pembelian</a></li>
            </ul>
        </li>
      
 
        @endif
    </ul>
</div>
<!--sidebar-menu-->