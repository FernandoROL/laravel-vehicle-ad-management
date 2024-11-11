@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row mb-3">
        <div class="col-md-2 card" style="width: 20rem;">
            <div class="card-header">
                User Vehicle Count
            </div>
            <div class="row m-1" style="height: 10rem; overflow: scroll">
                <ul class="col list-group list-group-flush">
                    @foreach ($userVehicle as $item)
                        <li class="list-group-item">{{ $item->userName }}</li>
                    @endforeach
                </ul>
                <ul class="col-md-3 list-group list-group-flush">
                    @foreach ($userVehicle as $item)
                        <li class="list-group-item">{{ $item->vehicleCount }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-2 card mx-4" style="width: 20rem;">
            <div class="card-header">
                Brand Vehicle Count
            </div>
            <div class="row m-1" style="height: 10rem; overflow: scroll">
                <ul class="col list-group list-group-flush">
                    @foreach ($brandVehicle as $item)
                        <li class="list-group-item">{{ $item->brandName }}</li>
                    @endforeach
                </ul>
                <ul class="col-md-3 list-group list-group-flush">
                    @foreach ($brandVehicle as $item)
                        <li class="list-group-item">{{ $item->vehicleCount }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col card" style="width: 20rem;">
            <div class="card-header">
                Vehicle Brands
            </div>
            <div class="row" style="height: 10rem; overflow: scroll">
                <ul class="col list-group list-group-flush">
                    @foreach ($vehicleBrands as $item)
                        <li class="list-group-item">{{ $item->fipeCode }}</li>
                    @endforeach
                </ul>
                <ul class="col list-group list-group-flush">
                    @foreach ($vehicleBrands as $item)
                        <li class="list-group-item">{{ $item->brandName }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col card" style="width: 20rem;">
            <div class="card-header">
                Brand Models & Versions
            </div>
            <div class="row m-1" style="height: 10rem; overflow: scroll">
                <ul class="col list-group list-group-flush">
                    @foreach ($brandModelVersion as $item)
                        <li class="list-group-item">{{ $item->brandName }}</li>
                    @endforeach
                </ul>
                <ul class="col-md-2 list-group list-group-flush">
                    @foreach ($brandModelVersion as $item)
                        <li class="list-group-item">{{ $item->ModelCount }}</li>
                    @endforeach
                </ul>
                <ul class="col-md-2 list-group list-group-flush">
                    @foreach ($brandModelVersion as $item)
                        <li class="list-group-item">{{ $item->VersionCount }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-4 card mx-4">
            <div class="card-header">
                Inactive User Listings
            </div>
            <div class="row m-1" style="height: 10rem; overflow: scroll">
                <ul class="col list-group list-group-flush">
                    @foreach ($inactiveuserListings as $item)
                        <li class="list-group-item">{{ $item->userName }}</li>
                    @endforeach
                    @if (Count($inactiveuserListings) == 0)
                        <li class="card-text mt-2">No inactive user listings</li>
                    @endif
                </ul>
                <ul class="col list-group list-group-flush">
                    @foreach ($inactiveuserListings as $item)
                        <li class="list-group-item">{{ $item->vehicleCode }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col card" style="width: 20rem;">
            <div class="card-header">
                Inactive Listings
            </div>
            <div class="row m-1" style="height: 10rem; overflow: scroll">
                <ul class="col list-group list-group-flush">
                    @foreach ($inactiveListings as $item)
                        <li class="list-group-item">{{ $item->vehicleCode }}</li>
                    @endforeach
                    @if (Count($inactiveListings) == 0)
                        <li class="card-text mt-2">No inactive listings</li>
                    @endif
                </ul>
                <ul class="col-md-3 list-group list-group-flush">
                    @foreach ($inactiveListings as $item)
                        <li class="list-group-item">{{ $item->lastUpdate }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
