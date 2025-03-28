@extends('Backend.account.layout.app')
@section('content')
    <section id="dashboard-section" class="p-6">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-slate-800 mb-4">Welcome Back, {{ Auth::user()->name }}!</h2>
            <p class="text-slate-600">This is your dashboard. From here, you can manage your blogs, users, and
                account settings.</p>
        </div>
    </section>

    <!-- Blog Management Section -->
    <section id="blogs-section" class="p-6">
        <h2 class="text-2xl font-bold text-slate-800 mb-4">Manage Blogs</h2>
        <div class="mb-6 mt-6">
            <a href="{{ route('blog.create') }}"
                class="px-6 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-500 transition ">Create
                New Blog</a>
        </div>
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-4">
            <table class="w-full border-collapse border border-slate-300">
                {{-- <thead class="bg-slate-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4">Total user</th>
                        <th class="text-left py-3 px-4">Total Blog</th>
                        <th class="text-left py-3 px-4">Total Categories</th>
                        <th class="text-left py-3 px-4">Total Comment</th>
                    </tr>
                </thead> --}}
                <tbody class="">
                    <tr class="hover:bg-slate-50">
                        <td class="py-3 px-4">

                            <div class="bg-orange-500 text-white p-8  w-32 h-32  justify-center   rounded-b-lg">
                                <span class="">User-</span><br />
                                <h2 class="text-4xl font-bold">{{ $users < 10 ? '0' . $users : $users }}</h2>
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="bg-amber-500 text-white p-8  w-32 h-32  justify-center  rounded-b-lg">
                                <span>Blog-</span>
                                <h2 class="text-4xl font-bold">{{ $blogs < 10 ? '0' . $blogs : $blogs }}</h2>
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="bg-lime-500 text-white p-8  w-32 h-32  justify-center rounded-b-lg">
                                <span>Category-</span>
                                <h2 class="text-4xl font-bold">{{ $categorie < 10 ? '0' . $categorie : $categorie }}
                                </h2>
                            </div>
                        </td>
                        <td class="py-3 px-4 flex space-x-4">
                            <div class="bg-sky-500 text-white p-8  w-32 h-32  justify-center rounded-b-lg">
                                <span>Comment-</span>
                                <h2 class="text-4xl font-bold">{{ $comments < 10 ? '0' . $comments : $comments }}</h2>
                            </div>
                        </td>
                    </tr>
                    <!-- Repeat similar rows -->
                </tbody>
            </table>
        </div>
    </section>

    <!-- Users Management Section -->
    {{-- <section id="users-section" class="p-6">
        <h2 class="text-2xl font-bold text-slate-800 mb-4">Manage Users</h2>
        <p class="text-slate-600">User management functionality will go here.</p>
    </section> --}}

    <!-- Settings Section -->
    <section id="settings-section" class="p-6">
        <h2 class="text-2xl font-bold text-slate-800 mb-4">Settings</h2>
        <p class="text-slate-600">Settings functionality will go here.</p>
    </section>
@endsection
