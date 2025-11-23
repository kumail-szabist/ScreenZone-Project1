@extends('layout')

@section('content')
<section id="checkout-page" style="max-width:1000px; margin:40px auto; color:#fff;">
  <h2 style="color:gold; text-align:center;">🎬 Checkout</h2>
  <p style="text-align:center; margin-bottom:30px;">Review your selected movies and add snacks!</p>

  <div style="display:flex; gap:30px; flex-wrap:wrap;">

    <!-- CART SUMMARY -->
    <div style="flex:1; min-width:300px; background:#111; padding:20px; border-radius:10px;">
      <h3 style="color:gold;">Your Cart</h3>
      <div id="cart-items"></div>
      <hr>
      <div id="snack-summary"></div>
      <hr>
      <p style="font-size:18px;"><strong>Total Amount:</strong> Rs <span id="grand-total">0</span></p>

      <button onclick="window.location.href='{{ route('billing.form') }}'"
        style="background:gold; color:#000; padding:10px 20px; border:none; border-radius:6px; cursor:pointer; width:100%;">
        Proceed to Checkout
      </button>
    </div>

    <!-- SNACK SECTION -->
    <div style="flex:1; min-width:300px; background:#111; padding:20px; border-radius:10px;">
      <h3 style="color:gold;">🍿 Add Snacks</h3>
      <p style="margin-bottom:15px;">Select optional snacks to enjoy during your movie.</p>

      <div id="snack-options" style="display:flex; flex-direction:column; gap:15px;">
        @foreach ($snacks as $snack)
          <div class="snack-item"
              data-name="{{ $snack->title }}"
              data-price="{{ $snack->price }}"
              style="display:flex; align-items:center; justify-content:space-between; background:#222; padding:10px 15px; border-radius:8px;">
            <div>
              <strong>{{ $snack->title }}</strong> (Rs {{ $snack->price }})
            </div>
            <div style="display:flex; align-items:center; gap:10px;">
              <button class="decrease" style="background:gold; border:none; padding:5px 10px; border-radius:5px; cursor:pointer;">−</button>
              <span class="quantity" style="min-width:25px; text-align:center;">0</span>
              <button class="increase" style="background:gold; border:none; padding:5px 10px; border-radius:5px; cursor:pointer;">+</button>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
let cart = JSON.parse(localStorage.getItem('cart')) || [];
let snackCart = JSON.parse(localStorage.getItem('snackCart')) || {};
const cartContainer = document.getElementById('cart-items');
const snackSummary = document.getElementById('snack-summary');
const grandTotalDisplay = document.getElementById('grand-total');

const snackItems = document.querySelectorAll('.snack-item');

// --- Render Cart Items ---
function renderCart() {
  cartContainer.innerHTML = '';
  if (cart.length === 0) {
    cartContainer.innerHTML = '<p>No bookings yet.</p>';
    updateTotal();
    return;
  }

  cart.forEach((item, index) => {
    const div = document.createElement('div');
    div.style = 'display:flex; justify-content:space-between; align-items:center; background:#222; padding:10px 15px; border-radius:8px; margin-bottom:10px;';
    div.innerHTML = `
      <span>${item.name}</span>
      <div>
        Rs ${item.price}
        <button onclick="removeFromCart(${index})" style="background:red; color:white; border:none; padding:5px 10px; margin-left:10px; border-radius:5px; cursor:pointer;">Remove</button>
      </div>
    `;
    cartContainer.appendChild(div);
  });

  updateTotal();
}

// --- Remove a Movie from Cart ---
function removeFromCart(index) {
  cart.splice(index, 1);
  localStorage.setItem('cart', JSON.stringify(cart));
  renderCart();
}

// --- Update Total ---
function updateTotal() {
  const ticketTotal = cart.reduce((sum, item) => sum + item.price, 0);
  let snackTotal = 0;
  let snackList = [];

  for (let name in snackCart) {
    const { qty, price } = snackCart[name];
    if (qty > 0) {
      snackTotal += qty * price;
      snackList.push(`${name} x${qty} (Rs ${qty * price})`);
    }
  }

  const grandTotal = ticketTotal + snackTotal;
  grandTotalDisplay.textContent = grandTotal;

  snackSummary.innerHTML = snackList.length
    ? `<strong>Snacks:</strong><br>${snackList.join('<br>')}`
    : '<em>No snacks selected.</em>';

  localStorage.setItem('snackCart', JSON.stringify(snackCart));
}

// --- Snack Quantity Logic ---
snackItems.forEach(item => {
  const name = item.dataset.name;
  const price = parseInt(item.dataset.price);
  const qtySpan = item.querySelector('.quantity');
  const inc = item.querySelector('.increase');
  const dec = item.querySelector('.decrease');

  if (!snackCart[name]) snackCart[name] = { qty: 0, price };

  qtySpan.textContent = snackCart[name].qty;

  inc.addEventListener('click', () => {
    snackCart[name].qty++;
    qtySpan.textContent = snackCart[name].qty;
    updateTotal();
  });

  dec.addEventListener('click', () => {
    if (snackCart[name].qty > 0) snackCart[name].qty--;
    qtySpan.textContent = snackCart[name].qty;
    updateTotal();
  });
});

// --- Initialize ---
renderCart();
</script>
@endsection
