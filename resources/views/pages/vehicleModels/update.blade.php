@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('update.model', $results->id) }}">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Update Model</h1>
        </div>

        <div class="row">
            {{-- User --}}
            <div class="col mb-3">
                <label class="form-label">User</label>
                <select name="userID" class="form-select @error('userID') is-invalid @enderror">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"
                            {{ old('userID', $results->userID) == $user->id ? 'selected' : '' }}
                            {{ old('userID') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('userID'))
                    <div class="invalid-feedback">{{ $errors->first('userID') }}</div>
                @endif
            </div>
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
        </div>

        {{-- Name --}}
        <div class="col mb-3">
            <label class="form-label">Model Name</label>
            <input type="text" value="{{ isset($results->name) ? $results->name : old('name') }}" class="form-control @error('name') is-invalid @enderror"
                name="name">
            @if ($errors->has('name'))
                <div class="invalid-feedback"> {{ $errors->first('name') }} </div>
            @endif
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea type="text" value="{{ isset($results->description) ? $results->description : old('description') }}"
                class="form-control @error('description') is-invalid @enderror" name="description">{{ isset($results->description) ? $results->description : old('description') }}</textarea>
            @if ($errors->has('description'))
                <div class="invalid-feedback">{{ $errors->first('description') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
