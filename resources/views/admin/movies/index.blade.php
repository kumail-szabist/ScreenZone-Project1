<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-dark">
            {{ __('Movies') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="h5 fw-bold mb-0">Movies List</h3>
                    <a href="{{ route('admin.movies.create') }}" class="btn btn-primary d-inline-flex align-items-center">
                        <svg class="me-2" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2z"/></svg>
                        Create New Movie
                    </a>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="mb-0">{{ $message }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col" width="200px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="movies-table-body">
                            {{-- Loaded via JS --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/movies')
                .then(response => response.json())
                .then(data => {
                    const tbody = document.getElementById('movies-table-body');
                    tbody.innerHTML = '';
                    data.forEach(movie => {
                        const row = `
                            <tr>
                                <td>${movie.id}</td>
                                <td><img src="/images/${movie.image || 'placeholder.jpg'}" class="rounded" width="80px"></td>
                                <td class="fw-semibold">${movie.title}</td>
                                <td class="text-muted text-truncate" style="max-width: 250px;">${movie.description || ''}</td>
                                <td class="text-center">
                                    <a href="/admin/movies/${movie.id}/edit" class="btn btn-sm btn-info text-white">Edit</a>
                                    <button onclick="deleteMovie(${movie.id})" class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        `;
                        tbody.innerHTML += row;
                    });
                })
                .catch(error => console.error('Error fetching movies:', error));
        });

        function deleteMovie(id) {
            if(confirm('Are you sure?')) {
                fetch(`/api/movies/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        alert('Movie deleted successfully');
                        location.reload(); // Simple reload to refresh list
                    } else {
                        alert('Error deleting movie');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }
    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
