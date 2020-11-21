@extends('backEnd.layouts.master')
@section('title','Homemades+')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="/data_pembelian" class="current">Akun Users</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Selamat!</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>Grafik</h5>
            </div>
            <div class="widget-content nopadding">
               
                <canvas id="myChart"></canvas>

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
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
                   var myChart = new Chart(ctx, {
                     type: 'pie',
                     data: {
                       labels: ["COD", "Paypal"],
                       datasets: [{
                         label: '',
                         data: [
                         <?php 
                         $a = DB::table('orders')
                         ->where('payment_method',"COD")->count();
                         echo $a;
                         ?>, 
                         <?php 
                         $b = DB::table('orders')
                         ->where('payment_method',"Paypal")->count();
                         echo $b;
                         ?>
                         
                       
    
    
    
                         ],
                         backgroundColor: [
                         "#00BFFF",
                         "#f17e5d",
                         "#fcc468",
                         "#cccccc"
                         ],
                         borderColor: [
                         "#6bd098",
                         "#f17e5d",
                         "#fcc468",
                         "#cccccc"
                         ],
                         borderWidth: 1
                       }]
                     },
                     options: {
                       scales: {
                         yAxes: [{
                           ticks: {
                             beginAtZero:true
                           }
                         }]
                       }
                     }
                   });
    
    
    </script>
        
@endsection