@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('register.type') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Make new Type</h1>
        </div>
        {{-- Name --}}
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" value="{{ @old('name') }}" class="form-control @error('name') is-invalid @enderror"
                name="name">
            @if ($errors->has('name'))
                <div class="invalid-feedback"> {{ $errors->first('name') }} </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
