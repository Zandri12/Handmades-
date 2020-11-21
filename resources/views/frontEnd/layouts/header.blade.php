<header id="header"><!--header-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{url('/')}}"><img src="{{asset('img/tags.png')}}" height="40px" width="200px" alt="" /></a>
                    </div>
                   
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @php
                            $cart =App\Cart_model::all()->count();
                            
                            @endphp
                        @if ($cart == 0)
                        <li><a href="{{url('/viewcart')}}"><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
                        @else
                        <li><a href="{{url('/viewcart')}}"><i class="fa fa-shopping-cart"></i> Keranjang <span class="badge badge-success" > {{$cart}}</span></a></li>
                        @endif
                           
                            @if(Auth::check())
                                <li><a href="{{url('/myaccount')}}"><i class="fa fa-user"></i> Akun Saya</a></li>
                                @if (Auth::user()->penjual == 1)
                                <li><a href="/main"><i class="fa fa-tag"></i> Jual Produk</a></li>
                                @endif
                                @if (Auth::user()->admin == 1 || Auth::user()->id == 1)
                                <li><a href="/main"><i class="fa fa-users"></i> Admin</a></li>
                                @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-lock"></i> Keluar </a>
                                </li>
                            @else
                                <li><a href="{{url('/login_page')}}"><i class="fa fa-lock"></i> Masuk</a></li>
                            @endif
                        </ul>
                    </div>
                   
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        {{-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button> --}}
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('/')}}" class="active">Beranda</a></li>
                            <li class="dropdown"><a href="#">Belanja<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{url('/list-products')}}">Produk</a></li>
                                    <li><a href="{{url('/myaccount')}}">Akun</a></li>
                                    <li><a href="{{url('/viewcart')}}">Keranjang</a></li>
                                </ul>
                            </li>
                            <li><a href="#" target="_blank">Kontak</a></li>
                           
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
  
</header><!--/header-->