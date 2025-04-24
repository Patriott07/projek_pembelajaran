<!--sidenav -->
<div class="fixed left-0 top-0 w-64 h-full bg-[#f8f4f3] p-4 z-50 sidebar-menu transition-transform">
    <a href="/" class="flex items-center pb-4 border-b border-b-gray-800">

        <h2 class="font-bold text-3xl flex gap-1 items-center">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 64 64">
                <path fill="#34484c" d="M10.198 37.782s1.189 4.578 8.635 3.407l1.265-3.064l-2.143-2.328l-5.925-1.955z" />
                <path fill="#ad7029"
                    d="M33.92 29.197c0 1.621-.834 2.05-2.938 2.938l-17.974 7.59a2.936 2.936 0 0 1-2.938-2.94V11.528c0-1.622.954-2.16 2.938-2.935L30.983 1a2.94 2.94 0 0 1 2.939 2.938v25.26" />
                <path fill="#34484c"
                    d="M11.701 39.419s6.74 1.93 7.134 1.768c.392-.17-.254-2.924-.254-2.924l-2.435-2.623l-2.27-.106l-.399.566z" />
                <path fill="#f4f5f5"
                    d="m30.558 2.756l-19.942 8.375l.935 5.369l2.967.297l9.909-1.595l6.159-3.227l4.532-6.21c-.988-1.775-2.445-2.874-4.56-3.009" />
                <path fill="#34484c"
                    d="M15.897 12.99c0-.472.088-.849.248-1.167c-2.042-.192-3.97-.781-5.374-2.047c-.468.429-.698.96-.698 1.756V36.79a2.94 2.94 0 0 0 2.938 2.938l2.9-1.224c-.006-.088-.015-.168-.015-.256z" />
                <path fill="#f79420"
                    d="M40.266 31.69c0 1.625-.835 2.05-2.94 2.94l-18.493 6.557a2.94 2.94 0 0 1-2.94-2.939V12.99c0-1.62.955-2.16 2.94-2.94l18.493-6.554a2.94 2.94 0 0 1 2.94 2.935v25.26" />
                <path fill="#905a24"
                    d="M32.607 11.203a.393.393 0 0 1-.227.513l-9.836 3.794a.4.4 0 0 1-.516-.226a.4.4 0 0 1 .226-.515l9.84-3.794a.4.4 0 0 1 .513.228m0 1.81a.395.395 0 0 1-.227.513l-9.836 3.792a.396.396 0 1 1-.29-.738l9.84-3.796a.4.4 0 0 1 .513.23m-3.344 3.156c.08.204.031.417-.109.47l-6.718 2.59c-.14.054-.316-.07-.398-.274c-.077-.204-.025-.417.113-.47l6.718-2.588c.136-.052.317.067.394.273" />
                <path fill="#34484c" d="M4.142 52.185s1.282 4.941 9.314 3.679l1.367-3.308l-2.31-2.511l-6.399-2.11z" />
                <path fill="#1ea0cd"
                    d="M29.738 42.938c0 1.749-.9 2.209-3.172 3.17L7.17 54.296a3.17 3.17 0 0 1-3.172-3.172V23.875c0-1.757 1.028-2.338 3.172-3.173l19.396-8.189a3.17 3.17 0 0 1 3.172 3.169z" />
                <path fill="#34484c"
                    d="M5.763 53.958s7.272 2.087 7.691 1.909c.426-.182-.27-3.154-.27-3.154l-2.63-2.834l-2.446-.11l-.43.609l-1.918 3.58" />
                <path fill="#f4f5f5"
                    d="M26.114 14.396L4.6 23.44l1.007 5.79l3.2.32l10.692-1.723l6.646-3.481l4.891-6.701c-1.068-1.916-2.64-3.104-4.92-3.249" />
                <path fill="#34484c"
                    d="M10.295 25.443c0-.505.086-.914.261-1.258c-2.2-.204-4.278-.84-5.8-2.209c-.5.464-.75 1.04-.75 1.9v27.248a3.17 3.17 0 0 0 3.17 3.172l3.13-1.32a3 3 0 0 1-.013-.277V25.443z" />
                <path fill="#57c6e9"
                    d="M36.585 45.617c0 1.751-.898 2.21-3.172 3.17l-19.956 7.078a3.174 3.174 0 0 1-3.171-3.172V25.438c0-1.75 1.032-2.332 3.171-3.17l19.956-7.074a3.17 3.17 0 0 1 3.172 3.172z" />
                <path fill="#198ba9"
                    d="M28.322 23.513a.43.43 0 0 1-.246.555l-10.61 4.092a.433.433 0 0 1-.558-.242a.434.434 0 0 1 .248-.559l10.61-4.09a.43.43 0 0 1 .556.244m0 1.958a.43.43 0 0 1-.246.553l-10.61 4.091a.43.43 0 0 1-.558-.243a.43.43 0 0 1 .248-.555l10.61-4.092a.43.43 0 0 1 .556.246m-3.608 3.403c.084.222.032.448-.119.504l-7.25 2.795c-.15.06-.339-.072-.426-.292c-.085-.224-.034-.45.117-.507l7.249-2.795c.153-.055.345.076.43.295" />
                <path fill="#34484c"
                    d="M21.864 58.807s1.39 5.335 10.067 3.97l1.478-3.572l-2.497-2.711L24 54.213l-2.135 4.594" />
                <path fill="#78111f"
                    d="M49.515 48.805c0 1.89-.97 2.389-3.426 3.423l-20.95 8.847a3.425 3.425 0 0 1-3.425-3.424V28.21c0-1.892 1.111-2.522 3.425-3.425l20.95-8.847a3.427 3.427 0 0 1 3.426 3.425z" />
                <path fill="#34484c"
                    d="M23.617 60.719s7.857 2.251 8.314 2.057s-.293-3.403-.293-3.403l-2.84-3.062l-2.645-.123l-.465.662l-2.07 3.87" />
                <path fill="#f4f5f5"
                    d="M45.597 17.98L22.35 27.745l1.092 6.26l3.46.342l11.542-1.858l7.18-3.764l5.285-7.235c-1.158-2.07-2.853-3.354-5.318-3.51" />
                <path fill="#34484c"
                    d="M28.514 29.909c0-.545.097-.985.283-1.36c-2.38-.22-4.624-.908-6.264-2.386c-.542.501-.812 1.123-.812 2.05v29.44a3.426 3.426 0 0 0 3.427 3.425l3.38-1.428a4 4 0 0 1-.014-.296V29.91" />
                <path fill="#be202e"
                    d="M56.909 51.714c0 1.89-.97 2.386-3.423 3.424L31.927 62.78a3.423 3.423 0 0 1-3.425-3.42V29.912c0-1.89 1.111-2.517 3.425-3.42l21.56-7.644a3.423 3.423 0 0 1 3.422 3.422z" />
                <path fill="#78111f"
                    d="M47.988 27.827a.464.464 0 0 1-.265.602l-11.466 4.418a.46.46 0 0 1-.598-.261a.46.46 0 0 1 .264-.598l11.467-4.423a.46.46 0 0 1 .598.262m0 2.113a.46.46 0 0 1-.265.597l-11.467 4.421a.463.463 0 0 1-.598-.265a.466.466 0 0 1 .264-.602l11.467-4.416a.46.46 0 0 1 .6.265m-3.896 3.68c.092.238.036.484-.131.545l-7.829 3.021c-.165.062-.371-.08-.462-.319c-.093-.237-.036-.485.13-.548l7.829-3.017c.161-.063.367.079.463.319" />
            </svg> --}}
            <img src="{{ asset('icon.png') }}" class="w-5 h-5 me-2" alt="">
            RUANG<span class="bg-blue-900 text-white px-2 rounded-md">ILMU.</span>
        </h2>
    </a>
    <ul class="mt-4">
        {{-- <span class="text-gray-400 font-bold">ADMIN</span> --}}

        @if (Auth::user() && Auth::user()->role == 'pengajar')
            <li class="mb-1 group">
                <a href="/profile"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class=' mr-1.5 text-lg ms-1'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1m0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1m0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1m-8-5a3 3 0 1 1 6 0a3 3 0 0 1-6 0m1.942 4a3 3 0 0 0-2.847 2.051l-.044.133l-.004.012c-.042.126-.055.167-.042.195c.006.013.02.023.038.039c.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415a.7.7 0 0 1 .146-.155c.019-.016.031-.026.038-.04c.014-.027 0-.068-.042-.194l-.004-.012l-.044-.133A3 3 0 0 0 10.059 14z"
                                clip-rule="evenodd" />
                        </svg>
                    </i>
                    <span class="text-sm">My Profile</span>
                    {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
                </a>
            </li>
        @endif

        @if (Auth::user() && Auth::user()->role == 'admin')
            <li class="mb-1 group">
                <a href="/user"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class=' mr-1.5 text-lg ms-1'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M256 256a112 112 0 1 0-112-112a112 112 0 0 0 112 112m0 32c-69.42 0-208 42.88-208 128v64h416v-64c0-85.12-138.58-128-208-128" />
                        </svg>
                    </i>
                    <span class="text-sm">Users</span>
                    {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
                </a>
            </li>

            <li class="mb-1 group">
                <a href="/pengajar"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class='mr-1.5 text-lg hover:text-white'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                            <path fill="currentColor"
                                d="M216 40H40a16 16 0 0 0-16 16v144a16 16 0 0 0 16 16h13.39a8 8 0 0 0 7.23-4.57a48 48 0 0 1 86.76 0a8 8 0 0 0 7.23 4.57H216a16 16 0 0 0 16-16V56a16 16 0 0 0-16-16M104 168a32 32 0 1 1 32-32a32 32 0 0 1-32 32m112 32h-56.57a64 64 0 0 0-13.16-16H192a8 8 0 0 0 8-8V80a8 8 0 0 0-8-8H64a8 8 0 0 0-8 8v96a8 8 0 0 0 6 7.75A63.7 63.7 0 0 0 48.57 200H40V56h176Z" />
                        </svg>
                    </i>
                    <span class="text-sm">
                        Pengajar
                    </span>
                    {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
                </a>

            </li>
        @endif

        @if (Auth::user() && Auth::user()->role == 'pengajar')
            <li class="mb-1 group">
                <a href="/kursus"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class=' mr-1.5 text-lg'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                d="M26.581 32.259c2.907-1.324 8.181-9.236 9.635-16.772c-6.04-1.776-5.264-10.258.753-9.742c5.393.355 7.73 7.514 2.917 19.71c-7.352 15.082-24.263 26.084-20.916 5.587c3.854-17.33-.7-16.696-4.65-15.77c-3.617.883-2.885 6.308-1.27 6.965c5.716 3.53.775 10.98-5.878 2.82c-4.92-8.902 1.669-17.805 11.25-16.405c8.902 2.874 9.515 11.12 7.244 20.464q-1.077 4.036.915 3.143"
                                stroke-width="1" />
                        </svg>
                    </i>
                    <span class="text-sm">Kursus</span>
                    {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
                </a>

            </li>
        @endif

        @if (Auth::user() && Auth::user()->role == 'admin')
            <li class="mb-1 group">
                <a href="/category"
                    class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class='mr-1.5 text-lg'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M2 5a3 3 0 0 1 3-3h6.172a3 3 0 0 1 2.12.879l8 8a3 3 0 0 1 0 4.242l-6.17 6.172a3 3 0 0 1-4.243 0l-8-8A3 3 0 0 1 2 11.172zm5 1a1 1 0 0 0 0 2h.001a1 1 0 0 0 0-2z"
                                clip-rule="evenodd" />
                        </svg>
                    </i>
                    <span class="text-sm">Category</span>
                    {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
                </a>
            </li>
        @endif

        <li class="mb-1 group">
            <a href="/pembayaran"
                class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <i class=' mr-1.5 text-lg'>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14 14">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M1.5 0A1.5 1.5 0 0 0 0 1.5v6A1.5 1.5 0 0 0 1.5 9h11A1.5 1.5 0 0 0 14 7.5v-6A1.5 1.5 0 0 0 12.5 0zm6.125 1.454a.625.625 0 1 0-1.25 0v.4a1.532 1.532 0 0 0-.15 3.018l1.197.261a.39.39 0 0 1-.084.773h-.676a.39.39 0 0 1-.369-.26a.625.625 0 0 0-1.178.416c.194.55.673.965 1.26 1.069v.415a.625.625 0 1 0 1.25 0V7.13a1.641 1.641 0 0 0 .064-3.219L6.492 3.65a.281.281 0 0 1 .06-.556h.786a.39.39 0 0 1 .369.26a.625.625 0 1 0 1.178-.416a1.64 1.64 0 0 0-1.26-1.069zM2.75 3.75a.75.75 0 1 1 0 1.5a.75.75 0 0 1 0-1.5m8.5 0a.75.75 0 1 1 0 1.5a.75.75 0 0 1 0-1.5M4.5 9.875c.345 0 .625.28.625.625v2a.625.625 0 1 1-1.25 0v-2c0-.345.28-.625.625-.625m5.625.625a.625.625 0 1 0-1.25 0v2a.625.625 0 1 0 1.25 0zm-2.5.75a.625.625 0 1 0-1.25 0v2a.625.625 0 1 0 1.25 0z"
                            clip-rule="evenodd" />
                    </svg>
                </i>
                <span class="text-sm">Pembayaran</span>
                {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
            </a>
        </li>

        <li class="mb-1 group">
            <form action="/logout" method="post">
                @csrf

                <button type="submit"
                    class="flex w-full font-semibold items-center py-2 px-4 text-gray-900 hover:bg-red-500 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='mr-1.5 text-lg'>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M18 2H6a1 1 0 0 0-1 1v9l5-4v3h6v2h-6v3l-5-4v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1" />
                        </svg>
                    </i>
                    <span class="text-sm">Logout</span>
                </button>
            </form>
        </li>

    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end sidenav -->
