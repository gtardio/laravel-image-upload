@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Tutti i Film</h1>
        <a href="{{ route('films.create' )}}" class="btn btn-primary">Crea Nuovo</a>
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Titolo</th>
              <th>Slug</th>
              <th>Edit</th>
              <th>Vsualizza</th>
              <th>Elimina</th>
            </tr>
          </thead>

          <tbody>
            @forelse ($films as $film )
              <tr>
                <td>{{ $film->id }}</td>
                <td>{{ $film->title }}</td>
                <td>{{ $film->slug }}</td>
                <td>
                  <a href="{{route('films.edit', $film->id)}}" class="btn btn-success">Edit</a>
                </td>
                <td>
                  <a href="{{route('films.show', $film->id)}}" class="btn btn-primary">View</a>
                </td>
                <td>
                  <form action="{{route('films.destroy', $film->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Elimina" class="btn btn-danger">
                  </form>
                </td>
              </tr>
              @empty
                <h1>Non ci sono Film</h1>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
