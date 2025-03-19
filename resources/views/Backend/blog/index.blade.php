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
            <form action="" method="get">
                <!-- Search Bar on the Right -->
                <div class="flex
                items-center space-x-1 p-4">
                    <div class="flex space-x-0">
                        <!-- Search Bar -->
                        <input type="text" placeholder="Search..." name="keyword" value="{{ Request::get('keyword') }}"
                            id="search-input" class="border p-2 rounded w-64">

                        <!-- Search Button -->
                        <button class="bg-blue-500 text-white px-4 py-2 rounded">
                            Search
                        </button>
                    </div>
                    <!-- Clear Button -->
                    <a href="{{ route('blog.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded ">Clear</a>
            </form>


        </div>
        </div>
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-4">
            <table class="w-full border-collapse border border-slate-300">
                <thead class="bg-slate-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4">Title</th>
                        <th class="text-left py-3 px-4">Category</th>
                        <th class="text-left py-3 px-4">Published</th>
                        <th class="text-left py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($blogs->isNotEmpty())
                        @foreach ($blogs as $blog)
                            <tr class="hover:bg-slate-50">
                                <td class="py-3 px-4">{{ $blog->title }}</td>
                                <td class="py-3 px-4">{{ $blog->categories->name }}</td>
                                <td class="py-3 px-4">{{ $blog->created_at }}</td>
                                <td class="py-3 px-4 flex space-x-4">
                                    <a href="{{ route('blog.edit', $blog->id) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                    <button data-id="{{ $blog->id }}"
                                        class="data-btn text-red-600 hover:underline">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    <!-- Repeat similar rows -->
                </tbody>
            </table>
            {{ $blogs->links() }}
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(".data-btn").on('click', function() {
                let recordId = $(this).data('id');
                let row = $(this).closest('tr');

                if (confirm('are you sure want to delete data')) {
                    $.ajax({
                        url: "{{ route('blog.delete', ':id') }}".replace(':id', recordId),
                        type: 'DELETE',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                row.remove();
                                // $('#output').text(response.message);
                            } else {
                                alert('some thing wrong');
                            }
                        },
                        error: function(xhr, status, record) {
                            alert('error detected. please try again');
                        }
                    });
                }
            });
        });
    </script>
@endsection
