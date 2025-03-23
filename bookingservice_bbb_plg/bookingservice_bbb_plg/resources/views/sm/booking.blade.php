@extends('layouts.sm')
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
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('sm.index') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Data Booking</li>
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
                        <h3 class="box-title">Data Booking</h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="data-rspad">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Jenis Service</th>
                                    <th>Service</th>
                                    <th>No Polisi</th>
                                    <th>Model Kendaraan</th>
                                    <th>Odo Meter</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$booking as $key => $value)
                                    <tr>
                                        <td>{{ @$value->id }}</td>
                                        <td>{{ @$value->jenis_service }}</td>
                                        <td>{{ @$value->Service->name }}</td>
                                        <td>{{ @$value->no_polisi }}</td>
                                        <td>{{ @$value->model_kendaraan }}</td>
                                        <td>{{ @$value->odo_meter }}</td>
                                        <td>{{ @$value->tanggal }}</td>
                                        <td>{{ @$value->waktu }}</td>
                                        <td>{{ @$value->status }}</td>
                                        <td>{{ @$value->catatan }}</td>
                                        <td>
                                            <a href="{{ route('sm.detailBooking', $value->id) }}"><button
                                                    class="btn btn-xs btn-primary"><i class="fa fa-edit">
                                                        Detail</i></button></a>
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
@endsection

@section('javascript')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        var table = $('#data-rspad').DataTable();
    </script>
@endsection
