@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
    </div>
    <form action="{{ route('users.index') }}" method="get" class="my-4">
        <input type="text", name="search" placeholder="Type user name">
        <button>Search</button>
        <a type="button" href="{{ route('register.user') }}" class="btn btn-success float-end btn-sm">Add Client</a>
    </form>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>User Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if ($user->status == true)
                        <td>Active</td>
                    @else
                        <td>Inactive</td>
                    @endif
                    <td>
                        <a href=" {{ route('update.user', $user->id )}}" class="btn btn-light btn-sm">Edit</a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a onclick="deletePagingRegistry('{{ route('user.delete') }}', {{ $user->id }})" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
