@extends('admin.layouts.index')

@section('container')
    <h3>Judul Berita : {{ $report->title }}</h3>
    <p>Isi Berita : {{ $report->body }}</p>
    <p>Link Berita: {{ $report->link }}</p>
    <p>Disini Gambar {Jika Ada}</p>
    <p>Di laporkan Oleh : {{ $report->user->username }}</p>
    <p>Pada Tanggal : {{ $report->created_at->format('F j, Y, H:i a') }}</p>
    <h1>TAMPILAN NYA DI PERBAGUS NANTI YA BGSD, YG PENTING JALAN DLU FUNGSI NYA</h1>
    <form action="/admin/dashboard/unreviewed/{{ $report->slug }}/set-fact" method="post">
        @csrf
        <button type="submit" class="btn btn-success" name="fact">Fakta</button>
    </form>
    <form action="/admin/dashboard/unreviewed/{{ $report->slug }}/set-hoax" method="post">
        @csrf
        <button type="submit" class="btn btn-danger" name="hoax">Hoax</button>
    </form>
    
    <a href="/admin/dashboard/unreviewed" class="btn btn-primary">Kembali</a>
@endsection