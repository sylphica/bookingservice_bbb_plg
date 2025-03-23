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

class CustomerController extends Controller
{
    public function index() {
        $title = "Home";
        return view('customer.index', compact('title'));
    }
    public function profile()
    {
        $title = 'Profile';
        $user = User::find(Auth::user()->id);
        return view('customer.profile', compact('title','user'));
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
            return Redirect::route('customer.profile');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('customer.profile');
        }
    }

    public function booking()
    {
        $title = 'Booking';
        $service = Service::all();
        $booking = Booking::where('customer_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('customer.booking', compact('title','service','booking'));
    }
    function detailBooking($id) {
        $title = 'Booking';
        $service = Service::all();
        $booking = Booking::find($id);
        $detail = DetailBooking::where('booking_id',$booking->id)->first();
        return view('customer.detail_booking', compact('title','service','booking','detail'));
    }
    public function prosesBooking(Request $request) {
        DB::beginTransaction();
        try {
            // return $request;

            if ($request->ask_extra === "YA" || !empty(array_filter($request->sparePart)) || !empty(array_filter($request->jumlah))) {
                $status = 'MENUNGGU KONFIRMASI CS';
                $catatan = 'Menunggu Konfirmasi Kebutuhan dari Customer Service';
            } else {
                $status = 'BOOKED';
                $catatan = 'Silahkan Datang pada Tanggal dan Waktu yang telah ditentukan';
            }

            $sparePart = $request->sparePart;
            $jumlah = $request->jumlah;

            $dataSpartPart = array_map(fn($nama, $jumlah) => ["nama" => $nama, "jumlah" => (int) $jumlah], $sparePart, $jumlah);

            $booking = new Booking;
            $booking->customer_id = Auth::user()->id;
            $booking->service_id = $request->service_id ?? null;
            $booking->mekanik_id = null;
            $booking->cs_id = null;
            $booking->jenis_service = $request->jenis_service;
            $booking->no_polisi = $request->no_polisi;
            $booking->tanggal = $request->tanggal;
            $booking->waktu = $request->waktu;
            $booking->model_kendaraan = $request->model_kendaraan;
            $booking->odo_meter = $request->odo_meter;
            $booking->status = $status;
            $booking->catatan = $catatan;
            $booking->save();

            $detailBooking = new DetailBooking;
            $detailBooking->booking_id = $booking->id;
            $detailBooking->ask_service = $request->ask_service;
            $detailBooking->sparepart = $dataSpartPart;
            $detailBooking->konfirmasi_sparepart = null;
            $detailBooking->ask_10km = $request->ask_jarak;
            $detailBooking->ask_extra = $request->ask_extra;
            $detailBooking->biaya_10km = null;
            $detailBooking->biaya_extra = null;
            $detailBooking->foto = null;
            $detailBooking->save();

            DB::commit();
            \Session::flash('msg_success','Booking Berhasil!');
            return Redirect::route('customer.booking');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('customer.booking');
        }
    }

    public function deleteBooking($id) {
        DB::beginTransaction();
        try {
            $detail = DetailBooking::where('booking_id',$id)->delete();
            $booking = Booking::where('id',$id)->delete();
            DB::commit();
            \Session::flash('msg_success','Booking Berhasil Dihapus!');
            return Redirect::route('customer.booking');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('customer.booking');
        }
    }

    public function updateBooking(Request $request){
        DB::beginTransaction();
        try {
                $booking = Booking::find($request->id);
                $booking->status = $request->status;
                $booking->save();
             DB::commit();
            \Session::flash('msg_success','Booking Berhasil Diupdate!');
            return Redirect::route('customer.booking');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('customer.booking');
        }
    }
}
