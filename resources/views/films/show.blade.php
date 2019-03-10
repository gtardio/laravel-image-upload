@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Film: {{ $film->title }}</h1>

        <img src="{{ asset('storage/'. $film->poster) }}" alt="">


        <ul>
          <li>Id: {{ $film->id }}</li>
          <li>Name: {{ $film->title }}</li>
          <li>Slug: {{ $film->slug }}</li>
          <li>Creato il: {{ $film->created_at }}</li>
          <li>Aggiornato il: {{ $film->updated_at }}</li>
        </ul>
      </div>
    </div>
  </div>

@endsection
