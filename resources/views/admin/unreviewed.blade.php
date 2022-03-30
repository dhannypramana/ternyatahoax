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
            <th>Judul Hoaks</th>
            <th>Tanggal Ajuan</th>
            <th>Report Hoaks</th>
        </tr>
        <tr>
            <td>1</td>
            <td><a href="#">Hacker WhatsApp</a></td>
            <td>20 Maret 2022</td>
            <td>
                <button class="btn btn-success">Fakta</button>
                <button class="btn btn-danger">Hoax</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td><a href="">Hemat Token Listrik</a></td>
            <td>22 Maret 2022</td>
            <td>
                <button class="btn btn-success">Fakta</button>
                <button class="btn btn-danger">Hoax</button>
            </td>
        </tr>
    </table>
@endsection 

@section('ajax_script')
    <script src="/js/ajax.js"></script>
@endsection