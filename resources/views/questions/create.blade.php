@extends('layouts.app')

@section('content')
  @component('layouts.components.card', ['title' => 'ADD'])
    <div class="card-body">
      <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group mb-4">
          <label>Question</label>
          <input type="text" class="form-control" name="text" placeholder="Ex.: Qual comida lhe apetece mais?" required>
        </div>

        <label>Answers</label>
        <div id="answers-fields"></div>

        <a href="#" class="btn btn-block" id="new-answer"><i class="fa fa-plus" aria-hidden="true"></i> New answer</a>
        <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Submit</button>
      </form>
    </div>

    @include('questions.answer_field')

  @endcomponent
@endsection
