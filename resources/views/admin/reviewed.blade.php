@extends('admin.layouts.index')

@section('title_page')
    Reviewed Reports
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
                <button class="btn btn-danger disabled">Hoax</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td><a href="">Hemat Token Listrik</a></td>
            <td>22 Maret 2022</td>
            <td>
                <button class="btn btn-success disabled">Fakta</button>
            </td>
        </tr>
    </table>
@endsection