<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Add New Snack') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-8 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-8">
                        <h3 class="text-xl font-bold text-gray-800">Snack Details</h3>
                        <a href="{{ route('snacks.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            &larr; Back to List
                        </a>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r shadow-sm">
                            <strong class="font-bold">Whoops!</strong> There were some problems with your input.<br><br>
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('snacks.store') }}" method="POST" class="space-y-6 max-w-2xl mx-auto">
                        @csrf

                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                            <input type="text" name="title" id="title" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm" placeholder="Enter snack title" value="{{ old('title') }}">
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" step="0.01" name="price" id="price" class="block w-full rounded-lg border-gray-300 pl-7 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm" placeholder="0.00" value="{{ old('price') }}">
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-purple-600 border border-transparent rounded-lg font-semibold text-xs text-black uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                                Create Snack
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
