<nav class="flex items-center border-b justify-between px-12 py-4 bg-white shadow">
    <!-- Logo & Search -->
    <div class="flex items-center gap-6">
        <!-- Logo -->
        <div class="flex items-center gap-1 text-xl font-semibold text-gray-800">
            <img src="{{ asset('Logo.png') }}" alt="logo" />
            {{-- <span class="font-bold">Kursor.IO</span> --}}
        </div>

        <!-- Search Box -->
        <form method="get" class="relative w-64">
            <input name="s" type="text" placeholder="Search Courses.."
                class="w-full pl-4 pr-10 py-2 text-sm border rounded-full shadow-sm focus:outline-none focus:ring focus:border-blue-300" />
            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
        </form>
    </div>

    <!-- Navigation Links -->
    <div class="flex items-center gap-2 text-sm font-medium text-gray-800">
        <a href="/" class="hover:text-blue-600 me-4">Home</a>
        @if (Auth::user() && Auth::user()->role == 'member')
            <a href="/member-area" class="hover:text-blue-600 me-4">Member Dashboard</a>
            <p class="hover:text-blue-600 me-4 text-sm text-blue-500">Hello Member, {{ Auth::user()->name }}</p>
        @endif

        @if (Auth::user() && Auth::user()->role == 'pengajar')
            <a href="/profile" class="hover:text-blue-600 me-4">Profile Pengajar</a>
        @endif

        @if (Auth::user() && Auth::user()->role == 'admin')
            <a href="/user" class="hover:text-blue-600 me-4">Dashboard Management</a>
        @endif

        @if (!Auth::user())
            <a href="/login"
                class="px-4 py-2 border border-gray-400 rounded-md text-gray-800 hover:bg-gray-100">Login</a>
            <a href="/register" class="px-4 py-2 rounded-md text-white bg-pink-500 hover:bg-pink-600">Sign Up</a>
        @endif
    </div>
</nav>
