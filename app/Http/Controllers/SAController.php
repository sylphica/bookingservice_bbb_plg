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

class SAController extends Controller
{
    public function index() {
        $title = "Home";
        return view('sa.index', compact('title'));
    }
    public function profile()
    {
        $title = 'Profile';
        $user = User::find(Auth::user()->id);
        return view('sa.profile', compact('title','user'));
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
            return Redirect::route('sa.profile');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('sa.profile');
        }
    }

    public function booking()
    {
        $title = 'Booking';
        $booking = Booking::where('status', ['MENUNGGU KONFIRMASI SA'])->get();
        return view('sa.booking', compact('title','booking'));
    }
    function detailBooking($id) {
        $title = 'Detail Booking';
        $booking = Booking::find($id);
        $detail = DetailBooking::where('booking_id',$booking->id)->first();
        $spareparts = DB::table('detail_booking_spareparts')
            ->leftJoin('spareparts', 'spareparts.id_sparepart', '=', 'detail_booking_spareparts.sparepart_id')
            ->where('detail_booking_spareparts.detail_booking_id', $detail->id)
            ->get();
        return view('sa.detail_booking', compact('title','booking','detail', 'spareparts'));
    }
    public function updateBooking(Request $request){
        DB::beginTransaction();
        try {
                $booking = Booking::find($request->id);
                $booking->status = $request->status;
                $booking->catatan = $request->catatan;
                $booking->save();

                $namapdf = "PDF Estimasi-"."  ".$booking->id." ".date("Y-m-d H-i-s");
                $extention = $request->file('pdf')->extension();
                $pdf = sprintf('%s.%0.8s', $namapdf, $extention);
                $destination = base_path() .'/public/pdf';
                $request->file('pdf')->move($destination,$pdf);

                $detail = DetailBooking::where('booking_id',$booking->id)->first();
                $detail->biaya_extra = $request->biaya_extra;
                $detail->pdf = $pdf;
                $detail->save();

             DB::commit();
            \Session::flash('msg_success','Booking Berhasil Diubah!');
            return Redirect::route('sa.booking');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('sa.booking');
        }
    }

    public function history()
    {
        $title = 'Data History Service';
        $booking = Booking::whereIn('status', ['SELESAI','DIBATALKAN'])->get();
        return view('sa.history', compact('title','booking'));
    }
    function detailHistory($id) {
        $title = 'History';
        $booking = Booking::find($id);
        $detail = DetailBooking::where('booking_id',$booking->id)->first();
        $spareparts = DB::table('detail_booking_spareparts')
            ->leftJoin('spareparts', 'spareparts.id_sparepart', '=', 'detail_booking_spareparts.sparepart_id')
            ->where('detail_booking_spareparts.detail_booking_id', $detail->id)
            ->get();
        return view('sa.detail_history', compact('title','booking','detail', 'spareparts'));
    }
}
