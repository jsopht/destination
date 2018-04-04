@extends('layouts.app')

@section('content')
  @component('layouts.components.card', ['title' => 'UPDATE'])
    <div class="card-body">
      <form action="{{ route('countries.update', $country->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">

        <div class="form-group mb-4">
          <label>Name</label>
          <input type="text" class="form-control" name="name" placeholder="Ex.: Brasil" value="{{ $country->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Submit</button>
      </form>

      <form action="{{ route('countries.destroy', $country->id) }}" method="POST">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="DELETE">
        <button type="submit" class="btn btn-danger btn-block mt-2">Delete</button>
      </form>
    </div>
  @endcomponent
@endsection
