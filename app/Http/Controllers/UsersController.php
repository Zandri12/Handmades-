<?php

namespace App\Http\Controllers;

use App\Profile_model;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function index(){
        return view('users.login_register');
    }
    public function register(Request $request){
        // $input_data=$request->all();
        // $input_data['password']=Hash::make($input_data['password']);
        // User::create($input_data);

        $input_data= User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
       if( $input_data)
       {
        return back()->with('message','Pendaftaran Berhasil!');
       }
        
    }
    public function login(Request $request){
        $input_data=$request->all();
        if(Auth::attempt(['email'=>$input_data['email'],'password'=>$input_data['password']])){
            Session::put('frontSession',$input_data['email']);
            return redirect('/viewcart');
        }else{
            return back()->with('message','Password atau Email Salah!');
        }
    }
    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        return redirect('/');
    }
    public function account(){
        
        $user_login=User::where('id',Auth::id())->first();
        return view('users.account',compact('user_login'));
    }
    public function updateprofile(Request $request,$id){
        $this->validate($request,[
            'address'=>'required',
            'penjual',
            'city'=>'required',
           
            'mobile'=>'required',
        ]);
        $input_data=$request->all();
        DB::table('users')->where('id',$id)->update(['name'=>$input_data['name'],
            'address'=>$input_data['address'],
            'penjual'=>$input_data['penjual'],
            'city'=>$input_data['city'],
            
            'mobile'=>$input_data['mobile']]);
        return back()->with('message','Berhasil Memperbarui Profile');

    }
    public function updatepassword(Request $request,$id){
        $oldPassword=User::where('id',$id)->first();
        $input_data=$request->all();
        if(Hash::check($input_data['password'],$oldPassword->password)){
            $this->validate($request,[
               'newPassword'=>'required|min:6|max:12|confirmed'
            ]);
            $new_pass=Hash::make($input_data['newPassword']);
            User::where('id',$id)->update(['password'=>$new_pass]);
            return back()->with('message','Update Password Already!');
        }else{
            return back()->with('oldpassword','Password lama Salah!');
        }
    }
    public function akun()
    {
        $akun = User::all();
        $menu_active=1;
        return view('users.akun',compact('menu_active','akun'));
    }
    public function settings(){
        $menu_active=0;
        return view('backEnd.setting',compact('menu_active'));
    }
    public function destroy($id)
    {
        $delete_user= User::findOrFail($id);
        $delete_user->delete();
        return back()->with('message','Berhasil Menghapus Akun!');
    }
}
