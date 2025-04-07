<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $title = "Home";
        $customer = User::where('level', 'Customer')->count();
        return view('admin.index', compact('title', 'customer'));
    }
    public function profile()
    {
        $title = 'Profile';
        $admin = User::find(Auth::user()->id);
        return view('admin.profile', compact('title', 'admin'));
    }
    public function updateProfile(Request $request)
    {
        DB::beginTransaction();
        try {
            if (!empty($request->password)) {
                $user = User::find($request->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->no_hp = $request->no_hp;
                $user->alamat = $request->alamat;
                $user->password = bcrypt($request->password);
                $user->save();
            } else {
                $user = User::find($request->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->no_hp = $request->no_hp;
                $user->alamat = $request->alamat;
                $user->save();
            }
            DB::commit();
            \Session::flash('msg_success', 'Profile Berhasil Diubah!');
            return Redirect::route('admin.profile');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.profile');
        }
    }

    public function customer()
    {
        $title = "Data Customer";
        $customer = User::where('level', 'Customer')->get();
        return view('admin.customer', compact('title', 'customer'));
    }
    public function addCustomer(Request $request)
    {
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
            \Session::flash('msg_success', 'Customer Berhasil Ditambah!');
            return Redirect::route('admin.customer');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.customer');
        }
    }
    public function updateCustomer(Request $request)
    {
        // return $request;
        DB::beginTransaction();
        try {
            if (!empty($request->password)) {
                $customer = User::find($request->id);
                $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->no_hp = $request->no_hp;
                $customer->alamat = $request->alamat;
                $customer->password = bcrypt($request->password);
                $customer->jenis_kelamin = $request->jenis_kelamin;
                $customer->save();
            } else {
                $customer = User::find($request->id);
                $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->no_hp = $request->no_hp;
                $customer->alamat = $request->alamat;
                $customer->jenis_kelamin = $request->jenis_kelamin;
                $customer->save();
            }

            DB::commit();
            \Session::flash('msg_success', 'Customer Berhasil Diubah!');
            return Redirect::route('admin.customer');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.customer');
        }
    }
    public function deleteCustomer($id)
    {
        DB::beginTransaction();
        try {
            $customer = User::where('id', $id)->delete();
            DB::commit();
            \Session::flash('msg_success', 'Data Customer Berhasil Dihapus!');
            return Redirect::route('admin.customer');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.customer');
        }
    }

    public function cs()
    {
        $title = "Data CS";
        $cs = User::where('level', 'CS')->get();
        return view('admin.cs', compact('title', 'cs'));
    }
    public function addCS(Request $request)
    {
        DB::beginTransaction();
        try {
            $cs = new User;
            $cs->name = $request->name;
            $cs->email = $request->email;
            $cs->no_hp = $request->no_hp;
            $cs->alamat = $request->alamat;
            $cs->password = bcrypt($request->password);
            $cs->level = 'CS';
            $cs->jenis_kelamin = $request->jenis_kelamin;
            $cs->save();

            DB::commit();
            \Session::flash('msg_success', 'CS Berhasil Ditambah!');
            return Redirect::route('admin.cs');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.cs');
        }
    }
    public function updateCS(Request $request)
    {
        // return $request;
        DB::beginTransaction();
        try {
            if (!empty($request->password)) {
                $cs = User::find($request->id);
                $cs->name = $request->name;
                $cs->email = $request->email;
                $cs->no_hp = $request->no_hp;
                $cs->alamat = $request->alamat;
                $cs->password = bcrypt($request->password);
                $cs->jenis_kelamin = $request->jenis_kelamin;
                $cs->save();
            } else {
                $cs = User::find($request->id);
                $cs->name = $request->name;
                $cs->email = $request->email;
                $cs->no_hp = $request->no_hp;
                $cs->alamat = $request->alamat;
                $cs->jenis_kelamin = $request->jenis_kelamin;
                $cs->save();
            }

            DB::commit();
            \Session::flash('msg_success', 'CS Berhasil Diubah!');
            return Redirect::route('admin.cs');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.cs');
        }
    }
    public function deleteCS($id)
    {
        DB::beginTransaction();
        try {
            $cs = User::where('id', $id)->delete();
            DB::commit();
            \Session::flash('msg_success', 'Data CS Berhasil Dihapus!');
            return Redirect::route('admin.cs');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.cs');
        }
    }

    public function sa()
    {
        $title = "Data SA";
        $sa = User::where('level', 'SA')->get();
        return view('admin.sa', compact('title', 'sa'));
    }
    public function addSA(Request $request)
    {
        DB::beginTransaction();
        try {
            $sa = new User;
            $sa->name = $request->name;
            $sa->email = $request->email;
            $sa->no_hp = $request->no_hp;
            $sa->alamat = $request->alamat;
            $sa->password = bcrypt($request->password);
            $sa->level = 'SA';
            $sa->jenis_kelamin = $request->jenis_kelamin;
            $sa->save();

            DB::commit();
            \Session::flash('msg_success', 'SA Berhasil Ditambah!');
            return Redirect::route('admin.sa');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.sa');
        }
    }
    public function updateSA(Request $request)
    {
        // return $request;
        DB::beginTransaction();
        try {
            if (!empty($request->password)) {
                $sa = User::find($request->id);
                $sa->name = $request->name;
                $sa->email = $request->email;
                $sa->no_hp = $request->no_hp;
                $sa->alamat = $request->alamat;
                $sa->password = bcrypt($request->password);
                $sa->jenis_kelamin = $request->jenis_kelamin;
                $sa->save();
            } else {
                $sa = User::find($request->id);
                $sa->name = $request->name;
                $sa->email = $request->email;
                $sa->no_hp = $request->no_hp;
                $sa->alamat = $request->alamat;
                $sa->jenis_kelamin = $request->jenis_kelamin;
                $sa->save();
            }

            DB::commit();
            \Session::flash('msg_success', 'SA Berhasil Diubah!');
            return Redirect::route('admin.sa');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.sa');
        }
    }
    public function deleteSA($id)
    {
        DB::beginTransaction();
        try {
            $sa = User::where('id', $id)->delete();
            DB::commit();
            \Session::flash('msg_success', 'Data SA Berhasil Dihapus!');
            return Redirect::route('admin.sa');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.sa');
        }
    }

    public function sm()
    {
        $title = "Data SM";
        $sm = User::where('level', 'SM')->get();
        return view('admin.sm', compact('title', 'sm'));
    }
    public function addSM(Request $request)
    {
        DB::beginTransaction();
        try {
            $sm = new User;
            $sm->name = $request->name;
            $sm->email = $request->email;
            $sm->no_hp = $request->no_hp;
            $sm->alamat = $request->alamat;
            $sm->password = bcrypt($request->password);
            $sm->level = 'SM';
            $sm->jenis_kelamin = $request->jenis_kelamin;
            $sm->save();

            DB::commit();
            \Session::flash('msg_success', 'SM Berhasil Ditambah!');
            return Redirect::route('admin.sm');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.sm');
        }
    }
    public function updateSM(Request $request)
    {
        // return $request;
        DB::beginTransaction();
        try {
            if (!empty($request->password)) {
                $sm = User::find($request->id);
                $sm->name = $request->name;
                $sm->email = $request->email;
                $sm->no_hp = $request->no_hp;
                $sm->alamat = $request->alamat;
                $sm->password = bcrypt($request->password);
                $sm->jenis_kelamin = $request->jenis_kelamin;
                $sm->save();
            } else {
                $sm = User::find($request->id);
                $sm->name = $request->name;
                $sm->email = $request->email;
                $sm->no_hp = $request->no_hp;
                $sm->alamat = $request->alamat;
                $sm->jenis_kelamin = $request->jenis_kelamin;
                $sm->save();
            }

            DB::commit();
            \Session::flash('msg_success', 'SM Berhasil Diubah!');
            return Redirect::route('admin.sm');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.sm');
        }
    }
    public function deleteSM($id)
    {
        DB::beginTransaction();
        try {
            $sm = User::where('id', $id)->delete();
            DB::commit();
            \Session::flash('msg_success', 'Data SM Berhasil Dihapus!');
            return Redirect::route('admin.sm');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.sm');
        }
    }

    public function mekanik()
    {
        $title = "Data Mekanik";
        $mekanik = User::where('level', 'Mekanik')->get();
        return view('admin.mekanik', compact('title', 'mekanik'));
    }
    public function addMekanik(Request $request)
    {
        DB::beginTransaction();
        try {
            $mekanik = new User;
            $mekanik->name = $request->name;
            $mekanik->email = $request->email;
            $mekanik->no_hp = $request->no_hp;
            $mekanik->alamat = $request->alamat;
            $mekanik->password = bcrypt($request->password);
            $mekanik->level = 'Mekanik';
            $mekanik->jenis_kelamin = $request->jenis_kelamin;
            $mekanik->save();

            DB::commit();
            \Session::flash('msg_success', 'Mekanik Berhasil Ditambah!');
            return Redirect::route('admin.mekanik');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.mekanik');
        }
    }
    public function updateMekanik(Request $request)
    {
        // return $request;
        DB::beginTransaction();
        try {
            if (!empty($request->password)) {
                $mekanik = User::find($request->id);
                $mekanik->name = $request->name;
                $mekanik->email = $request->email;
                $mekanik->no_hp = $request->no_hp;
                $mekanik->alamat = $request->alamat;
                $mekanik->password = bcrypt($request->password);
                $mekanik->jenis_kelamin = $request->jenis_kelamin;
                $mekanik->save();
            } else {
                $mekanik = User::find($request->id);
                $mekanik->name = $request->name;
                $mekanik->email = $request->email;
                $mekanik->no_hp = $request->no_hp;
                $mekanik->alamat = $request->alamat;
                $mekanik->jenis_kelamin = $request->jenis_kelamin;
                $mekanik->save();
            }

            DB::commit();
            \Session::flash('msg_success', 'Mekanik Berhasil Diubah!');
            return Redirect::route('admin.mekanik');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.mekanik');
        }
    }
    public function deleteMekanik($id)
    {
        DB::beginTransaction();
        try {
            $mekanik = User::where('id', $id)->delete();
            DB::commit();
            \Session::flash('msg_success', 'Data Mekanik Berhasil Dihapus!');
            return Redirect::route('admin.mekanik');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('admin.mekanik');
        }
    }

    public function sparepart() {
        $title = "Data Sparepart";
        $sparepart = User::where('level','Sparepart')->get();
        return view('admin.sparepart', compact('title','sparepart'));
    }
    public function addSparepart(Request $request) {
        DB::beginTransaction();
        try {
                $sparepart = new User;
                $sparepart->name = $request->name;
                $sparepart->email = $request->email;
                $sparepart->no_hp = $request->no_hp;
                $sparepart->alamat = $request->alamat;
                $sparepart->password = bcrypt($request->password);
                $sparepart->level = 'Sparepart';
                $sparepart->jenis_kelamin = $request->jenis_kelamin;
                $sparepart->save();

             DB::commit();
            \Session::flash('msg_success','Sparepart Berhasil Ditambah!');
            return Redirect::route('admin.sparepart');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.sparepart');
        }
    }
    public function updateSparepart(Request $request){
        // return $request;
        DB::beginTransaction();
        try {
            if (!empty($request->password)) {
                $sparepart = User::find($request->id);
                $sparepart->name = $request->name;
                $sparepart->email = $request->email;
                $sparepart->no_hp = $request->no_hp;
                $sparepart->alamat = $request->alamat;
                $sparepart->password = bcrypt($request->password);
                $sparepart->jenis_kelamin = $request->jenis_kelamin;
                $sparepart->save();
            }else{
                $sparepart = User::find($request->id);
                $sparepart->name = $request->name;
                $sparepart->email = $request->email;
                $sparepart->no_hp = $request->no_hp;
                $sparepart->alamat = $request->alamat;
                $sparepart->jenis_kelamin = $request->jenis_kelamin;
                $sparepart->save();
            }

             DB::commit();
            \Session::flash('msg_success','Sparepart Berhasil Diubah!');
            return Redirect::route('admin.sparepart');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.sparepart');
        }
    }
    public function deleteSparepart($id)
    {
        DB::beginTransaction();
        try {
            $sparepart = User::where('id',$id)->delete();
            DB::commit();
            \Session::flash('msg_success','Data Sparepart Berhasil Dihapus!');
            return Redirect::route('admin.sparepart');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.sparepart');
        }
    }
}
