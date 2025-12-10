<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-dark">
            {{ __('Add New Snack') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="h5 fw-bold mb-0">Snack Details</h3>
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

                <form id="create-snack-form">
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter snack title">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">Rs</span>
                            <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="0.00">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
                            Create Snack
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('create-snack-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            // Convert to JSON if no files needed, or just use FormData (easier)
            // But Controller expects standard request inputs. FormData works fine.
            
            fetch('/api/snacks', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert('Snack created successfully!');
                    window.location.href = "{{ route('admin.snacks.index') }}";
                } else {
                    alert('Error creating snack: ' + (data.message || JSON.stringify(data)));
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
