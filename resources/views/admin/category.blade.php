@extends('admin.layouts.index')

@section('title_page')
    Category
@endsection

@section('container')
    <table class="table table-bordered">
        <tr>
            <td>Level</td>
            <td>Nama Category</td>
            <td>Deskripsi</td>
        </tr>
        @php $number = 1; @endphp
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->level }}</td>
                <td>{{ $category->category }}</td>
                <td>{{ $category->description }}</td>
            </tr>
        @php $number = $number+1; @endphp
        @endforeach
    </table>
@endsection