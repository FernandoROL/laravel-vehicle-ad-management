@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vehicle Types</h1>
    </div>
    <form action="{{ route('types.index') }}" method="get" class="my-4">
        <input type="text", name="search" placeholder="Type version name">
        <button>Search</button>
        <a type="button" href="{{ route('register.type') }}" class="btn btn-success float-end btn-sm">Add Type</a>
    </form>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Type ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->name }}</td>
                    <td>
                        <a href="{{ route('update.type', $result->id) }}" class="btn btn-light btn-sm">Edit</a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a onclick="deletePagingRegistry('{{ route('type.delete') }}', {{ $result->id }})"
                            class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
