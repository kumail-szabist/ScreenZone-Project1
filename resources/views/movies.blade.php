@extends('layout')

@section('content')
<section id="movies-page" style="position: relative;">
  <h2>Now Showing</h2>

  <div class="search-bar-container" style="max-width: 600px; margin: 0 auto 30px auto; position: relative;">
    <div class="input-group">
        <span class="input-group-text bg-dark border-secondary text-light">
            🔍
        </span>
        <input type="text" id="search-input" class="form-control bg-dark text-light border-secondary" placeholder="Search movies by title or description..." style="padding: 12px;">
    </div>
    
    <div id="search-results" class="search-dropdown"></div>
  </div>

  <style>
      .search-dropdown {
          display: none;
          position: absolute;
          top: 100%;
          left: 0;
          width: 100%;
          background: #222;
          border: 1px solid #444;
          border-radius: 0 0 8px 8px;
          box-shadow: 0 4px 6px rgba(0,0,0,0.3);
          z-index: 1000;
          overflow: hidden;
          margin-top: 2px;
      }
      .search-item {
          display: flex;
          align-items: center;
          padding: 10px 15px;
          border-bottom: 1px solid #333;
          cursor: pointer;
          transition: background 0.2s;
          color: #eee;
          text-decoration: none;
      }
      .search-item:last-child {
          border-bottom: none;
      }
      .search-item:hover {
          background: #333;
          color: #fff;
      }
      .search-item img {
          width: 40px;
          height: 60px;
          object-fit: cover;
          border-radius: 4px;
          margin-right: 15px;
      }
      .search-item-info {
          display: flex;
          flex-direction: column;
      }
      .search-item-title {
          font-weight: bold;
          font-size: 1.1em;
      }
      .search-item-desc {
          font-size: 0.85em;
          color: #aaa;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          max-width: 400px;
      }
  </style>

  <div class="movie-container">
    @foreach ($movies as $movie)
    <div class="movie-card" onclick="window.location.href='{{ route('movie', ['name' => $movie->title]) }}'">
      <img src="/images/{{ $movie->image }}" alt="{{ $movie->title }}">
      <h3>{{ $movie->title }}</h3>
      <p>⭐ 9.0/10</p>
    </div>
    @endforeach
  </div>
  <br><br><br><br><br><br>
</section>

<script>
    document.getElementById('search-input').addEventListener('keyup', function() {
        let query = this.value;
        let resultsContainer = document.getElementById('search-results');

        if (query.length > 1) {
            fetch(`/api/movies/search?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    resultsContainer.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(movie => {
                            let item = document.createElement('a');
                            item.href = `/movie/${movie.title}`;
                            item.className = 'search-item';
                            
                            item.innerHTML = `
                                <img src="/images/${movie.image}" alt="${movie.title}">
                                <div class="search-item-info">
                                    <span class="search-item-title">${movie.title}</span>
                                    <span class="search-item-desc">${movie.description || ''}</span>
                                </div>
                            `;
                            
                            resultsContainer.appendChild(item);
                        });
                        resultsContainer.style.display = 'block';
                    } else {
                        resultsContainer.innerHTML = '<div style="padding: 15px; color: #aaa; text-align: center;">No results found</div>';
                        resultsContainer.style.display = 'block';
                    }
                });
        } else {
            resultsContainer.style.display = 'none';
        }
    });

    // Hide dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!document.getElementById('search-input').contains(e.target) && !document.getElementById('search-results').contains(e.target)) {
            document.getElementById('search-results').style.display = 'none';
        }
    });
</script>
@endsection
