@extends('layouts.customer')
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
                            <h3 class="login-box-msg"> Profile</h3>
                        </center>
                        <br>
                        <form action="{{ route('prosesRegister') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <input type="hidden" name="id" readonly class="form-control"
                                    value="{{ $user->id }}" readonly>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Nama:</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                    required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Email :</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                    required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>NO HP :</label>
                                <input type="number" name="no_hp" class="form-control" value="{{ $user->no_hp }}"
                                    required>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Alamat :</label>
                                <textarea name="alamat" class="form-control" cols="3" rows="2">{{ $user->alamat }}</textarea>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <option value="Laki-Laki" {{ $user->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Password Baru</label>
                                <input type="password" name="password" class="form-control" placeholder="Password Baru">
                            </div>
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
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success btn-block btn-flat">Update</button>
                                </div>
                            </div>
                            <br>
                        </form>
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
