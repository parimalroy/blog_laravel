@extends('Backend.account.layout.app')
@section('content')
    <section id="blogs-section" class="p-6">
        <h2 class="text-2xl font-bold text-slate-800 mb-4">Categories</h2>
        <div class="mb-6">
            <a href="{{ route('category.create') }}"
                class="px-6 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-500 transition">Create
                Categories</a>
        </div>
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-4">
            <table class="w-full border-collapse border border-slate-300">
                <thead class="bg-slate-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4">Categories Title</th>
                        {{-- <th class="text-left py-3 px-4">Author</th> --}}
                        <th class="text-left py-3 px-4">Published</th>
                        <th class="text-left py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories->isNotEmpty())
                        @foreach ($categories as $categorie)
                            <tr class="hover:bg-slate-50">
                                <td class="py-3 px-4">{{ $categorie->name }}</td>
                                {{-- <td class="py-3 px-4">John Doe</td> --}}
                                <td class="py-3 px-4">{{ $categorie->created_at }}</td>
                                <td class="py-3 px-4 flex space-x-4">
                                    <a href="{{ route('category.edit', $categorie->id) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                    <a href="#" class="text-red-600 hover:underline">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    <!-- Repeat similar rows -->
                </tbody>
            </table>
        </div>
    </section>
@endsection
