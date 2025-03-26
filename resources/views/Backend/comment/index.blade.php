@extends('Backend.account.layout.app')
@section('content')
    <section id="blogs-section" class="p-6">
        <h2 class="text-2xl font-bold text-slate-800 mb-4">Manage Comment</h2>
        {{-- <div class="flex items-center justify-between p-4">
            <!-- "Add New" Button on the Left -->
            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Add New
            </button>
            <a href="{{ route('blog.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Blog</a>
            <form action="" method="get">
                <!-- Search Bar on the Right -->
                <div class="flex
                items-center space-x-1 p-4">
                    <div class="flex space-x-0">
                        <!-- Search Bar -->
                        <input type="text" placeholder="Search..." name="keyword" value="{{ Request::get('keyword') }}"
                            id="search-input" class="border p-2 rounded w-96">

                        <!-- Search Button -->
                        <button class="bg-blue-500 text-white px-4 py-2 rounded">
                            Search
                        </button>
                    </div>
                    <!-- Clear Button -->
                    <a href="{{ route('blog.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded ">Clear</a>
                </div>
        </div> --}}
        </form>



        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-4">
            <table class="w-full border-collapse border border-slate-300">
                <thead class="bg-slate-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4">Blog Title</th>
                        <th class="text-left py-3 px-4">Comment</th>
                        <th class="text-left py-3 px-4">User</th>
                        <th class="text-left py-3 px-4">Status</th>
                        <th class="text-left py-3 px-4">Actions</th>
                    </tr>
                </thead>
                @if ($comments->isNotEmpty())
                    @foreach ($comments as $cmt)
                        <tbody>

                            <tr class="hover:bg-slate-50">
                                <td class="py-3 px-4">{{ $cmt->blogs->title }}</td>
                                <td class="py-3 px-4">{{ $cmt->comment }}</td>
                                <td class="py-3 px-4">{{ $cmt->users->name }}</td>
                                <td class="py-3 px-4">
                                    @if ($cmt->status === 1)
                                        <span class="text-green-600">active</span>
                                    @else
                                        <span class="text-red-600">inactive</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 flex space-x-4">
                                    <a href="{{ route('comment.edit', $cmt->id) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                    <button data-id="" class="data-btn text-red-600 hover:underline">Delete</button>
                                </td>
                            </tr>


                            <!-- Repeat similar rows -->
                        </tbody>
                    @endforeach
                @endif
            </table>
            {{-- {{ $blogs->links() }} --}}
        </div>
    </section>
@endsection
