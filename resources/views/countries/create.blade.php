@extends('layouts.app')

@section('content')
  @component('layouts.components.card', ['title' => 'ADD'])
    <div class="card-body">
      <form action="{{ route('countries.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group mb-4">
          <label>Name</label>
          <input type="text" class="form-control" name="name" placeholder="Ex.: Brasil" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Submit</button>
      </form>
    </div>
  @endcomponent
@endsection
