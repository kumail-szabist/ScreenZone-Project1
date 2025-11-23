@extends('layout')

@section('content')
<section style="text-align:center; margin-top:40px;">
  <h2>🎥 Movie Schedule</h2>
  <p>Check showtimes for the next 3 days and book your seat instantly!</p>

  <table style="width:80%; margin:30px auto; border-collapse:collapse; text-align:center; font-size:1rem;">
    <thead style="background-color:#222; color:gold;">
      <tr>
        <th style="padding:10px;">Movie</th>
        <th style="padding:10px;">Date</th>
        <th style="padding:10px;">Show Time</th>
        <th style="padding:10px;">Action</th>
      </tr>
    </thead>

    <tbody>
      @foreach ($movies as $movie)
        <!-- {{ $movie->title }} Schedule -->
        <tr style="border-bottom:1px solid #ccc;">
          <td style="padding:10px;">{{ $movie->title }}</td>
          <td style="padding:10px;">24 Oct 2025</td>
          <td style="padding:10px;">12:00 PM</td>
          <td style="padding:10px;">
            <a href="{{ route('booking', ['movie' => $movie->title]) }}">
              <button style="background-color:gold; border:none; padding:8px 15px; border-radius:6px; cursor:pointer;">
                Book Now
              </button>
            </a>
          </td>
        </tr>

        <tr style="border-bottom:1px solid #ccc;">
          <td style="padding:10px;">{{ $movie->title }}</td>
          <td style="padding:10px;">25 Oct 2025</td>
          <td style="padding:10px;">3:00 PM</td>
          <td style="padding:10px;">
            <a href="{{ route('booking', ['movie' => $movie->title]) }}">
              <button style="background-color:gold; border:none; padding:8px 15px; border-radius:6px; cursor:pointer;">
                Book Now
              </button>
            </a>
          </td>
        </tr>

        <tr style="border-bottom:1px solid #ccc;">
          <td style="padding:10px;">{{ $movie->title }}</td>
          <td style="padding:10px;">26 Oct 2025</td>
          <td style="padding:10px;">6:00 PM</td>
          <td style="padding:10px;">
            <a href="{{ route('booking', ['movie' => $movie->title]) }}">
              <button style="background-color:gold; border:none; padding:8px 15px; border-radius:6px; cursor:pointer;">
                Book Now
              </button>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <br><br><br><br><br>
</section>
@endsection
