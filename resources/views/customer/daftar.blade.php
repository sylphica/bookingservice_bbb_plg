@extends('layouts.customer')
@section('css')
@endsection

@section('content')
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <div class="login-box">
                    <div class="login-box-body">
                        <center>
                            <h2 class="login-box-msg"> Form Booking</h2>

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
                        <hr>
                        <form action="{{ route('customer.prosesBooking') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <label>No Polisi:</label>
                                <input type="text" name="no_polisi" class="form-control" placeholder="D 1945 RI"
                                    required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Tanggal Kedatangan :</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Waktu Kedatangan :</label>
                                <input type="text" name="waktu" class="form-control" placeholder="contoh : 10:00"
                                    required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Model Kendaraan :</label>
                                <input type="text" name="model_kendaraan" class="form-control" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>ODO Meter :</label>
                                <input type="number" name="odo_meter" class="form-control" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Jenis Service :</label>
                                <select name="jenis_service" class="form-control" id="jenis_service" required>
                                    <option value="">Pilih</option>
                                    <option value="HOME SERVICE">HOME SERVICE</option>
                                    <option value="DEALER VISIT">DEALER VISIT</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback askService" style="display: none">
                                <label>Ingin Melakukan Service Rutin :</label>
                                <select name="ask_service" class="form-control" id="ask_service" required>
                                    <option value="">Pilih</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback pickService" style="display: none">
                                <label>Pilih Service :</label>
                                <select name="service_id" class="form-control" id="service_id">
                                    <option value="">Pilih</option>
                                    @foreach ($service as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }} | {{ $value->estimasi }} |
                                            Rp. {{ number_format(@$value->biaya, 0, ',', '.') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group has-feedback askJarak" style="display: none">
                                <label>Apakah Jarak Lokasi Lebih dari 10 Km dari Dealer :</label>
                                <select name="ask_jarak" class="form-control" id="ask_jarak">
                                    <option value="" selected>Pilih</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback askExtra" style="display: none">
                                <label>Apakah Ada Pekerjaan Tambahan Diluar Service :</label>
                                <select name="ask_extra" class="form-control" id="ask_extra" required>
                                    <option value="" selected>Pilih</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                </select>
                            </div>

                            <div class="row mb-10 askPart" style="display: none">
                                <div class="form-group col-12">
                                    <hr>
                                </div>
                                <h5 class="col-md-12">Spare Part :</h5>
                                <div class="col-md-12">
                                    <div id="dynamicInputs">
                                        <div class="form-group input-group">
                                            <div class="col-md-5">
                                                <label>Spare Part:</label>
                                                <select name="sparePart[]" class="form-control">
                                                    <option value="">Pilih</option>
                                                    @foreach ($sparepart as $value)
                                                        <option value="{{ $value->id_sparepart }}">
                                                            {{ $value->nama_sparepart }} | Rp. {{ number_format($value->harga, 0, ',', '.') }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <label>Jumlah :</label>
                                                <input type="number" name="jumlah[]" placeholder="Jumlah Spare Part"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-2 d-flex align-items-end">
                                                <button type="button" class="btn btn-danger removeInput"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <button id="addInput" type="button" class="btn btn-primary mt-2"><i
                                            class="fa fa-plus-circle"></i> Tambah</button>
                                </div>
                                <div class="form-group col-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="form-group has-feedback askBiaya" style="display: none">
                                <label>Apakah Customer Setuju dengan Biaya Tambahan :</label>
                                <select name="ask_biaya" class="form-control" id="ask_biaya">
                                    <option value="" selected>Pilih</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                </select>
                            </div>
                            <div class="row tombolSubmit" style="display: none">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success btn-block btn-flat">Submit</button>
                                </div>
                            </div>
                            <div class="row tombolPesan" style="display: none">
                                <div class="col-sm-12">
                                    <h3 style="color: red">Silahkan Mengubah Jenis Service Menjadi Dealer Visit!</h3>
                                </div>
                            </div>
                            <br>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <hr>
        
    </div>
@endsection

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addInput').click(function() {
                var newInput = `
                <div class="form-group input-group">
                    <div class="col-md-5">
                        <select name="sparePart[]" class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($sparepart as $value)
                                <option value="{{ $value->id_sparepart }}">
                                    {{ $value->nama_sparepart }} | Rp. {{ number_format($value->harga, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger removeInput"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            `;
                $('#dynamicInputs').append(newInput);
            });

            $('#dynamicInputs').on('click', '.removeInput', function() {
                $(this).closest('.form-group').remove();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#jenis_service").change(function() {
                if ($(this).val() !== "") {
                    $(".askService").show();
                    $(".askExtra").show();
                    $(".askPart").show();
                    $(".tombolSubmit").hide();
                    $(".tombolPesan").hide();
                } else {
                    $(".askService").hide();
                }
            });
        });

        $(document).ready(function() {
    // Tampilkan "Pilih Service" langsung saat halaman dimuat
    $('.pickService').show();

    // Tambahkan event change ke dropdown "Ingin Melakukan Service Rutin"
    $('#ask_service').on('change', function() {
        $('.pickService').slideDown(); // Tampilkan selalu
    });
});


        $(document).ready(function() {
            $("#jenis_service").change(function() {
                if ($(this).val() == "HOME SERVICE") {
                    $(".askJarak").show();
                    $(".askBiaya").show(); // Menampilkan elemen

                    $("#ask_biaya select").attr("required", true)
                    $(document).ready(function() {
                        $("#ask_biaya").change(function() {
                            if ($(this).val() == "YA") {
                                $(".tombolSubmit").show();
                                $(".tombolPesan").hide();
                            } else {
                                $(".tombolPesan").show();
                                $(".tombolSubmit").hide();
                            }
                        });
                    });
                } else {
                    $(".askJarak").hide();
                    $("#ask_biaya select").removeAttr("required");
                    $("#ask_jarak select").removeAttr("required");
                    $(document).ready(function() {
                        $("#ask_extra").change(function() {
                            if ($(this).val() !== "") {
                                $(".tombolSubmit").show();
                            }
                        });
                    });
                }
            });
        });
    </script>
@endsection
