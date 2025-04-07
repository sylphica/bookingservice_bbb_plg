@extends('layouts.sm')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('cs.index') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Detail</li>
        </ol>
    </section>
    <br />
    <br />
    <section class="content">
        @if (\Session::has('msg_success'))
            <h5>
                <div class="alert alert-warning">
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
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Detail Booking</h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-md btn-warning" href="{{ route('sm.booking') }}">
                                Kembali</a>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <div class="row">
                            <center>
                                <h2 class="login-box-msg"> Detail Booking</h2>

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
                        <form action="{{ route('sm.updateBooking') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <hr>
                            <div class="form-group has-feedback">
                                <input type="hidden" name="id" readonly class="form-control"
                                    value="{{ $booking->id }}" readonly>
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
                                {{-- @foreach ($detail->sparepart as $value)
                                    <div class="col-md-4">
                                        <p>Nama Spare Part<b>: {{ @$value['nama'] }}</b></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Jumlah <b>: {{ @$value['jumlah'] }}</b></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Harga <b>: Rp. {{ number_format(@$value['harga'], 0, ',', '.') ?? '-' }}</b></p>
                                    </div>
                                @endforeach --}}
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Konfirmasi Spare Part <b>: {{ @$detail->konfirmasi_sparepart ?? '-' }}</b></p>
                                </div>
                                <div class="col-md-4">
                                    <p>Biaya Lebih dari 10 Km :</p>
                                    <input type="number" name="biaya_10km" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <p>Biaya Tambahan <b>: Rp.
                                            {{ number_format(@$detail->biaya_extra, 0, ',', '.') ?? '-' }}</b></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                    <p>Status </p>
                                    <select name="status" class="form-control" required>
                                        <option value="">Pilih</option>
                                        <option value="MENUNGGU KONFIRMASI CS">MENUNGGU KONFIRMASI CS</option>
                                    </select>
                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-2 col-xs-offset-5">
                                    <button style="margin: 50px;" type="submit" class="btn btn-primary"
                                        style="border-radius: 10px">Update</button>
                                </div>
                            </div>
                            <br>
                            <br>
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </section>
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/raphael/raphael-min.js') }}"></script>
@endsection
