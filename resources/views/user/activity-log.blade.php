@extends('user.layouts.main')

@section('container')
<div class="container">
    <div class="row mt-5">
        <div class="col mt-5">
            <div class="card">
                <div class="card-header p-3 mb-2 text-center">
                    Activity Log
                </div>
                @if (session()->has('successAdd'))
                    <div class="alert alert-success alert-dismissible fade show col-lg-6 mx-auto mt-4" role="alert">
                        {{ session('successAdd') }}
                        <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-body col-md-12">
                    <div class="row p-3">
                        @if ($user->report->first())
                            @foreach ($user->report as $report)
                            <div class="col-md-5 card flex-wrap mb-3 mx-auto">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $report->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Kamu melaporkan ini pada {{ $report->created_at->format('F j, Y, H:i a') }}</h6>
                                    Sumber: <a href="https://{{ $report->link }}" class="card-link">{{ $report->link }}</a>
                                    @if ($report->isReviewed)
                                        @if ($report->status_report)
                                            <br>
                                            <button class="btn btn-success disabled mt-3">Fakta</button>
                                        @else
                                            <br>
                                            <button class="btn btn-danger disabled mt-3">{{ $report->categoryhoax->category }}</button>
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
@endsection