@extends('user.layouts.main')

@section('container')
<div class="container" style="margin-top: 100px">
    <div class="row mt-5 justify-content-center" style="margin-top: 100px">
        <div class="col-md-6 mt-5">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="card-header p-3 mb-4">
                        Edit Profile
                    </div>
                    <form action="/edit/{{ $user->username }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="full_name" value="{{ $user->full_name }}" class="form-control @error('full_name') is-invalid @enderror">
                                @error('full_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h6 class="mb-0">Username</h6>
                            </div>
                            <div class="col-lg-6">
                                <input disabled type="text" name="username" value="{{ $user->username }}" class="form-control @error('username') is-invalid @enderror">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h6 class="mb-0">Tanggal Lahir</h6>
                            </div>
                            <div class="col-lg-6">
                                <input type="date" name="tgl_lahir" value="{{ $user->tgl_lahir }}" class="form-control @error('tgl_lahir') is-invalid @enderror">
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h6 class="mb-0">Jenis Kelamin</h6>
                            </div>
                            <div class="col-lg-6">
                                <select name="gender" class="form-control form-control-user @error('gender') is-invalid @enderror" id="exampleFormControlSelect1">
                                    <option disabled>Pilih jenis kelamin</option>
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                    <option value="secret">Tidak ingin memberi tahu</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-lg-6">
                                <input disabled type="text" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h6 class="mb-0">Whatsapp</h6>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend">+62</span>
                                    </div>
                                    <input type="text" name="no_telepon_wa" value="{{ $user->no_telepon_wa }}" class="form-control @error('no_telepon_wa') @enderror">
                                    @error('no_telepon_wa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary btn-user btn-block">
                            Submit
                        </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection