@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Report SQL04 - Vehicles With Brand Name</h1>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Vehicle ID</th>
                <th>Fipe Code</th>
                <th>Brand</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->vehicleID }}</td>
                    <td>{{ $result->fipeCode }}</td>
                    <td>{{ $result->brand_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
