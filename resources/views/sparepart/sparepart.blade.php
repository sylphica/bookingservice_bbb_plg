@extends('layouts.sparepart')
@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
    <style>
        img.zoom {
            width: 130px;
            height: 100px;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            -ms-transition: all .2s ease-in-out;
        }

        .transisi {
            -webkit-transform: scale(1.8);
            -moz-transform: scale(1.8);
            -o-transform: scale(1.8);
            transform: scale(1.8);
        }
    </style>
@endsection

@section('content')
    @php
        function getRupiah($harga = 0) {
            if ($harga != null) {
                return "Rp " . number_format($harga, 0, ",", ".");
            } else {
                return "Rp 0";
            }
        }
    @endphp

    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('sparepart.index') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Sparepart</li>
        </ol>
        <br />
    </section>
    <section class="content">
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
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Data Sparepart</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-info btn-md" data-toggle="modal"
                                data-target="#modal-form-tambah-rspad"><i class="fa fa-plus"> Tambah Data
                                </i></button>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="data-rspad">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Sparepart</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$sparepart as $key => $value)
                                    <tr>
                                        <td>{{ @$value->id_sparepart }}</td>
                                        <td>{{ @$value->nama_sparepart }}</td>
                                        <td>{{ getRupiah($value->harga) }}</td>
                                        <td>{{ @$value->stok }}</td>
                                        <td>{{ @$value->status }}</td>
                                        <td>
                                            <button class="btn btn-xs btn-success btn-edit-rspad"><i class="fa fa-edit">
                                                    Ubah</i></button> &nbsp;
                                            <a href="{{ route('sparepart.deleteSparepart', $value->id_sparepart) }}"><button
                                                    class=" btn btn-xs btn-danger"
                                                    onclick="return confirm('Apakah anda ingin menghapus data ini ?')"><i
                                                        class="fa fa-trash"> Hapus</i></button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modal-form-tambah-rspad" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Tambah Data Sparepart</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sparepart.addSparepart') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <label>Nama Sparepart</label>
                            <input type="text" name="nama_sparepart" class="form-control" placeholder="Nama Sparepart" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Stok</label>
                            <input type="text" name="stok" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="1" max="100000" placeholder="Stok" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="" selected>Pilih</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-xs-4 col-xs-offset-8">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-form-edit-rspad" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Ubah Data Sparepart</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sparepart.updateSparepart') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <input type="hidden" name="id_sparepart" readonly class="form-control" placeholder="ID" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Nama Sparepart</label>
                            <input type="text" name="nama_sparepart" class="form-control" placeholder="Nama Sparepart" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Harga</label>
                            <input type="text" name="harga" id="harga2" class="form-control" placeholder="Harga" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Stok</label>
                            <input type="text" name="stok" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="1" max="100000" placeholder="Stok" required>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="" selected>Pilih</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>

                        
                        <div class="row">
                            <div class="col-xs-4 col-xs-offset-8">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        var table = $('#data-rspad').DataTable();

        $('#data-rspad').on('click', '.btn-edit-rspad', function() {
            row = table.row($(this).closest('tr')).data();
            console.log(row);
            $('input[name=id_sparepart]').val(row[0]);
            $('input[name=nama_sparepart]').val(row[1]);
            $('input[name=harga]').val(row[2]);
            $('input[name=stok]').val(row[3]);
            $('select[name=status]').val(row[4]);
            $('#modal-form-edit-rspad').modal('show');
        });

        $('#modal-form-tambah-rspad').on('show.bs.modal', function() {
            // $('input[name=id_sparepart]').val('');
            $('input[name=nama_sparepart]').val('');
            $('input[name=harga]').val('');
            $('input[name=stok]').val('');
            $('select[name=status]').val('');
        });

        $(document).ready(function() {
            $('.zoom').hover(function() {
                $(this).addClass('transisi');
            }, function() {
                $(this).removeClass('transisi');
            });
        });
    </script>

    <script type="text/javascript">
        var rupiah = document.getElementById("harga");
        rupiah.addEventListener("keyup", function(e) {
            rupiah.value = formatRupiah(this.value, "Rp. ");
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }

        var rupiahs = document.getElementById("harga2");
        rupiahs.addEventListener("keyup", function(e) {
            rupiahs.value = formatRupiah2(this.value, "Rp. ");
        });

        function formatRupiah2(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiahs = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? "." : "";
                rupiahs += separator + ribuan.join(".");
            }

            rupiahs = split[1] != undefined ? rupiahs + "," + split[1] : rupiahs;
            return prefix == undefined ? rupiahs : rupiahs ? "Rp. " + rupiahs : "";
        }
    </script>
@endsection
