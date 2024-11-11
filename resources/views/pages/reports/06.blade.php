@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Report SQL06 - Inactive User Listings</h1>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Vehicle Unique Code</th>
                <th>User Name</th>
                <th>User Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->vehicleCode }}</td>
                    <td>{{ $result->userName }}</td>
                    <td>{{ $result->userEmail }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
