@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Report SQL01 - User Vehicle Count</h1>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Vehicle Count<i class="bi bi-arrow-down"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->userID }}</td>
                    <td>{{ $result->userName }}</td>
                    <td>{{ $result->vehicleCount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
