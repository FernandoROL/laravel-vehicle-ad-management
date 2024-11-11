@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vehicle Models</h1>
    </div>
    <form action="{{ route('models.index') }}" method="get" class="my-4">
        <input type="text", name="search" placeholder="Type model name">
        <button>Search</button>
        <a type="button" href="{{ route('register.model') }}" class="btn btn-success float-end btn-sm">Add Model</a>
    </form>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Model ID</th>
                <th>Unique Code</th>
                <th>Brand</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->uniqueCode }}</td>
                    <td>{{ $result->brandName }}</td>
                    <td>{{ $result->name }}</td>
                    <td>
                        <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal"
                            data-bs-target="#description-modal-{{$result->id}}">show</button>
                    </td>
                    <td>{{ $result->userName }}</td>
                    <td>
                        <a href="{{ route('update.model', $result->id) }}" class="btn btn-light btn-sm">Edit</a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a onclick="deletePagingRegistry('{{ route('model.delete') }}', {{ $result->id }})"
                            class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <div class="modal fade" id="description-modal-{{$result->id}}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Model Description</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ $result->description }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
@endsection
