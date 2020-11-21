<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>Hand</span>mades+</h1>
                                <p>Berbagai jenis Kerajinan Tangan  bisa ditemukan disini!!</p>
                                <a href="/list-products" class="btn btn-default get">Belanja Sekarang</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('frontEnd/images/home/tas.jpg')}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                               <h1><span>Hand</span>mades+</h1>
                                <p>Semua Kerajinan Tangan yang Ada di Lima Puluh Kota </p>
                                <a href="/list-products" class="btn btn-default get">Belanja Sekarang</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('frontEnd/images/home/keranjang.jpg')}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                               <h1><span>Hand</span>mades+</h1>
                                <p>Cintai Produk dalam Negeri </p>
                                <a href="/list-products" class="btn btn-default get">Belanja Sekarang</a>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('frontEnd/images/home/gelang.jpg')}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->