<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use App\Models\User;
use App\Models\Service;
use App\Models\Booking;
use App\Models\DetailBooking;

class SMController extends Controller
{
    public function index() {
        $title = "Home";
        return view('sm.index', compact('title'));
    }
    public function profile()
    {
        $title = 'Profile';
        $user = User::find(Auth::user()->id);
        return view('sm.profile', compact('title','user'));
    }
    public function updateProfile(Request $request){
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
            }else{
                $user = User::find($request->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->no_hp = $request->no_hp;
                $user->alamat = $request->alamat;
                $user->save();
            }
             DB::commit();
            \Session::flash('msg_success','Profile Berhasil Diubah!');
            return Redirect::route('sm.profile');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('sm.profile');
        }
    }

    public function service() {
        $title = "Data Service";
        $service = Service::all();
        return view('sm.service', compact('title','service'));
    }
    public function addService(Request $request) {
        DB::beginTransaction();
        try {
                $service = new Service;
                $service->name = $request->name;
                $service->estimasi = $request->estimasi;
                $service->biaya = $request->biaya;
                $service->save();

             DB::commit();
            \Session::flash('msg_success','Service Berhasil Ditambah!');
            return Redirect::route('sm.service');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('sm.service');
        }
    }
    public function updateService(Request $request){
        // return $request;
        DB::beginTransaction();
        try {

                $service = Service::find($request->id);
                $service->name = $request->name;
                $service->estimasi = $request->estimasi;
                $service->biaya = $request->biaya;
                $service->save();

             DB::commit();
            \Session::flash('msg_success','Service Berhasil Diubah!');
            return Redirect::route('sm.service');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('sm.service');
        }
    }
    public function deleteService($id)
    {
        DB::beginTransaction();
        try {
            $service = Service::where('id',$id)->delete();
            DB::commit();
            \Session::flash('msg_success','Data Service Berhasil Dihapus!');
            return Redirect::route('sm.service');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('sm.service');
        }
    }

    public function booking()
    {
        $title = 'Booking';
        $booking = Booking::where('status', ['MENUNGGU KONFIRMASI SM'])->get();
        return view('sm.booking', compact('title','booking'));
    }
    function detailBooking($id) {
        $title = 'Detail Booking';
        $booking = Booking::find($id);
        $detail = DetailBooking::where('booking_id',$booking->id)->first();
        $spareparts = DB::table('detail_booking_spareparts')
            ->leftJoin('spareparts', 'spareparts.id_sparepart', '=', 'detail_booking_spareparts.sparepart_id')
            ->where('detail_booking_spareparts.detail_booking_id', $detail->id)
            ->get();
        return view('sm.detail_booking', compact('title','booking','detail','spareparts'));
    }
    public function updateBooking(Request $request){
        DB::beginTransaction();
        try {
                $booking = Booking::find($request->id);
                $booking->status = $request->status;
                $booking->save();

                $detail = DetailBooking::where('booking_id',$booking->id)->first();
                $detail->biaya_10km = $request->biaya_10km;
                $detail->save();

             DB::commit();
            \Session::flash('msg_success','Booking Berhasil Diubah!');
            return Redirect::route('sm.booking');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('sm.booking');
        }
    }
}
