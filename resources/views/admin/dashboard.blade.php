<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Welcome, Admin!</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Manage Movies -->
                        <div class="p-6 border rounded-lg bg-gray-50 hover:bg-gray-100 transition">
                            <h4 class="text-xl font-semibold mb-2">🎬 Manage Movies</h4>
                            <p class="mb-4">Add, edit, or remove movies from the catalog.</p>
                            <a href="{{ route('movies.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Go to Movies
                            </a>
                        </div>

                        <!-- Manage Snacks -->
                        <div class="p-6 border rounded-lg bg-gray-50 hover:bg-gray-100 transition">
                            <h4 class="text-xl font-semibold mb-2">🍿 Manage Snacks</h4>
                            <p class="mb-4">Update snack prices and availability.</p>
                            <a href="{{ route('snacks.index') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Go to Snacks
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
