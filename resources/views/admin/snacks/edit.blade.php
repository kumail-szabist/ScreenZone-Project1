<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-dark">
            {{ __('Edit Snack') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="h5 fw-bold mb-0">Edit Snack Details</h3>
                    <a href="{{ route('admin.snacks.index') }}" class="btn btn-outline-secondary btn-sm">
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

                <form id="edit-snack-form">

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" value="{{ $snack->title }}" class="form-control" placeholder="Enter snack title">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">Rs</span>
                            <input type="number" step="0.01" name="price" id="price" value="{{ $snack->price }}" class="form-control" placeholder="0.00">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
                            Update Snack
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('edit-snack-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            // No files for snacks, so we can use JSON or FormData. 
            // Using JSON for variety/cleanliness on PUT, but FormData is fine too.
            // Let's use JSON for PUT here since no files involved.
            
            const plainFormData = Object.fromEntries(formData.entries());
            
            fetch('/api/snacks/{{ $snack->id }}', {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(plainFormData)
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert('Snack updated successfully!');
                    window.location.href = "{{ route('admin.snacks.index') }}";
                } else {
                    alert('Error updating snack: ' + (data.message || JSON.stringify(data)));
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
