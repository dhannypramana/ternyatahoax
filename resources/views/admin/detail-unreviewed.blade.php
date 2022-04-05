@extends('admin.layouts.index')

@section('container')
    <div class="card">
        <div class="card-header">
            <h3>{{ $report->title }}</h3>
        </div>
        <div class="card-body">
        <p>Sumber: <a href="{{ $report->link }}">{{ $report->link }}</a></p>
            <h5 class="card-small">Di laporkan oleh <a href="/admin/dashboard/manage-users/{{ $report->user->username }}">{{ $report->user->full_name }}</a> pada tanggal {{ $report->created_at->format('j F Y, H:i a') }}</h5>
            @if ($report->image)
                <img src="{{ asset('/storage/images/' . $report->image) }}" height="500">
            @endif
            <p class="card-text">{!! $report->body !!}</p>
            <form action="/admin/dashboard/unreviewed/{{ $report->slug }}/set-fact" method="post" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-success" name="fact">Fakta</button>
            </form>
            <form action="/admin/dashboard/unreviewed/{{ $report->slug }}/set-hoax" method="post" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger" name="hoax">Hoax</button>
            </form>
        </div>
    </div>

    <a href="javascript:history.back()" class="btn btn-primary mt-3">Kembali</a>
@endsection