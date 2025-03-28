@extends('Backend.account.layout.app')

@section('content')
    <section class="p-6">
        @include('../../message')
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-8">
            <form action="{{ route('user.update') }}" method="post">
                @csrf
                <!-- Full Name -->
                <div class="mb-6">
                    <input type="hidden" value="{{ $user->id }}" name="id">
                    <label for="name" class="block text-slate-700 font-medium mb-2">Name</label>

                    <input type="text" readonly id="name" name="name" value="{{ $user->name }}"
                        class="w-full px-4 mt-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="category" class="block text-slate-700 font-medium mb-2">Status</label>
                    <select id="category" name="role"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('role') is-invalid @enderror">
                        {{-- <option value="">Role Status</option> --}}
                        @if ($user->role === 'superAdmin')
                            <option selected value="superAdmin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        @elseif($user->role == 'admin')
                            <option selected value="admin">Admin</option>
                            <option value="superAdmin">Super Admin</option>
                            <option value="user">User</option>
                        @else
                            <option selected value="user">User</option>
                            <option value="superAdmin">Super Admin</option>
                            <option value="admin">Admin</option>
                        @endif

                    </select>
                    @error('role')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('user.index') }}"
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
