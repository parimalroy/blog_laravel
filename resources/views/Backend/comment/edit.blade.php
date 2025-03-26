@extends('Backend.account.layout.app')

@section('content')
    <section class="p-6">
        @include('../../message')
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-8">
            <form action="{{ route('comment.update') }}" method="post">
                @csrf
                <!-- Full Name -->
                <div class="mb-6">
                    <input type="hidden" value="{{ $comment->id }}" name="id">
                    <label for="name" class="block text-slate-700 font-medium mb-2">Comment</label>
                    <h2 id="success" class=" text-green-600"></h2>
                    <h2 id="error" class=" text-red-600"></h2>
                    <input type="text" id="name" name="comment" value="{{ $comment->comment }}"
                        class="w-full px-4 mt-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('comment') is-invalid @enderror">
                    @error('comment')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="category" class="block text-slate-700 font-medium mb-2">Status</label>
                    <select id="category" name="status"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('status') is-invalid @enderror">
                        <option value="">Select Status</option>
                        @if ($comment->status === 1)
                            <option selected value="1">Active</option>
                            <option value="0">Inactive</option>
                        @else
                            <option selected value="0">Inactive</option>
                            <option value="1">Active</option>
                        @endif

                    </select>
                    @error('status')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('comment.index') }}"
                        class="px-6 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-500 transition">Cancel</a>
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-500 transition"
                        id="submitBtn">Save
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
