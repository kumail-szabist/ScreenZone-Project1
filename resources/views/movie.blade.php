@extends('layout')

@section('content')
<section id="movie-detail" style="max-width:800px; margin:40px auto; text-align:center;">

  <h2 style="font-size:2rem; color:gold;">{{ $name }}</h2>

  <div class="trailer" style="margin:20px 0;">
    <video controls style="width:100%; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.3);">
      <source src="{{ asset('trailers/' . strtolower($name) . '.mp4') }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>

  <p class="description" style="font-size:1.1rem; color:#eee; margin-top:20px;">
    <strong>{{ $name }}</strong> is a blockbuster film filled with action, emotion, and breathtaking visuals. 
    Experience it on the big screen only at <b>ScreenZone Cinemas</b>!
  </p>

  <div style="margin-top:25px; text-align:left; background-color:#111; color:#fff; padding:20px; border-radius:8px;">
    <p><strong>🎭 Cast:</strong> 
      @if(strtolower($name) === 'inception')
        Leonardo DiCaprio, Joseph Gordon-Levitt, Tom Hardy, Ellen Page
      @elseif(strtolower($name) === 'avengers')
        Sam Worthington, Zoe Saldana, Sigourney Weaver, Stephen Lang
      @elseif(strtolower($name) === 'joker')
        Joaquin Phoenix, Robert De Niro, Zazie Beetz, Frances Conroy
      @else
        Featured cast not available.
      @endif
    </p>

    <p><strong>🕹️ Genre:</strong> 
      @switch(strtolower($name))
        @case('inception') Sci-Fi, Action @break
        @case('avengers') Sci-Fi, Adventure, Fantasy @break
        @case('joker') Drama, Thriller, Crime @break
        @default Unknown
      @endswitch
    </p>

    <p><strong>⏱️ Duration:</strong> 
      @if(strtolower($name) === 'inception')
        2h 28m
      @elseif(strtolower($name) === 'avengers')
        2h 42m
      @elseif(strtolower($name) === 'joker')
        2h 2m
      @else
        N/A
      @endif
    </p>

    <p><strong>📅 Release Date:</strong> 
      @if(strtolower($name) === 'inception')
        July 16, 2010
      @elseif(strtolower($name) === 'avengers')
        December 18, 2009
      @elseif(strtolower($name) === 'joker')
        October 4, 2019
      @else
        N/A
      @endif
    </p>

    <p><strong>⭐ Rating:</strong> 9.0/10</p>
  </div>
  <br>
  <button id="book-btn"
    onclick="window.location.href='{{ route('booking', ['movie' => strtolower($name)]) }}'"
    style="background-color:gold; border:none; padding:10px 20px; border-radius:6px; cursor:pointer; font-size:1rem; color:#000;">
    Book Now
  </button>
  <br><br><br>

</section>
@endsection
