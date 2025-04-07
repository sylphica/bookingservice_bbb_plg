<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use App\Models\User;
use App\Models\Service;
use App\Models\Booking;
use App\Models\DetailBooking;

class SparepartController extends Controller
{
    public function index() {
        $title = "Home";
        return view('sparepart.index', compact('title'));
    }
    public function profile()
    {
        $title = 'Profile';
        $user = User::find(Auth::user()->id);
        return view('sparepart.profile', compact('title','user'));
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
        $booking = Booking::where('status', ['MENUNGGU KONFIRMASI SP'])->get();
        return view('sparepart.booking', compact('title','booking'));
    }
    function detailBooking($id) {
        $title = 'Detail Booking';
        $booking = Booking::find($id);
        $detail = DetailBooking::where('booking_id',$booking->id)->first();
        $spareparts = DB::table('detail_booking_spareparts')
            ->leftJoin('spareparts', 'spareparts.id_sparepart', '=', 'detail_booking_spareparts.sparepart_id')
            ->where('detail_booking_spareparts.detail_booking_id', $detail->id)
            ->get();

        return view('sparepart.detail_booking', compact('title','booking','detail', 'spareparts'));
    }
    public function updateBooking(Request $request){
        DB::beginTransaction();
        try {
                $nama = $request->nama;
                $jumlah = $request->jumlah;
                $harga = $request->harga;
                // $dataSpartPart = array_map(fn($nama, $jumlah, $harga) => ["nama" => $nama, "jumlah" => (int) $jumlah, "harga"=> (int) $harga], $nama, $jumlah, $harga);


                $booking = Booking::find($request->id);
                $booking->status = $request->status;
                $booking->catatan = $request->catatan;
                $booking->save();

                $detail = DetailBooking::where('booking_id',$booking->id)->first();
                // $detail->sparepart = $dataSpartPart;
                $detail->konfirmasi_sparepart = $request->konfirmasi_sparepart;
                $detail->save();

             DB::commit();
            \Session::flash('msg_success','Booking Berhasil Diubah!');
            return Redirect::route('sparepart.booking');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('sparepart.booking');
        }
    }

    public function sparepart()
    {
        $title = "Data Sparepart";
        $sparepart = Sparepart::all();
        return view('sparepart.sparepart', compact('title', 'sparepart'));
    }

    public function addSparepart(Request $request)
    {
        DB::beginTransaction();
        try {
            $harga = str_replace(array('Rp', '.', ' '), '', $request->harga);
            $sparepart = new Sparepart;
            $sparepart->nama_sparepart = $request->nama_sparepart;
            $sparepart->harga = $harga;
            $sparepart->stok = $request->stok;
            $sparepart->status = $request->status;
            $sparepart->save();

            DB::commit();
            \Session::flash('msg_success', 'Sparepart Berhasil Ditambah!');
            return Redirect::route('sparepart.sparepart');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('sparepart.sparepart');
        }
    }
    public function updateSparepart(Request $request)
    {
        // return $request;
        DB::beginTransaction();
        try {
            $harga = str_replace(array('Rp', '.', ' '), '', $request->harga);
            $sparepart = Sparepart::find($request->id_sparepart);
            $sparepart->nama_sparepart = $request->nama_sparepart;
            $sparepart->harga = $harga;
            $sparepart->stok = $request->stok;
            $sparepart->status = $request->status;
            $sparepart->save();

            DB::commit();
            \Session::flash('msg_success', 'Sparepart Berhasil Diubah!');
            return Redirect::route('sparepart.sparepart');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('sparepart.sparepart');
        }
    }
    public function deleteSparepart($id)
    {
        DB::beginTransaction();
        try {
            $sparepart = Sparepart::where('id_sparepart', $id)->delete();
            DB::commit();
            \Session::flash('msg_success', 'Data Sparepart Berhasil Dihapus!');
            return Redirect::route('sparepart.sparepart');
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error', 'Somethings Wrong!');
            return Redirect::route('sparepart.sparepart');
        }
    }
}
