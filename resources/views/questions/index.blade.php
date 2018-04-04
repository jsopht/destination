@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <a href="{{ route('questions.create') }}" class="btn btn-block btn-primary btn-lg ml-auto my-4" style="max-width: 200px;">
          <i class="fa fa-plus" aria-hidden="true"></i> New Question</h4>
        </a>
      </div>

      @forelse($questions as $question)
        <div class="col-sm-12 col-md-4 col-lg-3">
          <a href="{{ route('questions.edit', $question->id) }}">
            <div class="card text-white bg-info mb-3">
              <div class="card-body">
                <h4 class="card-title">{{ $question->text }}</h4>
                {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
              </div>
            </div>
          </a>
        </div>
      @empty
        <div class="col text-center mt-4">
          <h1>Nothing here...</h1>
        </div>
      @endforelse
    </div>
  </div>
@endsection
