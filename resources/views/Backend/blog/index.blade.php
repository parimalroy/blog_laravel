@extends('Backend.account.layout.app')
@section('content')
    <section id="blogs-section" class="p-6">
        <h2 class="text-2xl font-bold text-slate-800 mb-4">Manage Blogs</h2>
        <div class="flex items-center justify-between p-4">
            <!-- "Add New" Button on the Left -->
            {{-- <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Add New
            </button> --}}
            <a href="{{ route('blog.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Blog</a>

            <!-- Search Bar on the Right -->
            <div class="flex
                items-center space-x-1 p-4">
                <!-- Search Bar -->
                <input type="text" placeholder="Search..." id="search-input" class="border p-2 rounded w-64">

                <!-- Search Button -->
                <button class="bg-blue-500 text-white px-4 py-2 rounded">
                    Search
                </button>

                <!-- Clear Button -->
                <button id="clear-button" class="bg-gray-300 text-black px-4 py-2 rounded ">
                    Clear
                </button>
            </div>
        </div>
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-4">
            <table class="w-full border-collapse border border-slate-300">
                <thead class="bg-slate-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4">Title</th>
                        <th class="text-left py-3 px-4">Author</th>
                        <th class="text-left py-3 px-4">Published</th>
                        <th class="text-left py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-slate-50">
                        <td class="py-3 px-4">How to Build Vue.js Applications</td>
                        <td class="py-3 px-4">John Doe</td>
                        <td class="py-3 px-4">15 Nov 2024</td>
                        <td class="py-3 px-4 flex space-x-4">
                            <a href="#" class="text-blue-600 hover:underline">Edit</a>
                            <a href="#" class="text-red-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                    <!-- Repeat similar rows -->
                </tbody>
            </table>
        </div>
    </section>
@endsection
