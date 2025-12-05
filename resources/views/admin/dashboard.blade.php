<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-2xl font-bold text-gray-800">Welcome, Admin!</h3>
                        <span class="text-sm text-gray-500">{{ now()->format('l, F j, Y') }}</span>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Manage Movies -->
                        <div class="p-6 border border-gray-100 rounded-xl bg-gradient-to-br from-indigo-50 to-white shadow-sm hover:shadow-md transition duration-300">
                            <div class="flex items-center mb-4">
                                <div class="p-3 bg-indigo-100 rounded-full mr-4">
                                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path></svg>
                                </div>
                                <h4 class="text-xl font-bold text-gray-800">Manage Movies</h4>
                            </div>
                            <p class="mb-6 text-gray-600">Add, edit, or remove movies from the catalog. Keep the showing list up to date.</p>
                            <a href="{{ route('movies.index') }}" class="inline-flex items-center px-5 py-2.5 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-black uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Go to Movies
                                <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>

                        <!-- Manage Snacks -->
                        <div class="p-6 border border-gray-100 rounded-xl bg-gradient-to-br from-purple-50 to-white shadow-sm hover:shadow-md transition duration-300">
                            <div class="flex items-center mb-4">
                                <div class="p-3 bg-purple-100 rounded-full mr-4">
                                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <h4 class="text-xl font-bold text-gray-800">Manage Snacks</h4>
                            </div>
                            <p class="mb-6 text-gray-600">Update snack prices and availability. Create delicious combos.</p>
                            <a href="{{ route('snacks.index') }}" class="inline-flex items-center px-5 py-2.5 bg-purple-600 border border-transparent rounded-lg font-semibold text-xs text-black uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Go to Snacks
                                <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
