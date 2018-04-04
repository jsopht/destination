@extends('layouts.app')

@section('content')
  @component('layouts.components.card', ['title' => 'ADD'])
    <div class="card-body">
      <form action="{{ route('questions.update', $question->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">

        <div class="form-group mb-4">
          <label>Question</label>
          <input type="text" class="form-control" name="text" placeholder="Ex.: Qual comida lhe apetece mais?" value="{{ $question->text }}" required>
        </div>

        <label>Answers</label>
        <div id="answers-fields">
          @foreach($question->answers as $answer)
            <div class="form-group mb-5">
              <input type="hidden" class="form-control" id="id" value="{{ $answer->id }}">
              <input type="text" class="form-control" id="text" placeholder="Ex.: Carne" required value="{{ $answer->text }}">
              <textarea class="form-control mt-2" id="description"  placeholder="Description">{{ $answer->description }}</textarea>
              <select multiple class="form-control mt-2 select2-mult" id="countries" required>
                @foreach($countries as $country)
                  <option value="{{ $country->id }}" @if($answer->countries->contains($country->id)) selected @endif>{{ $country->name }}</option>
                @endforeach
              </select>
              <a href="#" class="remove-answer btn btn-outline-danger btn-sm mt-2 float-right"><i class="fa fa-trash" aria-hidden="true"></i> Remover</a>
              <div class="clearfix"></div>
            </div>
          @endforeach
        </div>

        <a href="#" class="btn btn-block" id="new-answer"><i class="fa fa-plus" aria-hidden="true"></i> New answer</a>
        <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Submit</button>
      </form>

      <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="DELETE">
        <button type="submit" class="btn btn-danger btn-block mt-2">Delete</button>
      </form>
    </div>

    @include('questions.answer_field')

  @endcomponent
@endsection
