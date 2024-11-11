@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('register.vehicle') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add New Vehicle</h1>
        </div>

        {{-- User --}}
        <div class="mb-3">
            <label class="form-label">User</label>
            <select name="userID" class="form-select @error('userID') is-invalid @enderror">
                <option value="">Select the User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('userID') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('userID'))
                <div class="invalid-feedback">{{ $errors->first('userID') }}</div>
            @endif
        </div>

        <div class="row">
            {{-- Unique Code --}}
            <div class="col mb-3">
                <label class="form-label">Unique Code</label>
                <input type="text" value="{{ old('uniqueCode') }}"
                    class="form-control @error('uniqueCode') is-invalid @enderror" name="uniqueCode">
                @if ($errors->has('uniqueCode'))
                    <div class="invalid-feedback">{{ $errors->first('uniqueCode') }}</div>
                @endif
            </div>

            {{-- Fipe Code --}}
            <div class="col mb-3">
                <label class="form-label">Fipe Code</label>
                <input type="text" value="{{ old('fipeCode') }}"
                    class="form-control @error('fipeCode') is-invalid @enderror" name="fipeCode">
                @if ($errors->has('fipeCode'))
                    <div class="invalid-feedback">{{ $errors->first('fipeCode') }}</div>
                @endif
            </div>
        </div>

        <div class="row">
            {{-- Brand --}}
        <div class="col mb-3">
            <label class="form-label">Brand</label>
            <select name="brandID" class="form-select @error('brandID') is-invalid @enderror">
                <option value="">Select a Brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brandID') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('brandID'))
                <div class="invalid-feedback">{{ $errors->first('brandID') }}</div>
            @endif
        </div>

        {{-- Model --}}
        <div class="col mb-3">
            <label class="form-label">Model</label>
            <select name="modelID" class="form-select @error('modelID') is-invalid @enderror">
                <option value="">Select a Model</option>
                @foreach ($models as $model)
                    <option value="{{ $model->id }}" {{ old('modelID') == $model->id ? 'selected' : '' }}>
                        {{ $model->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('modelID'))
                <div class="invalid-feedback">{{ $errors->first('modelID') }}</div>
            @endif
        </div>

        {{-- Version --}}
        <div class="col mb-3">
            <label class="form-label">Version</label>
            <select name="versionID" class="form-select @error('versionID') is-invalid @enderror">
                <option value="">Select a Version</option>
                @foreach ($versions as $version)
                    <option value="{{ $version->id }}" {{ old('versionID') == $version->id ? 'selected' : '' }}>
                        {{ $version->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('versionID'))
                <div class="invalid-feedback">{{ $errors->first('versionID') }}</div>
            @endif
        </div>

        {{-- Type --}}
        <div class="col mb-3">
            <label class="form-label">Type</label>
            <select name="typeID" class="form-select @error('typeID') is-invalid @enderror">
                <option value="">Select a Type</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('typeID') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('typeID'))
                <div class="invalid-feedback">{{ $errors->first('typeID') }}</div>
            @endif
        </div>
        </div>  

        {{-- Color --}}
        <div class="mb-3">
            <label class="form-label">Color</label>
            <input type="text" value="{{ old('color') }}" class="form-control @error('color') is-invalid @enderror"
                name="color">
            @if ($errors->has('color'))
                <div class="invalid-feedback">{{ $errors->first('color') }}</div>
            @endif
        </div>

        {{-- Engine --}}
        <div class="mb-3">
            <label class="form-label">Engine</label>
            <input type="text" value="{{ old('engine') }}" class="form-control @error('engine') is-invalid @enderror"
                name="engine">
            @if ($errors->has('engine'))
                <div class="invalid-feedback">{{ $errors->first('engine') }}</div>
            @endif
        </div>

        {{-- Trunk Size --}}
        <div class="mb-3">
            <label class="form-label">Trunk Size</label>
            <input type="text" value="{{ old('trunkSize') }}"
                class="form-control @error('trunkSize') is-invalid @enderror" name="trunkSize">
            @if ($errors->has('trunkSize'))
                <div class="invalid-feedback">{{ $errors->first('trunkSize') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
