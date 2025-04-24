@include('components.header_dashboard')
@include('components.navbar_home')
{{-- 
<div class="my-5 py-5 bg-[url('{{ asset('header_home.png') }}')] bg-center bg-cover" style="height: 75vh">

</div>

<div class="my-32 py-5 bg-[url('{{ asset('section_1.png') }}')] bg-center bg-cover" style="height: 50vh">

</div> --}}

{{-- <section class="mx-48 py-8 border-b">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Topic Kursus</h2>
        <button class="bg-yellow-400 text-white font-semibold px-4 py-2 rounded hover:bg-yellow-500">
            See All
        </button>
    </div>

    <!-- Grid Topics -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        <!-- Card -->
        <div class="bg-gray-400 h-64 flex items-end justify-center p-4 text-white font-semibold">
            INFORMATIKA
        </div>
        <div class="bg-gray-400 h-64 flex items-end justify-center p-4 text-white font-semibold">
            MATEMATIKA
        </div>
        <div class="bg-gray-400 h-64 flex items-end justify-center p-4 text-white font-semibold">
            FISIKA
        </div>
        <div class="bg-gray-400 h-64 flex items-end justify-center p-4 text-white font-semibold">
            KIMIA
        </div>
        <div class="bg-gray-400 h-64 flex items-end justify-center p-4 text-white font-semibold">
            BAHASA INDONESIA
        </div>
        <div class="bg-gray-400 h-64 flex items-end justify-center p-4 text-white font-semibold">
            IPS
        </div>
        <div class="bg-gray-400 h-64 flex items-end justify-center p-4 text-white font-semibold">
            BAHASA INGGRIS
        </div>
        <div class="bg-gray-400 h-64 flex items-end justify-center p-4 text-white font-semibold">
            PPKN
        </div>
    </div>
</section> --}}

<!--sidenav -->
<div class="absolute left-0 top-0 w-5/12 p min-h-[200vh] bg-[#f8f4f3] p-4 z-50 sidebar-menu transition-transform">
    <a href="/" class="flex items-center pb-4 border-b p-5 border-b-gray-800">

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
        <li class="mb-4 group">
            <p
                class="flex font-semibold items-center py-2 px-4 bg-blue-900 text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                <i class=' mr-1.5 text-lg'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            d="M26.581 32.259c2.907-1.324 8.181-9.236 9.635-16.772c-6.04-1.776-5.264-10.258.753-9.742c5.393.355 7.73 7.514 2.917 19.71c-7.352 15.082-24.263 26.084-20.916 5.587c3.854-17.33-.7-16.696-4.65-15.77c-3.617.883-2.885 6.308-1.27 6.965c5.716 3.53.775 10.98-5.878 2.82c-4.92-8.902 1.669-17.805 11.25-16.405c8.902 2.874 9.515 11.12 7.244 20.464q-1.077 4.036.915 3.143"
                            stroke-width="1" />
                    </svg>
                </i>
                <span class="text-sm">Kumpulan Kursusku</span>
                {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
            </p>
        </li>

        @foreach ($data_kursus as $data)
            @if ($kursus->id == $data->id)
                <li class="mb-2 group">
                    <p
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 bg-gray-300 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class='mr-1.5 text-lg'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M21.409 9.353a2.998 2.998 0 0 1 0 5.294L8.597 21.614C6.534 22.737 4 21.277 4 18.968V5.033c0-2.31 2.534-3.769 4.597-2.648z" />
                            </svg>
                            </svg>
                        </i>
                        <span class="text-sm">{{ $data->nama_kursus }}</span>
                        {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
                        </a>
                </li>
            @else
                <li class="mb-2 group">
                    <a href="/member-area?name={{ Str::slug($data->nama_kursus) }}&id={{ $data->id }}"
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class='mr-1.5 text-lg'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M21.409 9.353a2.998 2.998 0 0 1 0 5.294L8.597 21.614C6.534 22.737 4 21.277 4 18.968V5.033c0-2.31 2.534-3.769 4.597-2.648z" />
                            </svg>
                            </svg>
                        </i>
                        <span class="text-sm">{{ $data->nama_kursus }}</span>
                        {{-- <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i> --}}
                    </a>
                </li>
            @endif
        @endforeach


        <li class="mt-3 group">
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

<div class="absolute top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
<!-- end sidenav -->

<div class="bg-white h-min-screen ms-[44vw] me-[3vw] my-5">
    {{-- <h1>hei</h1> --}}
    <div class="max-w-4xl">
        <!-- Video Player -->
        @if ($video)
            <video class="w-full rounded-md shadow-md" controls>
                <source src="{{ $video->url }}" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
        @endif


        <div id="accordion-open" class="mt-4" data-accordion="open"
            onclick="document.getElementById('deskripsi').classList.toggle('hidden')">
            <h2 id="accordion-open-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-open-body-1" aria-expanded="true"
                    aria-controls="accordion-open-body-1">
                    <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                clip-rule="evenodd"></path>
                        </svg> PLAYLIST TRACKING KURSUS</span>
                </button>
            </h2>
            <div id="accordion-open-body-1" class="" aria-labelledby="accordion-open-heading-1" class="">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 "
                    id="deskripsi">
                    <p class="mb-2 text-gray-500 text-sm dark:text-gray-400">
                        {{ $kursus->deskripsi }}
                    </p>

                </div>
            </div>
            @foreach ($data_videos as $data)
                @if ($video && $video->id == $data->id)
                    <div
                        id="accordion-open-heading-2 border-b">
                        <button type="button"
                            class="flex items-center bg-blue-500/20 hover:bg-blue-400 justify-between w-full p-5 font-medium rtl:text-right text-gray-900 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 gap-3"
                            data-accordion-target="#accordion-open-body-2" aria-expanded="false"
                            aria-controls="accordion-open-body-2">
                            <span class="flex items-center">#{{ $data->urutan_dalam_playlist }} -
                                {{ $data->nama_vidio }}</span>
                            <span>{{ $data->durasi }}:00 Menit</span>
                        </button>
                    </div>
                @else
                    <a href="/member-area?name={{ $kursus->nama_kursus }}&id={{ $kursus->id }}&video={{ $data->urutan_dalam_playlist }}"
                        id="accordion-open-heading-2 border-b">
                        <button type="button"
                            class="flex items-center bg-gray-200/20 hover:bg-blue-400 justify-between w-full p-5 font-medium rtl:text-right text-gray-900 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 gap-3"
                            data-accordion-target="#accordion-open-body-2" aria-expanded="false"
                            aria-controls="accordion-open-body-2">
                            <span class="flex items-center">#{{ $data->urutan_dalam_playlist }} -
                                {{ $data->nama_vidio }}</span>
                            <span>{{ $data->durasi }}:00 Menit</span>
                        </button>
                    </a>
                @endif
            @endforeach


        </div>

    </div>
</div>


@include('components.footer')



{{-- @include('components.footer') --}}
