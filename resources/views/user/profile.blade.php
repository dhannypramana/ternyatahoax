@extends('user.layouts.main')

@section('container')
    <div class="container" style="margin-top: 100px">
        <div class="row mt-5" style="margin-top: 100px">
            <div class="col-md-6 mt-5">
                <div class="card mb-3">
                    <div class="card-body">
                        @if (session()->has('updateSuccess'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('updateSuccess') }}
                                <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header p-3 mb-4">
                            Profile
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-md-5 text-secondary">
                                {{ $user->full_name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h6 class="mb-0">Username</h6>
                            </div>
                            <div class="col-md-5 text-secondary">
                                {{ $user->username }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h6 class="mb-0">Tanggal Lahir</h6>
                            </div>
                            <div class="col-md-5 text-secondary">
                                {{ $user->tgl_lahir }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h6 class="mb-0">Jenis Kelamin</h6>
                            </div>
                            <div class="col-md-5 text-secondary">
                                {{ ucwords($user->gender) }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-md-5 text-secondary">
                                {{ $user->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <h6 class="mb-0">Whatsapp</h6>
                            </div>
                            <div class="col-md-5 text-secondary">
                                +62 {{ $user->no_telepon_wa }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header p-3 mb-2">
                            Status Reports
                        </div>
                        <div class="row p-3">
                            @if ($user->report->first())
                                @foreach ($user->report as $report)
                                <div class="card flex-wrap mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $report->title }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Kamu melaporkan ini pada {{ $report->created_at->format('F j, Y, H:i a') }}</h6>
                                        Sumber: <a href="https://{{ $report->link }}" class="card-link">{{ $report->link }}</a>
                                        @if ($report->isReviewed)
                                            @if ($report->status_report)
                                                <br>
                                                <button class="btn btn-success disabled mt-3">Fakta</button>
                                            @else
                                                <br>
                                                <button class="btn btn-danger disabled mt-3">Hoax</button>
                                            @endif
                                        @else
                                            <br>
                                            <p class="btn btn-danger disabled mt-3">Laporan kamu belum di review</p>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="text-center mt-3">
                                    <p>Kamu belum mempunyai laporan
                                        <a href="/lapor">Ayo Lapor sekarang!</a>
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </div>
      </div>
@endsection