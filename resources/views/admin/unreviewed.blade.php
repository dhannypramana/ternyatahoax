@extends('admin.layouts.index')

@section('title_page')
    Unreviewed Reports
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
            <th>Report Hoaks</th>
        </tr>
            @php
                $num = 1;
                @endphp
            @foreach ($reports as $report)
            <tr>
                <td>{{ $num }}</td>
                <td>{{ $report->title }}</td>
                <td>{{ $report->user->username }}</td>
                <td>{{ $report->created_at->format('F j, Y, H:i a') }}</td>
                <td>
                    <a class="btn btn-success">Fakta</a>
                    <a class="btn btn-danger">Hoax</a>
                </td>
                @php
                    $num+=1;
                @endphp
            </tr>
            @endforeach
    </table>
@endsection 

@section('ajax_script')
    <script src="/js/ajax.js"></script>
@endsection