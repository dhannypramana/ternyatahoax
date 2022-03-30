@extends('admin.layouts.index')

@section('title_page')
    Unreviewed Reports
@endsection

@section('container')
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Judul Hoaks</th>
            <th>Tanggal Ajuan</th>
            <th>Review Hoaks</th>
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