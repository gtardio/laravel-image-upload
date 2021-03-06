@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>{{ $h1 }}</h1>
        <form class="form-group" action="{{ $action }}" method="post" enctype="multipart/form-data">
          @csrf
          @method($method)

          <div class="form-group">
            <label for="title">Nome</label>
            <input type="text" name="title" placeholder="Inserisci il titolo" class="form-control" value="{{ (!empty($film)) ? $film->title : null }}">
          </div>

          <div class="form-group">
            <label for="poster_file">Poster</label>
            <br>
            <input type="file" name="poster_file" placeholder="Inserisci l'immagine inerente al film">

          </div>

          <div class="form-group">
            <input type="submit" value="Salva" class="btn btn-primary">

          </div>

        </form>
      </div>
    </div>
  </div>

@endsection
