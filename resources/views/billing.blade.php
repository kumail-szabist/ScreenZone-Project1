@extends('layout')

@section('content')
<section id="checkout-form" style="max-width:700px; margin:50px auto; background:#111; color:#fff; padding:30px; border-radius:12px;">

  <h2 style="color:gold; text-align:center;">🎟️ Final Checkout</h2>
  <p style="text-align:center; margin-bottom:25px;">Please enter your delivery and payment details to complete your order.</p>

  <form id="placeOrderForm" onsubmit="handleOrder(event)">
    <div style="margin-bottom:20px;">
      <label style="color:gold;">Full Name:</label><br>
      <input type="text" id="name" name="name" required 
             style="width:100%; padding:10px; border-radius:6px; border:none; margin-top:5px;">
    </div>

    <div style="margin-bottom:20px;">
      <label style="color:gold;">Email:</label><br>
      <input type="email" id="email" name="email" required 
             style="width:100%; padding:10px; border-radius:6px; border:none; margin-top:5px;">
    </div>

    <div style="margin-bottom:20px;">
      <label style="color:gold;">Address:</label><br>
      <textarea id="address" name="address" rows="3" required
                style="width:100%; padding:10px; border-radius:6px; border:none; margin-top:5px;"></textarea>
    </div>

    <div style="margin-bottom:25px;">
      <label style="color:gold;">Mode of Payment:</label><br>
      <select id="paymentMode" name="paymentMode" required
              style="width:100%; padding:10px; border-radius:6px; border:none; margin-top:5px;">
        <option value="" disabled selected>Select Payment Method</option>
        <option value="Cash on Delivery">Cash on Delivery</option>
        <option value="Credit Card">Credit / Debit Card</option>
        <option value="Easypaisa">Easypaisa</option>
        <option value="JazzCash">JazzCash</option>
      </select>
    </div>

    <div id="card-details" style="display:none; margin-bottom:20px;">
      <label style="color:gold;">Card Details:</label><br>
      <input type="text" placeholder="Card Number" maxlength="16"
             style="width:100%; padding:10px; border-radius:6px; border:none; margin-top:5px;">
      <input type="text" placeholder="Expiry (MM/YY)"
             style="width:49%; padding:10px; border-radius:6px; border:none; margin-top:5px;">
      <input type="text" placeholder="CVV" maxlength="3"
             style="width:49%; padding:10px; border-radius:6px; border:none; margin-top:5px; float:right;">
    </div>

    <button type="submit" 
            style="width:100%; background:gold; color:#000; padding:12px 0; border:none; border-radius:8px; font-weight:bold; cursor:pointer; font-size:1.1rem;">
      Place Order
    </button>
  </form>
</section>

<!-- sweetalert connection -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

<script>
  const paymentSelect = document.getElementById('paymentMode');
  const cardDetails = document.getElementById('card-details');

  // Show card details only if "Credit Card" is selected
  paymentSelect.addEventListener('change', function() {
    cardDetails.style.display = (this.value === 'Credit Card') ? 'block' : 'none';
  });

  function handleOrder(event) {
    event.preventDefault();
    
    const name = document.getElementById('name').value;
    const address = document.getElementById('address').value;
    const payment = document.getElementById('paymentMode').value;

    Swal.fire({
      title: 'Order Placed Successfully 🎉',
      html: `
        <b>Name:</b> ${name}<br>
        <b>Address:</b> ${address}<br>
        <b>Payment Mode:</b> ${payment}<br><br>
        Thank you for choosing <b>ScreenZone</b>! 🍿
      `,
      icon: 'success',
      background: '#111',
      color: '#fff',
      confirmButtonColor: 'gold'
    }).then(() => {
      // ✅ Clear local storage
      localStorage.removeItem('cart');

      // ✅ Redirect to postcheckout.php after alert
      window.location.href = '/postcheckout';
    });
  }
</script>
@endsection
