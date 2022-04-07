@extends('admin.layouts.index')

@section('title_page')
    Manage Users
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
    @if ($users->first())
    <table class="table table-bordered">
        <tr>
            <td>No</td>
            <td>Username</td>
            <td>Nama</td>
        </tr>
        @php $number = 1; @endphp
        @foreach ($users as $user)
            <tr>
                <td>{{ $number }}</td>
                <td>
                    <a href="/admin/dashboard/manage-users/{{ $user->username }}">{{ $user->username }}</a>
                </td>
                <td>{{ $user->full_name }}</td>
            </tr>
        @php $number = $number+1; @endphp
        @endforeach
    </table>
    <p class="small">*Klik di username untuk melihat detail user</p>
    @else
        <p class="border bg-primary p-4 text-white text-center">No Users</p>
    @endif
    
    {{ $users->links() }}
@endsection