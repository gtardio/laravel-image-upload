<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $films =  Film::all();

      return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = [
        'h1' => 'Crea nuovo film',
        'action' => route('films.store'),
        'method' => 'POST'
      ];

      return view('films.create_edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data =  $request->all();

      $data['slug'] = Str::slug($data['title']);

      $newFilm = new Film;
      $newFilm->fill($data);

      $newFilm->save();

      return redirect()->route('films.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
      return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
      $data = [
        'h1' => 'edita il film '. $film->title,
        'action' => route('films.update', $film->id),
        'method' => 'PUT',
        'film' => $film
      ];

      return view('films.create_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
      $data = $request->all();

      $poster =  Storage::disk('public')->put('films_poster', $data['poster_file']);


      $data['slug'] = Str::slug($data['title']);
      $data['poster'] =  $poster;

      $film->update($data);

      return redirect()->route('films.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
      $film->delete();

      return redirect()->route('films.index');
    }
}
