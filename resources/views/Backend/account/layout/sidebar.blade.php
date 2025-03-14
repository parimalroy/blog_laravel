<aside class="w-64 bg-slate-800 text-white flex flex-col">
    <div class="p-6 text-center font-bold text-2xl tracking-wide border-b border-slate-700">Admin Panel</div>
    <nav class="flex-grow">
        <ul class="space-y-2 p-4">
            <li><a href="#" class="block px-4 py-2 rounded-md hover:bg-slate-700">Dashboard</a></li>
            <li><a href="#blogs-section" class="block px-4 py-2 rounded-md hover:bg-slate-700">Manage Blogs</a>
            </li>
            <li><a href="#users-section" class="block px-4 py-2 rounded-md hover:bg-slate-700">Manage Users</a>
            </li>
            <li><a href="{{ route('profile.edit') }}" class="block px-4 py-2 rounded-md hover:bg-slate-700">Update
                    Profile</a>
            </li>
            <li><a href="#settings-section" class="block px-4 py-2 rounded-md hover:bg-slate-700">Settings</a>
            </li>
        </ul>
    </nav>
    <div class="p-4">
        <a href="{{ route('profile.logout') }}"
            class="block px-4 py-2 text-center rounded-md bg-red-600 hover:bg-red-500">Logout</a>
    </div>
</aside>
