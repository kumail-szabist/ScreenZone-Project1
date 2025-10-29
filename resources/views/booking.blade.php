@extends('layout')

@section('content')
<section id="booking-page" style="max-width:600px; margin:40px auto; text-align:center; background:#111; color:#fff; padding:30px; border-radius:10px;">
  <h2 style="color:gold;">Book Your Seat for {{ ucfirst($movie) }}</h2>

  <form id="bookingForm" onsubmit="saveBooking(event)" style="margin-top:20px; text-align:left;">
    <p><strong>🎬 Movie:</strong> {{ ucfirst($movie) }}</p>

    <input type="hidden" id="movie" value="{{ $movie }}">

    <label for="day"><strong>Select Day:</strong></label><br>
    <select id="day" style="width:100%; padding:8px; margin-bottom:15px;" required>
      <option value="Friday">Friday</option>
      <option value="Saturday">Saturday</option>
      <option value="Sunday">Sunday</option>
    </select>

    <label for="time"><strong>Select Time:</strong></label><br>
    <select id="time" style="width:100%; padding:8px; margin-bottom:15px;" required>
      <option value="12:00 PM">12:00 PM</option>
      <option value="3:00 PM">3:00 PM</option>
      <option value="6:00 PM">6:00 PM</option>
      <option value="9:00 PM">9:00 PM</option>
    </select>

    <label for="seats"><strong>Number of Seats:</strong></label><br>
    <input type="number" id="seats" min="1" max="10" value="1" style="width:100%; padding:8px; margin-bottom:15px;" required>

    <p id="price-display" style="text-align:center;">🎟️ Ticket Price: Rs <span id="price">1500</span></p>

    <div style="text-align:center; margin-top:20px;">
      <button type="submit" style="background-color:gold; border:none; padding:10px 20px; border-radius:6px; cursor:pointer; font-size:1rem; color:#000;">
        Add to Cart
      </button>
    </div>
  </form>
</section>

<script>
  const seatInput = document.getElementById('seats');
  const priceDisplay = document.getElementById('price');
  const basePrice = 1500; // per seat

  seatInput.addEventListener('input', () => {
    const total = basePrice * seatInput.value;
    priceDisplay.textContent = total;
  });

  function saveBooking(event) {
    event.preventDefault();

    const movie = document.getElementById('movie').value;
    const day = document.getElementById('day').value;
    const time = document.getElementById('time').value;
    const seats = parseInt(document.getElementById('seats').value);
    const total = basePrice * seats;

    const cartItem = {
      name: `${movie} (${day}, ${time}) - ${seats} Seat(s)`,
      price: total
    };

    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push(cartItem);
    localStorage.setItem('cart', JSON.stringify(cart));

    window.location.href = '/checkout'; // redirect to cart page
  }
</script>
@endsection
