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
                <h5>Akun Users</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Penjual</th>
                        <th>Action</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; ?>
                    @foreach($akun as $akun)
                        <?php $i++; ?>
                        <tr class="gradeC">
                            <td>{{$i}}</td>
                        <td style="vertical-align: middle;">{{$akun->name}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$akun->email}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$akun->admin}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$akun->penjual}}</td>
                            
                            <td style="text-align: center; vertical-align: middle;">
                                <a href="javascript:" rel="{{$akun->id}}" rel1="delete-akun" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                {{-- <a href="/delete-akun/{{$akun['id']}}">
                                    <i class="icon-close2 text-danger-o text-danger"></i> Delete
                                </a> --}}
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