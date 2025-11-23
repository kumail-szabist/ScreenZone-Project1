@extends('layout')

@section('content')
<section id="movies-page">
  <h2>Now Showing</h2>

  <!-- <div class="search-bar">
    <input type="text" placeholder="Search for a movie...">
    <button>Search</button>
  </div> -->

  <div class="movie-container">
    @foreach ($movies as $movie)
    <div class="movie-card" onclick="window.location.href='{{ route('movie', ['name' => $movie->title]) }}'">
      <img src="/images/{{ $movie->image }}" alt="{{ $movie->title }}">
      <h3>{{ $movie->title }}</h3>
      <p>⭐ 9.0/10</p>
    </div>
    @endforeach
  </div>
  <br><br><br><br><br><br>
</section>
@endsection
