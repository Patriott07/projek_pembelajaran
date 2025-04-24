@include('components.header_dashboard')
@include('components.navbar_home')


<section class="mx-48 py-12 relative">

    <nav class="text-sm text-gray-500 mb-2">
        <a href="/" class="hover:underline">Home</a>
        <span class="mx-2">›</span>
        <span class="text-blue-600 font-medium">{{ $category->nama_pelajaran }} Kursus</span>
    </nav>

    <h1 class="text-4xl font-bold text-slate-800 mb-4 max-w-xl">{{ $category->nama_pelajaran }} Kursus</h1>
    <p class="text-gray-500 max-w-lg">
        {{ $category->deskripsi }}
    </p>
    <div style="height: 40vh" class="w-4/12 absolute top-0 right-0 bg-center bg-cover bg-[url('{{ $category->foto }}')]">
    </div>
</section>


<section class="mx-48 py-10 grid grid-cols-1 mt-8 gap-6">
    <!-- Video Online Section -->
    <div class="md:col-span-3">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">SEMUA VIDIO ONLINE</h2>
            <form class="max-w-sm ">
                <select id="filter" name="filter" onchange="this.form.submit()"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Select filter data</option>
                    <option value="new" @if ($filter == 'new') selected @endif>KURSUS TERBARU</option>
                    <option value="oldest" @if ($filter == 'oldest') selected @endif>KURSUS TERLAMA</option>
                    <option value="like" @if ($filter == 'like') selected @endif>Urutkan Berdasarkan Jumlah
                        Like</option>
                    <option value="harga_asc" @if ($filter == 'harga_asc') selected @endif>Urutkan Berdasarkan
                        Harga Kursus | low to high</option>
                    <option value="harga_desc" @if ($filter == 'harga_desc') selected @endif>Urutkan Berdasarkan
                        Harga Kursus | high to low</option>
                    {{-- <option value="DE">Germany</option> --}}
                </select>
            </form>
        </div>

        <!-- Video Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">


            <!-- Card 1 -->
            @foreach ($data_kursus as $data)
                <a href="/kursus/{{ Str::slug($data->nama_kursus) }}/{{ $data->id }}" class="shadow-md p-3">
                    <div class="bg-[url('{{ $data->foto }}')] bg-center bg-cover h-40 w-full"></div>
                    <span
                        class="inline-block bg-yellow-400 text-white text-xs px-3 py-1 rounded-full mt-2">{{ $data->category->nama_pelajaran }}</span>
                    <h3 class="font-semibold mt-1 text-sm">{{ $data->nama_kursus }}</h3>
                    <p class="text-xs text-orange-600">{{ $data->pengajar->name }}</p>
                    {{-- <p class="text-xs text-gray-500">(2078 siswa sudah coba)</p> --}}
                    @if ($data->harga > 0)
                        <p class="font-bold mt-1">RP.{{ $data->harga }}</p>
                    @else
                        <p class="font-bold mt-1">Free</p>
                    @endif

                    <p class="h-[80px] overflow-hidden text-sm text-gray-400">
                        {{ $data->deskripsi }}
                    </p>
                </a>
            @endforeach

        </div>
    </div>
</section>

@include('components.footer')
