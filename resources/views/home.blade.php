@extends('app')

@section('content')
<section id="homemain" 
    style="
        background: url('{{ asset('images/cinema-bg.jpg') }}') no-repeat center center/cover;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: #fff;
        position: relative;
    ">

  <!-- Dark overlay for readability -->
  <div style="
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.6);
        z-index: 0;
    ">
  </div>

  <!-- Main content -->
  <div style="z-index: 1;">
    <h2 style="font-size: 3rem; font-weight: bold; margin-bottom: 15px;">Welcome to ScreenZone</h2>
    <p style="font-size: 1.25rem; margin-bottom: 25px;">
      Your favorite cinema — book seats, watch trailers, and enjoy the show!
    </p>
    <button 
      onclick="window.location.href='{{ route('movies') }}'" 
      style="
        background-color: #e50914;
        border: none;
        padding: 12px 28px;
        border-radius: 30px;
        color: white;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background 0.3s;
      "
      onmouseover="this.style.backgroundColor='#b00610'"
      onmouseout="this.style.backgroundColor='#e50914'"
    >
      Book Your Seat Now!
    </button>
  </div>
</section>
@endsection
