<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class LoginController extends Controller
{
    public function login()
    {
        $title = 'Login';
        return view('login',compact('title'));
    }
    public function prosesLogin(Request $request)
    {
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            if (Auth::User()->level == "Admin"){
                return \Redirect::to('/admin/home');
            }else if (Auth::User()->level == "Customer"){
                return \Redirect::to('/customer/daftar');
            }else if (Auth::User()->level == "CS"){
                return \Redirect::to('/cs/home');
            }else if (Auth::User()->level == "SA"){
                return \Redirect::to('/sa/home');
            }else if (Auth::User()->level == "SM"){
                return \Redirect::to('/sm/home');
            }else if (Auth::User()->level == "Mekanik"){
                return \Redirect::to('/mekanik/home');
            }else if (Auth::User()->level == "Sparepart"){
                return \Redirect::to('/sparepart/home');
            }else{
                \Session::flash('msg_login','Email Atau Password Salah!');
                return Redirect::route('login');
            }
        }
        else
        {
            \Session::flash('msg_login','Email Atau Password Salah!');
            return Redirect::route('login');
        }
    }

    public function register()
    {
        $title = 'Register';
        return view('register',compact('title'));
    }

    public function prosesRegister(Request $request) {
        DB::beginTransaction();
        try {
                $customer = new User;
                $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->no_hp = $request->no_hp;
                $customer->alamat = $request->alamat;
                $customer->password = bcrypt($request->password);
                $customer->level = 'Customer';
                $customer->jenis_kelamin = $request->jenis_kelamin;
                $customer->save();

             DB::commit();
            \Session::flash('msg_success','Register Berhasil!');
            return Redirect::route('login');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('register');
        }
    }
    public function logout(){
        Auth::logout();
      return \Redirect::to('/');
    }
}
