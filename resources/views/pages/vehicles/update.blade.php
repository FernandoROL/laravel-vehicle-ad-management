@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('update.vehicle', $results->id) }}">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Update Vehicle</h1>
        </div>

        {{-- User --}}
        <div class="mb-3">
            <label class="form-label">User</label>
            <select name="userID" class="form-select @error('userID') is-invalid @enderror">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('userID', $results->userID) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('userID'))
                <div class="invalid-feedback">{{ $errors->first('userID') }}</div>
            @endif
        </div>
        <div class="row">
            {{-- Brand --}}
            <div class="col mb-3">
                <label class="form-label">Brand</label>
                <select name="brandID" class="form-select @error('brandID') is-invalid @enderror">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}"
                            {{ old('brandID', $results->brandID) == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('brandID'))
                    <div class="invalid-feedback">{{ $errors->first('brandID') }}</div>
                @endif
            </div>

            {{-- Model --}}
            <div class="col-md-3 mb-3">
                <label class="form-label">Model</label>
                <select name="modelID" class="form-select @error('modelID') is-invalid @enderror">
                    @foreach ($models as $model)
                        <option value="{{ $model->id }}"
                            {{ old('modelID', $results->modelID) == $model->id ? 'selected' : '' }}>
                            {{ $model->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('modelID'))
                    <div class="invalid-feedback">{{ $errors->first('modelID') }}</div>
                @endif
            </div>

            {{-- Version --}}
            <div class="col-md-3 mb-3">
                <label class="form-label">Version</label>
                <select name="versionID" class="form-select @error('versionID') is-invalid @enderror">
                    @foreach ($versions as $version)
                        <option value="{{ $version->id }}"
                            {{ old('versionID', $results->versionID) == $version->id ? 'selected' : '' }}>
                            {{ $version->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('versionID'))
                    <div class="invalid-feedback">{{ $errors->first('versionID') }}</div>
                @endif
            </div>
        </div>

        <div class="row">
            {{-- Type --}}
            <div class="col mb-3">
                <label class="form-label">Type</label>
                <select name="typeID" class="form-select @error('typeID') is-invalid @enderror">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ old('typeID', $results->typeID) == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('typeID'))
                    <div class="invalid-feedback">{{ $errors->first('typeID') }}</div>
                @endif
            </div>

            {{-- Color --}}
            <div class="col mb-3">
                <label class="form-label">Color</label>
                <input type="text" value="{{ isset($results->color) ? $results->color : old('color') }}"
                    class="form-control @error('color') is-invalid @enderror" name="color">
                @if ($errors->has('color'))
                    <div class="invalid-feedback">{{ $errors->first('color') }}</div>
                @endif
            </div>

            {{-- Engine --}}
            <div class="col mb-3">
                <label class="form-label">Engine</label>
                <input type="text" value="{{ isset($results->engine) ? $results->engine : old('engine') }}"
                    class="form-control @error('engine') is-invalid @enderror" name="engine">
                @if ($errors->has('engine'))
                    <div class="invalid-feedback">{{ $errors->first('engine') }}</div>
                @endif
            </div>

            {{-- Trunk Size --}}
            <div class="col-md-1 mb-3">
                <label class="form-label">Trunk Size</label>
                <input type="text" value="{{ isset($results->trunkSize) ? $results->trunkSize : old('trunkSize') }}"
                    class="form-control @error('trunkSize') is-invalid @enderror" name="trunkSize">
                @if ($errors->has('trunkSize'))
                    <div class="invalid-feedback">{{ $errors->first('trunkSize') }}</div>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
