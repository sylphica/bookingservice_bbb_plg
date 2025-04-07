@extends('layouts.index')
@section('css')
@endsection

@section('content')
    <div class="container">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="login-box">
                    <div class="login-box-body">
                        <center>
                            <h3 class="login-box-msg"> Login</h3>
                        </center>
                        <br>
                        <form action="{{ route('prosesLogin') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <input type="email" name="email" class="form-control" placeholder="Email"
                                    value="{{ old('email') }}" required>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            @if (\Session::has('msg_login'))
                                <div class="alert alert-danger">
                                    {{ \Session::get('msg_login') }}
                                </div>
                            @endif
                            @if (\Session::has('msg_success'))
                                <div class="alert alert-info">
                                    {{ \Session::get('msg_success') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success btn-block btn-flat">Masuk</button>
                                </div>
                            </div>
                            <br>
                        </form>
                        <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
@endsection

@section('javascript')
@endsection
