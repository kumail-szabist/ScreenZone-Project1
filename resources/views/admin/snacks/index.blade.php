<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Snacks Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold">Snacks List</h3>
                        <a href="{{ route('snacks.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                            + Create New Snack
                        </a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">No</th>
                                    <th class="py-3 px-6 text-left">Title</th>
                                    <th class="py-3 px-6 text-left">Price</th>
                                    <th class="py-3 px-6 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @foreach ($snacks as $snack)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $snack->id }}</td>
                                    <td class="py-3 px-6 text-left font-medium">{{ $snack->title }}</td>
                                    <td class="py-3 px-6 text-left">${{ $snack->price }}</td>
                                    <td class="py-3 px-6 text-center">
                                        <form action="{{ route('snacks.destroy',$snack->id) }}" method="POST" class="flex justify-center space-x-2">
                                            <a href="{{ route('snacks.edit',$snack->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition" onclick="return confirm('Are you sure?')">Delete</button>
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
    </div>
</x-app-layout>
