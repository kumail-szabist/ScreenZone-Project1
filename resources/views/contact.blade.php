@extends('layout')

@section('content')
<section style="text-align:center; margin-top:40px;">
  <h2>📞 Contact ScreenZone</h2>
  <p style="color:#555;">Have a question or suggestion? We’d love to hear from you!</p>

  <div style="display:flex; justify-content:center; align-items:flex-start; flex-wrap:wrap; gap:40px; margin-top:30px;">

    <form style="width:350px; background:#111; color:gold; padding:25px; border-radius:10px; text-align:left;">
      <label for="name">Your Name</label><br>
      <input type="text" id="name" placeholder="Enter your name" style="width:100%; padding:10px; border-radius:6px; border:none; margin:8px 0 15px 0;"><br>

      <label for="email">Email</label><br>
      <input type="email" id="email" placeholder="Enter your email" style="width:100%; padding:10px; border-radius:6px; border:none; margin:8px 0 15px 0;"><br>

      <label for="message">Message</label><br>
      <textarea id="message" placeholder="Write your message..." rows="5" style="width:100%; padding:10px; border-radius:6px; border:none; margin:8px 0 20px 0;"></textarea><br>

      <button type="button" id="sendMsg" style="width:100%; background-color:gold; color:#000; border:none; padding:10px; border-radius:6px; font-weight:bold; cursor:pointer;">Send Message</button>
    </form>

    <!-- 🏢 Contact Details -->
    <div style="max-width:350px; text-align:left; line-height:1.8;">
      <h3>🎬 ScreenZone Cinema</h3>
      <p><b>Address:</b> SZABIST 100, Karachi, Pakistan</p>
      <p><b>Phone:</b> +92 300 1234567</p>
      <p><b>Email:</b> support@screenzone.com</p>
      <p><b>Hours:</b> Mon–Sun, 10:00 AM – 11:00 PM</p>
    </div>
  </div>
  <br><br><br><br>
</section>

<!-- SweetAlert for success  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.getElementById('sendMsg').addEventListener('click', () => {
    Swal.fire({
      title: 'Message Sent! 🎉',
      text: 'Thank you for contacting ScreenZone. We’ll get back to you soon.',
      icon: 'success',
      confirmButtonColor: 'gold',
      background: '#111',
      color: 'gold'
    });
  });
</script>
@endsection
