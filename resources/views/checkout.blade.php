@extends('layout')

@section('content')
<section id="checkout-page" style="max-width:1000px; margin:40px auto; color:#fff;">

  <h2 style="color:gold; text-align:center;">🎬 Checkout</h2>
  <p style="text-align:center; margin-bottom:30px;">Review your booking and add snacks if you like!</p>

  <div style="display:flex; gap:30px; flex-wrap:wrap;">

    <!-- LEFT: Booking Details -->
    <div style="flex:1; min-width:300px; background:#111; padding:20px; border-radius:10px;">
      <h3 style="color:gold;">Booking Summary</h3>
      <p><strong>Movie:</strong> {{ request('movie') ?? 'N/A' }}</p>
      <p><strong>Seats:</strong> {{ request('seats') ?? 1 }}</p>
      <p><strong>Day:</strong> {{ request('day') ?? 'Not Selected' }}</p>
      <p><strong>Time:</strong> {{ request('time') ?? 'Not Selected' }}</p>
      <hr>
      <p><strong>Ticket Price:</strong> Rs <span id="ticket-price">{{ request('total') ?? 500 }}</span></p>

      <div id="snack-summary"></div>

      <hr>
      <p style="font-size:18px;"><strong>Total Amount:</strong> Rs <span id="grand-total">{{ request('total') ?? 500 }}</span></p>
<button onclick="window.location.href='{{ route('billing.form') }}'" 
        style="background:gold; color:#000; padding:10px 20px; border:none; border-radius:6px; cursor:pointer; width:100%;">
  Proceed to Checkout
</button>
      <br><br><br><br>
    </div>
    

    <div style="flex:1; min-width:300px; background:#111; padding:20px; border-radius:10px;">
      <h3 style="color:gold;">🍿 Add Snacks</h3>
      <p style="margin-bottom:15px;">Select optional snacks to enjoy during your movie.</p>

      <div id="snack-options" style="display:flex; flex-direction:column; gap:15px;">
        @php
          $snacks = [
            ['name' => 'Popcorn', 'price' => 200],
            ['name' => 'Cold Drink', 'price' => 150],
            ['name' => 'Chips', 'price' => 120],
            ['name' => 'Juice', 'price' => 180],
          ];
        @endphp

        @foreach ($snacks as $snack)
        <div class="snack-item" 
             data-name="{{ $snack['name'] }}" 
             data-price="{{ $snack['price'] }}"
             style="display:flex; align-items:center; justify-content:space-between; background:#222; padding:10px 15px; border-radius:8px;">
          <div>
            <strong>{{ $snack['name'] }}</strong> (Rs {{ $snack['price'] }})
          </div>
          <div style="display:flex; align-items:center; gap:10px;">
            <button class="decrease" style="background:gold; border:none; padding:5px 10px; border-radius:5px; cursor:pointer; font-weight:bold;">-</button>
            <span class="quantity" style="min-width:25px; text-align:center;">0</span>
            <button class="increase" style="background:gold; border:none; padding:5px 10px; border-radius:5px; cursor:pointer; font-weight:bold;">+</button>
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </div>
</section>

<!-- SweetAlert2 for confirmation -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  const snackItems = document.querySelectorAll('.snack-item');
  const totalDisplay = document.getElementById('grand-total');
  const ticketPrice = parseInt(document.getElementById('ticket-price').textContent);
  const snackSummary = document.getElementById('snack-summary');
  let total = ticketPrice;

  function updateTotals() {
    let snackTotal = 0;
    let selectedSnacks = [];

    snackItems.forEach(item => {
      const qty = parseInt(item.querySelector('.quantity').textContent);
      const price = parseInt(item.dataset.price);
      const name = item.dataset.name;
      if (qty > 0) {
        snackTotal += qty * price;
        selectedSnacks.push(`${name} x${qty} (Rs ${qty * price})`);
      }
    });

    total = ticketPrice + snackTotal;
    totalDisplay.textContent = total;
    snackSummary.innerHTML = selectedSnacks.length
      ? `<strong>Snacks:</strong><br>${selectedSnacks.join('<br>')}`
      : '';
  }

  snackItems.forEach(item => {
    const increaseBtn = item.querySelector('.increase');
    const decreaseBtn = item.querySelector('.decrease');
    const qtySpan = item.querySelector('.quantity');

    increaseBtn.addEventListener('click', () => {
      qtySpan.textContent = parseInt(qtySpan.textContent) + 1;
      updateTotals();
    });

    decreaseBtn.addEventListener('click', () => {
      const newQty = parseInt(qtySpan.textContent) - 1;
      qtySpan.textContent = newQty >= 0 ? newQty : 0;
      updateTotals();
    });
  });

  document.getElementById('confirm-btn').addEventListener('click', () => {
    let summaryText = snackSummary.innerHTML || 'None';
    Swal.fire({
      title: 'Booking Confirmed 🎉',
      html: `
        <b>Movie:</b> {{ request('movie') ?? 'N/A' }}<br>
        <b>Seats:</b> {{ request('seats') ?? 1 }}<br>
        <b>Snacks:</b><br>${summaryText}<br>
        <b>Total Paid:</b> Rs ${total}
      `,
      icon: 'success',
      background: '#111',
      color: '#fff',
      confirmButtonColor: 'gold'
    });
  });
</script>
@endsection
