@extends('admin.layouts.index')

@section('container')
    <div class="card">
        <div class="card-header">
            <h3>{{ $report->title }}</h3>
        </div>
        <div class="card-body">
        <p>Sumber: <a href="https://{{ $report->link }}">{{ $report->link }}</a></p>
            <h5 class="card-small">Di laporkan oleh {{ $report->user->username }} pada tanggal {{ $report->created_at->format('j F Y, H:i a') }}</h5>
            <p>Disini gambar {Jika Ada}</p>
            <p class="card-text">Isi berita : {{ $report->body }}</p>
            @if ($report->status_report == 1) {{-- status_report 1 FAKTA --}}
                <button class="btn btn-success disabled">Fakta</button>
            @else
                <button class="btn btn-danger disabled">Hoax</button>                        
            @endif
        </div>
    </div>

    <a href="/admin/dashboard/reviewed" class="btn btn-primary mt-3">Kembali</a>
@endsection