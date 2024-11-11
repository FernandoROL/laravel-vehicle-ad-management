@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Report SQL07 - User Comments By Vehicle</h1>
    </div>
    <form class="my-4" action="{{ route('07.query') }}" method="get">
        <select name="vehicleID" class="p-1 px-5 mh-20">
            <option value="">Select Vehicle</option>
            @foreach ($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}">{{ $vehicle->uniqueCode }}</option>
            @endforeach
        </select>
        
        <button>Search</button>
    </form>
        
    </select>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>User</th>
                <th>Commented on</th>
                <th>Title</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->commenter }}</td>
                    <td>{{ $result->commentDate }}</td>
                    <td>{{ $result->commentTitle }}</td>
                    <td>
                        <div class="modal fade" id="message-modal-{{$result->commentID}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $result->commentTitle }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $result->commentBody }}
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
                            data-bs-target="#message-modal-{{$result->commentID}}">show comment</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
