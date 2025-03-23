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
                            <h3 class="login-box-msg"> Register</h3>
                        </center>
                        <br>
                        <form action="{{ route('prosesRegister') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <label>Nama:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Email :</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>NO HP :</label>
                                <input type="number" name="no_hp" class="form-control" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Alamat :</label>
                                <textarea name="alamat" class="form-control" cols="3" rows="2"></textarea>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            @if (\Session::has('msg_error'))
                                <div class="alert alert-danger">
                                    {{ \Session::get('msg_error') }}
                                </div>
                            @endif
                            @if (\Session::has('msg_success'))
                                <div class="alert alert-info">
                                    {{ \Session::get('msg_success') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success btn-block btn-flat">Daftar</button>
                                </div>
                            </div>
                            <br>
                        </form>
                        <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
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
