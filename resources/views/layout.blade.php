<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ScreenZone</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <!-- 🔝 Navbar -->
 @include('header')

  <!-- 📄 Page Content -->
  <main>
    @yield('content')
  </main>

  <!-- 🔻 Footer -->
  @include('footer')

</body>
</html>
