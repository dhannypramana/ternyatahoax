@extends('user.layouts.main')

@section('container')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 mt-5">
                <div class="card mb-3">
                    <div class="card-header p-3 mb-4 text-center">
                        Profile
                    </div>
                    <div class="card-body">
                        @if (session()->has('updateSuccess'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('updateSuccess') }}
                                <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
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
                    <div class="card-header p-3 text-center">
                        Status Reports
                    </div>
                    <div class="card-body">
                        <div class="row p-3">
                            @if ($user->report->first())
                                @foreach ($user->report as $report)
                                    @if ($report->isReviewed == 0)
                                        <div class="col-md-12 card flex-wrap mb-3">
                                            <div class="card-body">
                                                    <h5 class="card-title">{{ $report->title }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Kamu melaporkan ini pada {{ $report->created_at->format('F j, Y, H:i a') }}</h6>
                                                    Sumber: <a href="https://{{ $report->link }}" class="card-link">{{ $report->link }}</a>
                                                    <br>
                                                    <br>
                                                    <p class="btn btn-danger disabled">Laporan kamu belum di Review</p>
                                                </div>
                                            </div>
                                    @endif
                                @endforeach
                                @foreach ($user->report as $report)
                                @if ($report->isReviewed == 1)
                                    <div class="col-md-12 card flex-wrap mb-3">
                                        <div class="card-body">
                                                <h5 class="card-title">{{ $report->title }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">Kamu melaporkan ini pada {{ $report->created_at->format('F j, Y, H:i a') }}</h6>
                                                Sumber: <a href="https://{{ $report->link }}" class="card-link">{{ $report->link }}</a>
                                                @if ($report->status_report)
                                                    <br>
                                                    <button class="btn btn-success disabled mt-3">Fakta</button>
                                                @else
                                                    <br>
                                                    <button class="btn btn-danger disabled mt-3">Hoax</button>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
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