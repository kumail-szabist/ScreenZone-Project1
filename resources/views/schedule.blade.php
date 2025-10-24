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
      @php
        $movies = [
          ['name' => 'Inception', 'times' => ['12:00 PM', '3:00 PM', '6:00 PM']],
          ['name' => 'avengers', 'times' => ['1:00 PM', '4:00 PM', '7:00 PM']],
          ['name' => 'Joker', 'times' => ['11:00 AM', '2:00 PM', '5:00 PM']],
        ];

        $dates = [
          now()->format('d M Y'),
          now()->addDay()->format('d M Y'),
          now()->addDays(2)->format('d M Y'),
        ];
      @endphp

      @foreach($movies as $movie)
        @foreach($dates as $date)
          <tr style="border-bottom:1px solid #ccc;">
            <td style="padding:10px;">{{ $movie['name'] }}</td>
            <td style="padding:10px;">{{ $date }}</td>
            <td style="padding:10px;">{{ $movie['times'][array_rand($movie['times'])] }}</td>
            <td style="padding:10px;">
              <a href="{{ route('booking', ['movie' => strtolower($movie['name'])]) }}">
                <button style="background-color:gold; border:none; padding:8px 15px; border-radius:6px; cursor:pointer;">
                  Book Now
                </button>
              </a>
            </td>
          </tr>
        @endforeach
      @endforeach
    </tbody>
  </table>
  <br><br><br><br><br>
</section>
@endsection
