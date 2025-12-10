<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-dark">
            {{ __('Edit Movie') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="h5 fw-bold mb-0">Edit Movie Details</h3>
                    <a href="{{ route('admin.movies.index') }}" class="btn btn-outline-secondary btn-sm">
                        &larr; Back to List
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong class="fw-bold">Whoops!</strong> There were some problems with your input.<br><br>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="edit-movie-form">
                    {{-- Validations handled in JS --}}

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" value="{{ $movie->title }}" class="form-control" placeholder="Enter movie title">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter movie description">{{ $movie->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if($movie->image)
                            <div class="mt-2 text-center text-md-start">
                                <img src="/images/{{ $movie->image }}" class="rounded shadow-sm" style="width:128px; height:192px; object-fit:cover;">
                                <p class="text-muted small mt-1">Current Image</p>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
                            Update Movie
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('edit-movie-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            formData.append('_method', 'PUT'); // Fake PUT for Laravel to handle files
            
            fetch('/api/movies/{{ $movie->id }}', {
                method: 'POST', // Must use POST when sending FormData with files + _method=PUT
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert('Movie updated successfully!');
                    window.location.href = "{{ route('admin.movies.index') }}";
                } else {
                    alert('Error updating movie: ' + (data.message || JSON.stringify(data)));
                    console.error(data);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
            </div>
        </div>
    </div>
</x-app-layout>
