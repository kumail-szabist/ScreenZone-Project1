<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-dark">
            {{ __('Snacks') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="h5 fw-bold mb-0">Snacks List</h3>
                    <a href="{{ route('snacks.create') }}" class="btn btn-primary d-inline-flex align-items-center">
                        <svg class="me-2" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2z"/></svg>
                        Create New Snack
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
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col" width="200px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($snacks as $snack)
                            <tr>
                                <td>{{ $snack->id }}</td>
                                <td class="fw-semibold">{{ $snack->title }}</td>
                                <td>Rs{{ $snack->price }}</td>
                                <td class="text-center">
                                    <form action="{{ route('snacks.destroy',$snack->id) }}" method="POST">
                                        <a href="{{ route('snacks.edit',$snack->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
