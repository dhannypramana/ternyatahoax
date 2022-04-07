@extends('admin.layouts.index')

@section('container')
    <div class="card">
        <div class="card-header">
            <h3>{{ $report->title }}</h3>
            @if ($report->status_report == 1)
                <button class="btn btn-success disabled">Fakta</button>
            @else
                <button class="btn btn-danger disabled">{{ $report->categoryhoax->category }}</button>
            @endif
        </div>
        <div class="card-body">
        <p>Sumber: <a href="{{ $report->link }}">{{ $report->link }}</a></p>
            <h5 class="card-small">Di laporkan oleh <a href="/admin/dashboard/manage-users/{{ $report->user->username }}">{{ $report->user->full_name }}</a> pada tanggal {{ $report->created_at->format('j F Y, H:i a') }}</h5>
            @if ($report->image)
                <img src="{{ asset('/storage/images/' . $report->image) }}" height="500">
            @endif
            <p class="card-text">Isi berita : {!! $report->body !!}</p>
        </div>
    </div>

    <a href="javascript:history.back()" class="btn btn-primary mt-3">Kembali</a>
@endsection