<aside class="w-64 bg-slate-800 text-white flex flex-col">
    <div class="p-6 text-center font-bold text-2xl tracking-wide border-b border-slate-700">Admin Panel</div>
    <nav class="flex-grow">
        <ul class="space-y-2 p-4">
            <li class="p-2">
                <a href="{{ route('profile.index') }}"
                    class="{{ Request::path() == 'account/profile' ? 'hover:underline px-4 py-2 rounded-md bg-slate-700 font-bold text-white' : 'block px-4 py-2 rounded-md hover:bg-slate-700' }}"><i
                        class="fas fa-home pr-2 text-slate-300"></i>
                    Dashboard</a>
            </li>
            @can('superAdmin')
                <li class="p-2"><a href="{{ route('category.index') }}"
                        class="{{ Request::segment(2) == 'category' ? 'hover:underline px-4 py-2 rounded-md bg-slate-700 font-bold text-white' : 'block px-4 py-2 rounded-md hover:bg-slate-700' }}"><i
                            class="fas fa-tags pr-2 text-slate-300"></i>Categories</a>
                </li>
            @endcan
            <li class="p-2"><a href="{{ route('blog.index') }}"
                    class="block px-4 py-2 rounded-md hover:bg-slate-700"> <i
                        class="fas fa-newspaper pr-2 text-slate-300"></i>Manage
                    Blogs</a>
            </li>
            @can('superAdmin-admin')
                <li class="p-2"><a href="{{ route('comment.index') }}"
                        class="{{ Request::segment(2) == 'comment' ? 'hover:underline px-4 py-2 rounded-md bg-slate-700 font-bold text-white' : 'block px-4 py-2 rounded-md hover:bg-slate-700' }}"><i
                            class="fas fa-comments pr-2 text-slate-300"></i>Comment</a>
                </li>
            @endcan
            @can('superAdmin')
                <li class="p-2"><a href="{{ route('user.index') }}"
                        class="block px-4 py-2 rounded-md hover:bg-slate-700"><i
                            class="fas fa-user pr-2 text-slate-300"></i>Manage Users</a>
                </li>
            @endcan
            <li class="p-2"><a href="{{ route('profile.edit') }}"
                    class="{{ Request::segment(3) == 'edit' ? 'hover:underline px-4 py-2 rounded-md bg-slate-700 font-bold text-white' : 'block px-4 py-2 rounded-md hover:bg-slate-700' }}"><i
                        class="fas fa-user-alt pr-2 text-slate-300"></i>Update
                    Profile</a>
            </li>
            {{-- <li class="p-2"><a href="#settings-section" class="block px-4 py-2 rounded-md hover:bg-slate-700"> <i
                        class="fas fa-sliders-h pr-2 text-slate-300"></i>Settings</a>
            </li> --}}
            <li class="p-2"><a href="{{ route('home.index') }}"
                    class="block px-4 py-2 rounded-md hover:bg-slate-700"><i
                        class="fas fa-eye pr-2 text-slate-300"></i>View Site</a>
            </li>
        </ul>
    </nav>
    <div class="p-4">
        <a href="{{ route('profile.logout') }}"
            class="block px-4 py-2 text-center rounded-md bg-red-600 hover:bg-red-500">Logout</a>
    </div>
</aside>
