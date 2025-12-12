<x-app-layout>
    <div class="py-4">
        <!-- Welcome Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card bg-primary text-white shadow-sm border-0 bg-gradient" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);">
                    <div class="card-body p-4 p-lg-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="display-6 fw-bold mb-2">Welcome Back, {{ Auth::user()->name }}!</h1>
                                <p class="lead mb-0 opacity-75">Here's what's happening at ScreenZone today.</p>
                            </div>
                            <div class="d-none d-md-block opacity-50">
                                <i class="bi bi-speedometer2" style="font-size: 4rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                    <i class="bi bi-film fs-4"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="card-title text-muted mb-0">Total Movies</h6>
                                <h2 class="mt-2 mb-0 fw-bold">{{ $stats['movies_count'] }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                    <i class="bi bi-cup-straw fs-4"></i>
                                </div>
                            </div>
                            <div>
                                <h6 class="card-title text-muted mb-0">Total Snacks</h6>
                                <h2 class="mt-2 mb-0 fw-bold">{{ $stats['snacks_count'] }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <h4 class="fw-bold mb-4 ps-1 text-secondary">Quick Actions</h4>

        <!-- Action Cards -->
        <div class="row g-4">
            <!-- Manage Movies -->
            <div class="col-md-6">
                <a href="{{ route('admin.movies.index') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-all bg-white">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary bg-opacity-10 text-primary rounded p-2 me-3">
                                    <i class="bi bi-film fs-3"></i>
                                </div>
                                <h4 class="card-title fw-bold text-dark mb-0">Manage Movies</h4>
                            </div>
                            <p class="card-text text-secondary mb-4">Add new releases, edit details, or remove movies from the catalog. Keep your cinema schedule up to date.</p>
                            <div class="d-flex align-items-center text-primary fw-semibold">
                                View Movies Catalog <i class="bi bi-arrow-right ms-2"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Manage Snacks -->
            <div class="col-md-6">
                <a href="{{ route('admin.snacks.index') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-all bg-white">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning bg-opacity-10 text-warning rounded p-2 me-3">
                                    <i class="bi bi-cup-straw fs-3"></i>
                                </div>
                                <h4 class="card-title fw-bold text-dark mb-0">Manage Snacks</h4>
                            </div>
                            <p class="card-text text-secondary mb-4">Update snack inventory, adjust prices, and manage combo offers for your customers.</p>
                            <div class="d-flex align-items-center text-warning fw-semibold">
                                View Snacks Menu <i class="bi bi-arrow-right ms-2"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    <style>
        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        }
        .transition-all {
            transition: all 0.3s ease;
        }
    </style>
</x-app-layout>
