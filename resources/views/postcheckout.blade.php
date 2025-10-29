@extends('layout')

@section('content')
<section class="thankyou-container">
  <div class="thankyou-card">
    <h1>🎉 Thank You!</h1>
    <p>Your purchase was successful. We hope you enjoy your experience!</p>
    <hr>
    <a href="/" class="home-btn">Back to Home</a>
  </div>
</section>

<style>
  body {
    background-color: #111;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
  }

  .thankyou-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
  }

  .thankyou-card {
    background: #1a1a1a;
    border-radius: 12px;
    padding: 40px 50px;
    max-width: 500px;
    width: 90%;
    text-align: center;
    box-shadow: 0 0 15px rgba(255, 215, 0, 0.2);
  }

  .thankyou-card h1 {
    color: #00c853;
    font-size: 2.2rem;
    margin-bottom: 10px;
  }

  .thankyou-card p {
    font-size: 1.1rem;
    color: #ccc;
    margin-bottom: 20px;
  }

  .thankyou-card hr {
    border: 0;
    border-top: 1px solid #333;
    margin: 20px 0;
  }

  .home-btn {
    display: inline-block;
    background: gold;
    color: #000;
    text-decoration: none;
    padding: 10px 25px;
    border-radius: 8px;
    font-weight: bold;
    transition: 0.3s;
  }

  .home-btn:hover {
    background: #ffce00;
    transform: scale(1.05);
  }
</style>
@endsection
