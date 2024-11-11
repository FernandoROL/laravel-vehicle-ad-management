@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('register.version') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add new Version</h1>
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
            {{-- Name --}}
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" value="{{ @old('name') }}" class="form-control @error('name') is-invalid @enderror"
                    name="name">
                @if ($errors->has('name'))
                    <div class="invalid-feedback"> {{ $errors->first('name') }} </div>
                @endif
            </div>
            {{-- Unique Code --}}
            <div class="col smb-3">
                <label class="form-label">Unique Code</label>
                <input type="text" value="{{ old('uniqueCode') }}"
                    class="form-control @error('uniqueCode') is-invalid @enderror" name="uniqueCode">
                @if ($errors->has('uniqueCode'))
                    <div class="invalid-feedback">{{ $errors->first('uniqueCode') }}</div>
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

        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea type="text" value="{{ old('description') }}"
                class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
            @if ($errors->has('description'))
                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
