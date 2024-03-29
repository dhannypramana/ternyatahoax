@extends('admin.layouts.index')

@section('title_page')
    Manage Admins
@endsection

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('successAdd'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('successAdd') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($admins->first())
    <table class="table table-bordered">
        <tr>
            <td>No</td>
            <td>Username</td>
            <td>Action</td>
        </tr>
        @php $number = 1; @endphp
        @foreach ($admins as $admin)
            <tr>
                <td>{{ $number }}</td>
                <td>{{ $admin['username'] }}</td>
                <td>
                    <a href="/admin/dashboard/manage/delete/{{ $admin->id }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @php $number = $number+1; @endphp
        @endforeach
    </table>
    @else
        <p class="border bg-primary p-4 text-white text-center">No Admins</p>
    @endif

    <a href="/admin/dashboard/manage/add" class="btn btn-primary">Tambah Admin</a>
    {{ $admins->links() }}
@endsection