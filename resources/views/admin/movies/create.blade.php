<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-dark">
            {{ __('Add New Movie') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="h5 fw-bold mb-0">Movie Details</h3>
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

                <form id="create-movie-form">
                    {{-- Validations handled in JS or API response --}}
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter movie title">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter movie description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        <div class="mt-2">
                            <img id="image-preview" src="#" alt="Image Preview" style="display: none; max-width: 200px; max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
                            Create Movie
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('image-preview');
            
            if (file) {
                // Validation: Check file type
                const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
                if (!validTypes.includes(file.type)) {
                    alert('Please select a valid image file (JPEG, PNG, GIF, SVG).');
                    this.value = ''; // Clear the input
                    preview.style.display = 'none';
                    return;
                }

                // Validation: Check file size (max 2MB)
                const maxSizeInBytes = 2 * 1024 * 1024; // 2MB
                if (file.size > maxSizeInBytes) {
                    alert('File size exceeds 2MB. Please select a smaller image.');
                    this.value = ''; // Clear the input
                    preview.style.display = 'none';
                    return;
                }

                // Preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });

        document.getElementById('create-movie-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('/api/movies', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    // Content-Type not set for FormData, browser sets it with boundary
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert('Movie created successfully!');
                    window.location.href = "{{ route('admin.movies.index') }}";
                } else {
                    alert('Error creating movie: ' + (data.message || JSON.stringify(data)));
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
