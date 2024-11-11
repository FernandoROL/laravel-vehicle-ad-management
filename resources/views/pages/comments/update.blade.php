@extends('index')

@section('content')
<form class="form" method="POST" action="{{ route('update.comment', $results->id) }}">
    @csrf
    @method('PUT')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Comment</h1>
    </div>
    {{-- User --}}
      <div class="mb-3">
        <label class="form-label">Title</label>
        <input value="{{ isset($results->title) ? $results->title : old('title') }}" class="form-control  @error('title') is-invalid @enderror" name="title">
        @if ($errors->has('title'))
          <div class="invalid-feedback"> {{$errors->first('title')}} </div>
        @endif
      </div>
      <div class="mb-3">
        <label class="form-label">Comment Body</label>
        <textarea value="{{ isset($results->body) ? $results->body : old('body') }}" class="form-control  @error('body') is-invalid @enderror" name="body" rows="4">{{ isset($results->body) ? $results->body : old('body') }}</textarea>
        @if ($errors->has('body'))
          <div class="invalid-feedback"> {{$errors->first('body')}} </div>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>        
</form>
@endsection