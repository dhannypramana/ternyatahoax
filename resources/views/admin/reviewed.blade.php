@extends('admin.layouts.index')

@section('title_page')
    Reviewed Reports
@endsection

@section('generate_reports')
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
@endsection

@section('container')
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Judul Berita</th>
            <th>Nama Pelapor</th>
            <th>Tanggal Lapor</th>
            {{-- <th>Action</th> --}}
        </tr>
            @php
                $num = 1;
                @endphp
            @foreach ($reports as $report)
            <tr>
                <td>{{ $num }}</td>
                <td><a href="/admin/dashboard/reviewed/{{ $report->slug }}">{{ $report->title }}</a></td>
                <td>{{ $report->user->username }}</td>
                <td>{{ $report->created_at->format('F j, Y, H:i a') }}</td>
                {{-- <td>
                    <form action="/admin/dashboard/unreviewed/delete/{{ $report->slug }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger"> Delete </button>
                    </form>
                </td> --}}
                @php
                    $num+=1;
                @endphp
            </tr>
            @endforeach
    </table>
    <p class="small">*Klik di Judul laporan untuk melihat detail laporan</p>
@endsection