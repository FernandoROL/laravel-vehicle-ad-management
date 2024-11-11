@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Report SQL05 - Vehicles Sorted By Brand/Type</h1>
    </div>
    <form action="{{ route('05.query') }}" method="get" class="my-4">
        <input type="text", name="brand" placeholder="Brand name">
        <input type="text", name="type" placeholder="Vehicle type">
        <button type="submit">Search</button>
    </form>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Vehicle Code</th>
                <th>Fipe Code</th>
                <th>Color</th>
                <th>Engine</th>
                <th>Trunk Size</th>
                <th>Brand</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->vehicleCode }}</td>
                    <td>{{ $result->fipeCode }}</td>
                    <td>{{ $result->color }}</td>
                    <td>{{ $result->engine }}</td>
                    <td>{{ $result->trunkSize }}</td>
                    <td>{{ $result->brandName }}</td>
                    <td>{{ $result->typeName }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
