@extends('layouts.customer')
@section('css')
@endsection

@section('content')
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row">
            <center>
                <h2 class="login-box-msg"> Detail Booking</h2>
                <a style="text-align: right" class="btn btn-md btn-warning" href="{{ route('customer.booking') }}">
                    Kembali</a>
                @if (\Session::has('msg_success'))
                    <h5>
                        <div class="alert alert-info">
                            {{ \Session::get('msg_success') }}
                        </div>
                    </h5>
                @endif
                @if (\Session::has('msg_error'))
                    <h5>
                        <div class="alert alert-danger">
                            {{ \Session::get('msg_error') }}
                        </div>
                    </h5>
                @endif
            </center>
            <br>
        </div>
        <hr>
        <form action="{{ route('customer.updateBooking') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group has-feedback">
                <input type="hidden" name="id" readonly class="form-control" value="{{ $booking->id }}" readonly>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Jenis Service <b>: {{ @$booking->jenis_service }}</b></p>
                </div>
                <div class="col-md-4">
                    <p>Service <b>: {{ @$booking->Service->name }}</b></p>
                </div>
                <div class="col-md-4">
                    <p>No Polisi <b>: {{ @$booking->no_polisi }}</b></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <p>Tanggal Service <b>: {{ @$booking->tanggal }}</b></p>
                </div>
                <div class="col-md-4">
                    <p>Waktu <b>: {{ @$booking->waktu }}</b></p>
                </div>
                <div class="col-md-4">
                    <p>Mobil <b>: {{ @$booking->model_kendaraan }}</b></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <p>Odo Meter <b>: {{ @$booking->odo_meter }}</b></p>
                </div>
                <div class="col-md-4">
                    <p>Status <b>: {{ @$booking->status }}</b></p>
                </div>
                <div class="col-md-4">
                    <p>Catatan <b>: {{ @$booking->catatan }}</b></p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <p>Apakah Service Rutin <b>: {{ @$detail->ask_service }}</b></p>
                </div>
                <div class="col-md-4">
                    <p>Apakah Lokasi Lebih dari 10 Km dari Dealer <b>: {{ @$detail->ask_10km }}</b></p>
                </div>
                <div class="col-md-4">
                    <p>Apakah Ada Pekerjaan Tambahan <b>: {{ @$detail->ask_extra }}</b></p>
                </div>
            </div>
            <hr>
            <div class="row">
                @foreach ($spareparts as $item)
                    <div class="col-md-4">
                        <p>Nama Spare Part<b>: {{ $item->nama_sparepart }}</b></p>
                    </div>
                    <div class="col-md-4">
                        <p>Jumlah <b>: {{ $item->quantity }}</b></p>
                    </div>
                    <div class="col-md-4">
                        <p>Total Harga <b>: Rp. {{ number_format(@$item->total_price, 0, ',', '.') ?? '-' }}</b></p>
                    </div>
                @endforeach
            </div>
            {{-- <div class="row">
                @foreach ($spareparts as $value)
                    <div class="col-md-4">
                        <p>Nama Spare Part<b>: {{ @$value['nama_sparepart'] }}</b></p>
                    </div>
                    <div class="col-md-4">
                        <p>Jumlah <b>: {{ @$value['jumlah'] }}</b></p>
                    </div>
                    <div class="col-md-4">
                        <p>Harga <b>: Rp. {{ number_format(@$value['harga'], 0, ',', '.') ?? '-' }}</b></p>
                    </div>
                @endforeach
            </div> --}}
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <p>Konfirmasi Spare Part <b>: {{ @$detail->konfirmasi_sparepart ?? '-' }}</b></p>
                </div>
                <div class="col-md-4">
                    <p>Biaya Lebih dari 10 Km <b>: Rp. {{ number_format(@$detail->biaya_10km, 0, ',', '.') ?? '-' }}</b>
                    </p>
                </div>
                <div class="col-md-4">
                    <p>Biaya Tambahan <b>: Rp. {{ number_format(@$detail->biaya_extra, 0, ',', '.') ?? '-' }}</b></p>
                </div>
            </div>
            <hr>
            @if ($booking->status == 'MENUNGGU KONFIRMASI CUSTOMER')
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <p>Konfirmasi Booking </p>
                        <select name="status" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="CUSTOMER SETUJU">SETUJU</option>
                            <option value="CUSTOMER TIDAK SETUJU">TIDAK SETUJU</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" style="margin-top: 24px">Submit</button>
                    </div>
                </div>
            @endif
            <hr>
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <p>PDF Estimasi :</p>
                    @if (!empty($detail->pdf))
                        <iframe src="{{ asset('pdf/' . $detail->pdf) }}" width="100%" height="600px"></iframe>
                    @else
                        <p><b>PDF Belum tersedia</b></p>
                    @endif
                </div>
                <div class="col-md-2">

                </div>
            </div>
    </div>
    <br>
    <br>
    <br>
    <hr>
    </div>
@endsection

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
