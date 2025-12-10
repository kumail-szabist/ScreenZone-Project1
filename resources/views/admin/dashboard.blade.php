<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-dark">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="row g-4">
            <!-- Manage Movies -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-4 bg-light rounded">
                        <div class="d-flex align-items-center mb-3">
                            <span class="fs-2 me-3">🎬</span>
                            <h4 class="card-title fw-bold text-dark mb-0">Manage Movies</h4>
                        </div>
                        <p class="card-text text-muted mb-4">Add, edit, or remove movies from the catalog. Keep the showing list up to date.</p>
                        <a href="{{ route('admin.movies.index') }}" class="btn btn-primary d-inline-flex align-items-center">
                            Go to Movies
                            <svg class="ms-2" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Manage Snacks -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-4 bg-light rounded">
                        <div class="d-flex align-items-center mb-3">
                            <span class="fs-2 me-3">🍿</span>
                            <h4 class="card-title fw-bold text-dark mb-0">Manage Snacks</h4>
                        </div>
                        <p class="card-text text-muted mb-4">Update snack prices and availability. Create delicious combos.</p>
                        <a href="{{ route('admin.snacks.index') }}" class="btn btn-secondary d-inline-flex align-items-center">
                            Go to Snacks
                            <svg class="ms-2" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
