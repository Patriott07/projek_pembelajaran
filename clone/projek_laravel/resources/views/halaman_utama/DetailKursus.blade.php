@include('components.header_dashboard')
{{-- @include('components.navbar_home') --}}

<section class="relative w-full h-[500px]">
    <!-- Background image -->
    <img src="{{$kursus->foto}}"
        alt="Blender Course" class="w-full h-full object-cover" />

    <div class="absolute w-full h-full bg-black/40 top-0 left-0"></div>

    <!-- Overlay untuk gelapin gambar -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Konten di atas gambar -->
    <div class="absolute inset-0 flex flex-col justify-center px-6 md:px-32 text-white">
        <nav class="text-sm mb-2">
            <a href="/" class="text-gray-300 hover:underline">Home</a>
            ›
            <a href="/kursus/category/{{ Str::slug($kursus->category->nama_pelajaran) }}/{{ $kursus->category->id }}"
                class="text-gray-300 hover:underline">{{ $kursus->category->nama_pelajaran }}</a>
            ›
            <span class=" font-medium text-blue-400">{{ $kursus->nama_kursus }}</span>
        </nav>

        <h1 class="text-3xl md:text-4xl font-bold max-w-2xl">
            {{ $kursus->nama_kursus }}
        </h1>

        <div class="mt-2 text-sm text-gray-300">
            <span>({{ $kursus->like > 0 ? $kursus->like : 'Belum ada' }} Member Menyukai Kursus Ini)</span> • <br>
            <span>Total Waktu Untuk Menyelesaikan kursus - {{ $durasi }}</span>
        </div>

        <!-- Profile dan share -->
        <div class="flex items-center gap-2 mt-4">
            <div class="w-10 h-10 bg-[url('{{ $kursus->pengajar->foto }}')] bg-center bg-cover rounded-full"></div>
            <p class="font-semibold">{{ $kursus->pengajar->name }}</p>
        </div>

        <div class="flex gap-2">
            <form action="/like/{{ $kursus->id }}" method="post">
                @csrf
                <button target="_blank"
                    class="mt-4 px-4 py-2 bg-pink-500 text-white text-sm rounded-lg w-max hover:bg-pink-600 font-semibold">
                    Like ❤
                </button>
            </form>

            <a href="/member-area?name={{ Str::slug($kursus->nama_kursus) }}&id={{ $kursus->id }}"
                class="mt-4 px-4 py-2 bg-green-500 text-white text-sm rounded-lg w-max hover:bg-green-600 font-semibold">
                Mulai Pelajari Kursus
            </a>

            <a href="/"
                class="mt-4 px-4 py-2 bg-blue-500 text-white text-sm rounded-lg w-max hover:bg-blue-600 font-semibold">
                Kembali ->
            </a>
        </div>
    </div>
</section>

