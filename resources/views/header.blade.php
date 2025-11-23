<header>
  <nav class="navbar">
    <h1 class="logo">🎬 ScreenZone</h1>

    <div class="menu-toggle" id="menu-toggle">
      ☰
    </div>

    <ul class="nav-links" id="nav-links">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('public.movies') }}">Movies</a></li>
      <li><a href="{{ route('schedule') }}">Booking</a></li>
      <li><a href="{{ route('contact') }}">Contact</a></li>
      <li><a href="{{ route('checkout') }}"> 🛒 </a></li>

    </ul>
  </nav>
</header>

<style>

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #111;
  padding: 15px 25px;
  color: #fff;
  position: sticky;
  top: 0;
  z-index: 10;
}

.logo {
  font-size: 1.5rem;
  font-weight: bold;
}

.nav-links {
  display: flex;
  gap: 25px;
  list-style: none;
}

.nav-links a {
  text-decoration: none;
  color: #fff;
  transition: color 0.3s ease;
}

.nav-links a:hover {
  color: #ff4444;
}

.menu-toggle {
  display: none;
  font-size: 1.8rem;
  cursor: pointer;
}

/* in small screen the css will change for navbar */
@media (max-width: 768px) {
  .menu-toggle {
    display: block;
  }

  .nav-links {
    display: none;
    flex-direction: column;
    position: absolute;
    top: 70px;
    right: 0;
    background: #111;
    width: 100%;
    text-align: center;
    padding: 20px 0;
  }

  .nav-links.active {
    display: flex;
  }

  .nav-links li {
    margin: 15px 0;
  }
}
</style>

<script>
const toggle = document.getElementById('menu-toggle');
const navLinks = document.getElementById('nav-links');

toggle.addEventListener('click', () => {
  navLinks.classList.toggle('active');
});
</script>
