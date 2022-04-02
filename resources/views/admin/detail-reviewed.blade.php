@extends('admin.layouts.index')

@section('container')
    <h3>Judul Berita : {{ $report->title }}</h3>
    <p>Isi Berita : {{ $report->body }}</p>
    <p>Link Berita: {{ $report->link }}</p>
    <p>Disini Gambar {Jika Ada}</p>
    <p>Di laporkan Oleh : {{ $report->user->username }}</p>
    <p>Pada Tanggal : {{ $report->created_at->format('F j, Y, H:i a') }}</p>
    @if ($report->status_report == 1) {{-- status_report 1 FAKTA --}}
        <button type="disable" class="btn btn-success">Fakta</button>
    @else
        <button class="btn btn-danger disabled">Hoax</button>                        
    @endif
    <h1>TAMPILAN NYA DI PERBAGUS NANTI YA BGSD, YG PENTING JALAN DLU FUNGSI NYA</h1>
    
    <a href="/admin/dashboard/reviewed" class="btn btn-primary">Kembali</a>
@endsection