@extends('layout')

@section('content')
<section id="movies-page">
  <h2>Now Showing</h2>

  <!-- <div class="search-bar">
    <input type="text" placeholder="Search for a movie...">
    <button>Search</button>
  </div> -->

  <div class="movie-container">
    <div class="movie-card" onclick="window.location.href='{{ route('movie', ['name' => 'avengers']) }}'">
  <img src="{{ asset('images/endgame.jpeg') }}" alt="Movie 1">
  <h3>Avengers: Endgame</h3>
  <p>⭐ 9.0/10</p>
</div>

<div class="movie-card" onclick="window.location.href='{{ route('movie', ['name' => 'inception']) }}'">
  <img src="{{ asset('images/inception.jpeg') }}" alt="Movie 2">
  <h3>Inception</h3>
  <p>⭐ 8.8/10</p>
</div>

<div class="movie-card" onclick="window.location.href='{{ route('movie', ['name' => 'joker']) }}'">
  <img src="{{ asset('images/joker.jpeg') }}" alt="Movie 3">
  <h3>Joker</h3>
  <p>⭐ 8.5/10</p>
</div>



  </div>
  <br><br><br><br><br><br>
</section>
@endsection
