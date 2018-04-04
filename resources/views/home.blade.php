@extends('layouts.app')

@section('content')

  @component('layouts.components.card', ['title' => 'VIEW'])
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12 col-md-6 my-2">
          <a href="{{ route('questions.index') }}" class="btn btn-info btn-block btn-lg">Questions</a>
        </div>
        <div class="col-sm-12 col-md-6 my-2">
          <a href="{{ route('countries.index') }}" class="btn btn-success btn-block btn-lg">Countries</a>
        </div>
      </div>
    </div>
  @endcomponent


@endsection
