<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use App\Models\User;
use App\Models\Booking;
use App\Models\DetailBooking;
use Barryvdh\DomPDF\Facade\Pdf;

class MekanikController extends Controller
{
    public function index() {
        $title = "Home";
        return view('mekanik.index', compact('title'));
    }
    public function profile()
    {
        $title = 'Profile';
        $user = User::find(Auth::user()->id);
        return view('mekanik.profile', compact('title','user'));
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
            return Redirect::route('mekanik.profile');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('mekanik.profile');
        }
    }

    public function service()
    {
        $title = 'Data Service';
        $booking = Booking::where('status', 'BOOKED')->where('mekanik_id', Auth::user()->id)->get();
        return view('mekanik.service', compact('title','booking'));
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
        return view('mekanik.detail_service', compact('title','booking','detail','mekanik','spareparts'));
    }
    public function updateService(Request $request){
        DB::beginTransaction();
        try {
                $booking = Booking::find($request->id);

                $namafoto = "Foto Pekerjaan"."  ".$booking->id." ".date("Y-m-d H-i-s");
                $extention = $request->file('foto')->extension();
                $photo = sprintf('%s.%0.8s', $namafoto, $extention);
                $destination = base_path() .'/public/foto';
                $request->file('foto')->move($destination,$photo);

                $booking->catatan = $request->catatan;
                $booking->status = 'SELESAI';
                $booking->save();

                $detail = DetailBooking::where('booking_id',$booking->id)->first();
                $detail->foto = $photo;
                $detail->save();

             DB::commit();
            \Session::flash('msg_success','Service Selesai!');
            return Redirect::route('mekanik.service');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('mekanik.service');
        }
    }

    public function pdf($id) {
        $booking = Booking::find($id);
        $history = Booking::where('customer_id',$booking->customer_id)->get();
        $pdf = Pdf::loadView('mekanik.pdf', compact('booking','history'))->setPaper('a4','landscape');
        return $pdf->stream();
    }
}
