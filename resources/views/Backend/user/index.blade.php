@extends('Backend.account.layout.app')
@section('content')
    <section id="blogs-section" class="p-6">
        <h2 class="text-2xl font-bold text-slate-800 mb-4">Manage User</h2>

        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-4">
            <table class="w-full border-collapse border border-slate-300">
                <thead class="bg-slate-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4">User name</th>
                        <th class="text-left py-3 px-4">Role</th>
                        <th class="text-left py-3 px-4">Register Date</th>
                        <th class="text-left py-3 px-4">Actions</th>
                    </tr>
                </thead>
                @if ($users->isNotEmpty())
                    @foreach ($users as $user)
                        <tbody>

                            <tr class="hover:bg-slate-50">
                                <td class="py-3 px-4">{{ $user->name }}</td>
                                <td class="py-3 px-4">{{ $user->role }}</td>
                                <td class="py-3 px-4">{{ $user->created_at }}</td>

                                <td class="py-3 px-4 flex space-x-4">
                                    <a href="{{ route('user.edit', $user->id) }}"
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
