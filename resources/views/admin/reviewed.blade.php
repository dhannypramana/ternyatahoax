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
            <th class="col-lg-5">Judul Berita</th>
            <th>Nama Pelapor</th>
            <th>Tanggal Lapor</th>
            <th>Status Report</th>
        </tr>
            @php
                $num = 1;
                @endphp
            @foreach ($reports as $report)
            <tr>
                <td>{{ $num }}</td>
                <td><a href="/admin/dashboard/reviewed/{{ $report->slug }}">{{ $report->title }}</a></td>
                <td><a href="/admin/dashboard/manage-users/{{ $report->user->username }}">{{ $report->user->full_name }}</td>
                <td>{{ $report->created_at->format('F j, Y, H:i a') }}</td>
                <td>
                    @if ($report->status_report == 1)
                        <button class="btn btn-success disabled">Fakta</button>
                    @else
                        <button class="btn btn-danger disabled">Hoax</button>                        
                        <button class="btn btn-danger disabled">{{ $report->categoryhoax->category }}</button>
                    @endif
                </td>
                @php
                    $num+=1;
                @endphp
            </tr>
            @endforeach
    </table>

    {{ $reports->links() }}

    <p class="small">*Klik di Judul laporan untuk melihat detail laporan</p>
@endsection