@extends('backEnd.layouts.master')
@section('title','Homemades+')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/data_pembelian" class="current">Data Pembelian</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Selamat!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Data Pembelian</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email Pembeli</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>No.Hp</th>
                        <th>Metode Pembayaran</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; ?>
                    @foreach($cart as $cart)
                        <?php $i++; ?>
                        <tr class="gradeC">
                            <td>{{$i}}</td>
                        <td style="vertical-align: middle;">{{$cart->users_email}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$cart->name}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$cart->address}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$cart->city}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$cart->mobile}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$cart->payment_method}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$cart->order_status}}</td>
                            <td style="text-align: center; vertical-align: middle;">
                            <a href="javascript:" rel="{{$cart->id}}" rel1="delete-data" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.tables.js')}}"></script>
    <script src="{{asset('js/matrix.popover.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".deleteRecord").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Apa anda yakin?',
                text:" Anda tidak bisa memulihkannya!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Ya, Hapus!',
                cancelButtonText:'Tidak, Batal!',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/admin/"+deleteFunction+"/"+id;
            });
        });
    </script>
@endsection