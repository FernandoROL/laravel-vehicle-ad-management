@extends('index')

@section('content')
<form class="form" method="POST" action="{{ route('register.comment') }}">
    @csrf
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Make Comment</h1>
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
    <div class="mb-3">
        <label class="form-label">Vehicle to Comment</label>
        <select name="vehicleID" class="form-select @error('vehicleID') is-invalid @enderror">
            <option value="">Select the User</option>
            @foreach ($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}" {{ old('vehicleID') == $vehicle->id ? 'selected' : '' }}>
                    {{ $vehicle->uniqueCode }}</option>
            @endforeach
        </select>
        @if ($errors->has('userID'))
            <div class="invalid-feedback">{{ $errors->first('userID') }}</div>
        @endif
    </div>
      <div class="mb-3">
        <label class="form-label">Title</label>
        <input value="{{ @old('title') }}" class="form-control  @error('title') is-invalid @enderror" name="title">
        @if ($errors->has('title'))
          <div class="invalid-feedback"> {{$errors->first('title')}} </div>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label">Comment Body</label>
        <textarea value="{{ @old('body') }}" class="form-control  @error('body') is-invalid @enderror" name="body" rows="4"></textarea>
        @if ($errors->has('body'))
          <div class="invalid-feedback"> {{$errors->first('body')}} </div>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>        
</form>
@endsection