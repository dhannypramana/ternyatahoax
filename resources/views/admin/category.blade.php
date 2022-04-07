@extends('admin.layouts.index')

@section('title_page')
    Category
@endsection

@section('container')
    <table class="table table-bordered">
        <tr class="bg-primary text-white">
            <td class="p-3">Level</td>
            <td class="p-3">Nama Category</td>
            <td class="p-3">Deskripsi</td>
        </tr>
        @php $number = 1; @endphp
        @foreach ($categories as $category)
            <tr>
                <td class="p-3">{{ $category->level }}</td>
                <td class="p-3">{{ $category->category }}</td>
                <td class="p-3">{{ $category->description }}</td>
            </tr>
        @php $number = $number+1; @endphp
        @endforeach
    </table>
@endsection