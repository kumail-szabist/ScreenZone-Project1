@extends('layout')

@section('content')
<section id="booking-page" style="max-width:600px; margin:40px auto; text-align:center; background:#111; color:#fff; padding:30px; border-radius:10px;">
  <h2 style="color:gold;">Book Your Seat for {{ ucfirst($movie) }}</h2>

  <form action="{{ route('checkout') }}" method="GET" style="margin-top:20px; text-align:left;">
    <p><strong>🎬 Movie:</strong> {{ ucfirst($movie) }}</p>

    <!-- Hidden input for movie name -->
    <input type="hidden" name="movie" value="{{ $movie }}">

    <!-- 📅 Day Selection -->
    <label for="day"><strong>Select Day:</strong></label><br>
    <select id="day" name="day" style="width:100%; padding:8px; margin-bottom:15px;" required>
      <option value="Friday">Friday</option>
      <option value="Saturday">Saturday</option>
      <option value="Sunday">Sunday</option>
    </select>

    <!-- ⏰ Time Selection -->
    <label for="time"><strong>Select Time:</strong></label><br>
    <select id="time" name="time" style="width:100%; padding:8px; margin-bottom:15px;" required>
      <option value="12:00 PM">12:00 PM</option>
      <option value="3:00 PM">3:00 PM</option>
      <option value="6:00 PM">6:00 PM</option>
      <option value="9:00 PM">9:00 PM</option>
    </select>

    <!-- 💺 Seats -->
    <label for="seats"><strong>Number of Seats:</strong></label><br>
    <input type="number" id="seats" name="seats" min="1" max="10" value="1" style="width:100%; padding:8px; margin-bottom:15px;" required>

    <!-- 💵 Price -->
    <p id="price-display" style="text-align:center;">🎟️ Ticket Price: Rs <span id="price">500</span></p>
    <input type="hidden" id="total" name="total" value="500">

    <div style="text-align:center; margin-top:20px;">
      <button type="submit" style="background-color:gold; border:none; padding:10px 20px; border-radius:6px; cursor:pointer; font-size:1rem; color:#000;">
        Proceed to Checkout
      </button>
    </div>
  </form>
</section>

<script>
  const seatInput = document.getElementById('seats');
  const priceDisplay = document.getElementById('price');
  const totalInput = document.getElementById('total');
  const basePrice = 500; // per seat

  seatInput.addEventListener('input', () => {
    const total = basePrice * seatInput.value;
    priceDisplay.textContent = total;
    totalInput.value = total;
  });
</script>
@endsection
