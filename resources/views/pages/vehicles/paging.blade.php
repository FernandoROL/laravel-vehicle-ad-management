@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vehicles</h1>
    </div>
    <form action="{{ route('vehicles.index') }}" method="get" class="my-4">
        <input type="text", name="search" placeholder="Type vehicle code">
        <button>Search</button>
        <a type="button" href="{{ route('register.vehicle') }}" class="btn btn-success float-end btn-sm">Add Vehicle</a>
    </form>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Unique Code</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Version</th>
                <th>Type</th>
                <th>Fipe</th>
                <th>Color</th>
                <th>Engine</th>
                <th>Trunk Size</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->uniqueCode }}</td>
                    <td>{{ $result->brandName }}</td>
                    <td>{{ $result->modelName }}</td>
                    <td>{{ $result->versionName }}</td>
                    <td>{{ $result->typeName }}</td>
                    <td>{{ $result->fipeCode }}</td>
                    <td>{{ $result->color }}</td>
                    <td>{{ $result->engine }}</td>
                    <td>{{ $result->trunkSize }}</td>
                    <td>
                        <a href="{{ route('update.vehicle', $result->id) }}" class="btn btn-light btn-sm">Edit</a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a onclick="deletePagingRegistry('{{ route('vehicle.delete') }}', {{ $result->id }})"
                            class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
