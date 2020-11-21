<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\User;

use App\Orders_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function index(){
        $session_id=Session::get('session_id');
        $cart_datas=Cart_model::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            $total_price+=$cart_data->price*$cart_data->quantity;
        }
        $shipping_address=DB::table('delivery_address')->where('users_id',Auth::id())->first();
        if($shipping_address){
            Cart_model::where('session_id',$session_id)->delete();
        }

        return view('checkout.review_order',compact('shipping_address','cart_datas','total_price'));
    }
    public function order(Request $request){
        $input_data=$request->all();
        $payment_method=$input_data['payment_method'];
        Orders_model::create($input_data);
        if($payment_method=="COD"){
            return redirect('/cod');
        }else{
            return redirect('/paypal');
        }
    }
    public function cod(){
        $user_order=Orders_model::where('users_id',Auth::id())->first();
        return view('payment.cod',compact('user_order'));
    }
    public function paypal(Request $request){
        $who_buying=Orders_model::where('users_id',Auth::id())->first();
        return view('payment.paypal',compact('who_buying'));
    }
   
    public function data_pembelian_menu()
    {
       $cart = Orders_model::all();
        $menu_active=1;
        return view('users.data_pembelian',compact('menu_active','cart'));
    }
    public function settings(){
        $menu_active=0;
        return view('backEnd.setting',compact('menu_active'));
    }
    public function graph()
    {
    //    $cart = Orders_model::all();
        $menu_active=1;
        return view('users.dashboard',compact('menu_active'));
    }
    public function destroy($id)
    {
        $delete_data= Orders_model::findOrFail($id);
        $delete_data->delete();
        return back()->with('message','Berhasil Menghapus Data!');
    }

public function data()
{$user = User::all();

    return view('data',compact('user'));
}

}
