@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Brands</h1>
    </div>
    <form action="{{ route('brands.index') }}" method="get" class="my-4">
        <input type="text", name="search" placeholder="Type user name">
        <button>Search</button>
        <a type="button" href="{{ route('register.brand') }}" class="btn btn-success float-end btn-sm">Add Client</a>
    </form>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Brand ID</th>
                <th>Unique Code</th>
                <th>Brand Name</th>
                <th>Description</th>
                <th>Added By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->uniqueCode }}</td>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->description }}</td>
                    <td>{{ $result->userName }}</td>
                    <td>
                        <a href=" {{ route('update.brand', $result->id )}}" class="btn btn-light btn-sm">Edit</a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a onclick="deletePagingRegistry('{{ route('brand.delete') }}', {{ $result->id }})" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
