@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User Comments</h1>
    </div>

    <form action="{{ route('comments.index') }}" method="get" class="my-4">
        <input type="text", name="search" placeholder="Type user name">
        <button>Search</button>
        <a type="button" href="{{ route('register.comment') }}" class="btn btn-success float-end btn-sm">Make Comment</a>
    </form>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Comment ID</th>
                <th>Title</th>
                <th>Message</th>
                <th>Vehicle Commented</th>
                <th>Commenter</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->title }}</td>
                    <td>
                        <div class="modal fade" id="message-modal-{{$result->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Message body</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $result->body }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal"
                            data-bs-target="#message-modal-{{$result->id}}">show message</button>
                    </td>
                    <td>{{ $result->vehicleCode }}</td>
                    <td>{{ $result->userName }}</td>
                    <td>
                        <a href=" {{ route('update.comment', $result->id) }}" class="btn btn-light btn-sm">Edit</a>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <a onclick="deletePagingRegistry('{{ route('comment.delete') }}', {{ $result->id }})"
                            class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