<section class="px-6 md:px-32 py-12 space-y-12 ">
    <!-- Bagian Apa yang Akan Dipelajari -->
    <div class="max-w-2xl">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
            Apa yang akan anda pelajari dari kursus ini
        </h2>
        <div class="space-y-4 text-gray-600 text-sm leading-relaxed">
            <p>{{ $kursus->deskripsi }}</p>

        </div>
    </div>

    <!-- Bagian Mentor -->
    <div>
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Mentor</h2>
        <div class="bg-gray-100 p-6 rounded-lg flex gap-6 items-center w-full max-w-2xl">
            <!-- Gambar profile placeholder -->
            <div
                class="w-64 h-48 bg-gray-300 rounded-lg bg-center bg-cover
            bg-[url('{{ $kursus->pengajar->foto }}')]
            ">
            </div>

            <!-- Info mentor -->
            <div>
                <h3 class="text-xl font-bold text-gray-800">{{ $kursus->pengajar->name }}</h3>
                <p class="text-sm text-gray-600 mb-2">Keahlian : {{ $kursus->pengajar->keahlian }}</p>
                <p class="text-sm text-gray-600 mb-4">{{ $kursus->pengajar->bio }}</p>

                <div class="flex items-center gap-6 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                        <span>Berpengalaman Membuat {{ $countCourseByPengajar }} Kursus Online</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@if (!$access)
    <div class="bg-gray-100 min-h-screen flex items-center justify-center p-4" id="form">
        <div class="bg-white rounded-lg flex items-center gap-8 shadow-md p-12 w-full max-w-5xl">
            <div class="text-start mb-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Form Pembayaran</h1>

                @if (Session::has('ok'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                        <p class="font-bold">Selamatt!</p>
                        <p>{{ Session::get('ok') }}.</p>
                    </div>
                @elseif ($msg != '')
                    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 mb-4">
                        <p class="font-bold">PLEASE READ!</p>
                        <p>{{ $msg }}.</p>
                    </div>
                @else
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                        <p class="font-bold">WHOOPS!</p>
                        <p>Sepertinya Kursus yang anda akses tidak sepenuhnya gratis.</p>
                    </div>
                @endif

                {{-- <div class="mt-3 text-start">
                <a href="#" class="text-blue-600 hover:underline">Baca Cara Pembayaran</a>
            </div> --}}
            </div>


            <form class="space-y-4 w-8/12" method="POST" action="/pembayaran/create/{{ $kursus->id }}"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="nama">Nama Lengkap</label>
                    <input readonly value="{{ Auth::user() ? Auth::user()->name : 'PLEASE LOGIN FOR PAYMENT' }}"
                        type="text" id="nama"
                        class="w-full px-4 py-2 border bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="email">Metode Bayar</label>
                    <select type="email" id="email" name="metode_bayar"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="BANK BSI">BANK BSI</option>
                        <option value="BANK BCA">BANK BCA</option>
                        <option value="BANK BNI">BANK BNI</option>
                    </select>
                </div>

                {{-- <div>
                <label class="block text-gray-700 font-medium mb-2" for="nominal">Nominal Pembayaran</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2">Rp</span>
                    <input type="number" id="nominal"
                        class="w-full pl-10 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div> --}}

                <div>
                    <label class="block text-gray-700 font-medium mb-2" for="bukti">Upload Bukti Pembayaran</label>
                    <div id="drag-file" class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                        <input type="file" id="bukti" name="bukti_bayar_file" class="hidden"
                            onchange="handleChange()">

                        <script>
                            function handleChange() {
                                document.getElementById('drag-file').classList.add('hidden');
                                document.getElementById('alert_change_file').classList.toggle('hidden')
                            }
                        </script>
                        <label for="bukti" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-gray-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            <p class="text-sm text-gray-500 mt-2">Klik untuk upload bukti pembayaran</p>
                        </label>
                    </div>
                </div>

                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 hidden"
                    id="alert_change_file">
                    <p class="font-bold">Selamatt!</p>
                    <p>File Sudah berhasil tersimpan, lanjutkan dengan submit!</p>
                </div>

                @if ($msg == '')
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Kirim Pembayaran ->
                        </button>
                    </div>
                @endif
            </form>



        </div>
    </div>
@endif

<div class="max-w-5xl px-32 mt-8">
    <!-- Video Player -->
    {{-- <video class="w-full rounded-md shadow-md" controls>
        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4" />
        Your browser does not support the video tag.
    </video> --}}

    @if ($access)
        <div id="accordion-open" class="mt-4" data-accordion="open">
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
            <div id="accordion-open-body-1" class="" aria-labelledby="accordion-open-heading-1">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <p class="mb-2 text-gray-500 dark:text-gray-400 text-sm">{{ $kursus->deskripsi }} <a
                            href="/docs/getting-started/introduction/"
                            class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start
                        developing
                        websites even faster with components on top of Tailwind CSS.</p>
                </div>
            </div>

            @foreach ($data_video as $data)
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
            @endforeach


        </div>
    @endif

</div>


<div class="w-full flex" id="comment">
    <div class="bg-white p-6 rounded-xl space-y-6 mt-8 ms-28 w-7/12">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold text-gray-800">Reviews Comment</h2>

        </div>

        <!-- Review Card -->
        <div class=" pt-6 space-y-6">


            @foreach ($data_comment as $data)
                <!-- Bisa diulang -->
                <div class="h-px bg-gray-200 my-4"></div>

                <!-- Review berikutnya -->
                <div class="flex items-start gap-4">
                    {{-- <img src="/default-avatar.png" alt="avatar"
                    class="w-12 h-12 rounded-full bg-gray-200 object-cover" /> --}}
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <h4 class="font-semibold text-gray-800">{{ $data->user->name }}</h4>
                            <p class="text-sm text-gray-500">On, {{ $data->tanggal }}</p>
                        </div>
                        <div class="flex items-center text-yellow-400 mt-1">
                            @for ($i = 0; $i < $data->star_rating; $i++)
                                ★
                            @endfor
                            {{-- ★★★★ --}}
                        </div>
                        <p class="text-gray-700 mt-2 text-sm">
                            {{ $data->isi_komen }}
                        </p>

                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="w-5/12 p-6">
        <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto mt-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Tulis Komentar</h3>

            <form class="space-y-4" method="post" action="/comment/create/{{ $kursus->id }}">
                @csrf
                <!-- Nama -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" readonly placeholder="Masukkan nama kamu"
                        value="{{ Auth::user() ? Auth::user()->name : 'PLEASE LOGIN FOR PAYMENT' }}"
                        class="mt-1 block w-full border border-gray-300 bg-gray-100 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500" />
                </div>

                <!-- Rating -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Rating</label>
                    <select name="star_rating"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500">
                        <option value="5">★★★★★ (5)</option>
                        <option value="4">★★★★☆ (4)</option>
                        <option value="3">★★★☆☆ (3)</option>
                        <option value="2">★★☆☆☆ (2)</option>
                        <option value="1">★☆☆☆☆ (1)</option>
                    </select>
                </div>

                <!-- Komentar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Komentar</label>
                    <textarea rows="4" name="isi_komen" placeholder="Tulis komentar kamu di sini..."
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500"></textarea>
                </div>

                <!-- Tombol Submit -->
                <div>
                    <button type="submit"
                        class="bg-purple-600 text-white px-6 py-2 rounded-md hover:bg-purple-700 transition">Kirim
                        Komentar</button>
                </div>
            </form>
        </div>

    </div>
</div>




@include('components.footer')
