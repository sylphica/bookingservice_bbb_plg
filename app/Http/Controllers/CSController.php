<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use App\Models\User;
use App\Models\Booking;
use App\Models\DetailBooking;
use Carbon\Carbon;

class CSController extends Controller
{
    public function index() {
        $title = "Home";
        return view('cs.index', compact('title'));
    }
    public function profile()
    {
        $title = 'Profile';
        $user = User::find(Auth::user()->id);
        return view('cs.profile', compact('title','user'));
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
            return Redirect::route('cs.profile');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('cs.profile');
        }
    }

    public function booking()
    {
        $title = 'Booking';
        $booking = Booking::whereIn('status', ['MENUNGGU KONFIRMASI CS', 'DITUNDA','CUSTOMER SETUJU','CUSTOMER TIDAK SETUJU'])->get();
        return view('cs.booking', compact('title','booking'));
    }
    function detailBooking($id) {
        $title = 'Booking';
        $booking = Booking::find($id);
        $detail = DetailBooking::where('booking_id',$booking->id)->first();
        $spareparts = DB::table('detail_booking_spareparts')
            ->leftJoin('spareparts', 'spareparts.id_sparepart', '=', 'detail_booking_spareparts.sparepart_id')
            ->where('detail_booking_spareparts.detail_booking_id', $detail->id)
            ->get();
        return view('cs.detail_booking', compact('title','booking','detail', 'spareparts'));
    }
    public function updateBooking(Request $request){
        DB::beginTransaction();
        try {
                $booking = Booking::find($request->id);
                $booking->status = $request->status;
                $booking->catatan = $request->catatan;
                $booking->cs_id = Auth::user()->id;
                $booking->save();
             DB::commit();
            \Session::flash('msg_success','Booking Berhasil Diubah!');
            return Redirect::route('cs.booking');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('cs.booking');
        }
    }

    public function service()
    {
        $title = 'Data Service';
        $booking = Booking::where('status', 'BOOKED')
                  ->whereDate('tanggal', Carbon::today())
                  ->get();
        return view('cs.service', compact('title','booking'));
    }
    function detailService($id) {
        $title = 'Service';
        $mekanik = User::where('level','Mekanik')->get();
        $booking = Booking::find($id);
        $detail = DetailBooking::where('booking_id',$booking->id)->first();
        $spareparts = DB::table('detail_booking_spareparts')
            ->leftJoin('spareparts', 'spareparts.id_sparepart', '=', 'detail_booking_spareparts.sparepart_id')
            ->where('detail_booking_spareparts.detail_booking_id', $detail->id)
            ->get();
        return view('cs.detail_service', compact('title','booking','detail','mekanik','spareparts'));
    }
    public function updateService(Request $request){
        DB::beginTransaction();
        try {
                $booking = Booking::find($request->id);
                $booking->mekanik_id = $request->mekanik_id;
                if ($booking->jenis_service == 'DEALER VISIT') {
                    $booking->status = 'SELESAI';
                }
                $booking->catatan = $request->catatan;
                $booking->save();
             DB::commit();
            \Session::flash('msg_success','Service Berhasil Diubah!');
            return Redirect::route('cs.service');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('cs.service');
        }
    }

    public function history()
    {
        $title = 'Data History Service';
        $booking = Booking::whereIn('status', ['SELESAI','DIBATALKAN'])->get();
        return view('cs.history', compact('title','booking'));
    }
    function detailHistory($id) {
        $title = 'History';
        $booking = Booking::find($id);
        $detail = DetailBooking::where('booking_id',$booking->id)->first();
        $spareparts = DB::table('detail_booking_spareparts')
            ->leftJoin('spareparts', 'spareparts.id_sparepart', '=', 'detail_booking_spareparts.sparepart_id')
            ->where('detail_booking_spareparts.detail_booking_id', $detail->id)
            ->get();
        return view('cs.detail_history', compact('title','booking','detail', 'spareparts'));
    }
}
