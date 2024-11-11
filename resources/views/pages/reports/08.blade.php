@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Report SQL08 - Inactive Listings (60 Days)</h1>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Vehicle ID</th>
                <th>Unique Code</th>
                <th>Last Updated / Commented in</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->vehicleID }}</td>
                    <td>{{ $result->vehicleCode }}</td>
                    <td>{{ $result->lastUpdate }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
