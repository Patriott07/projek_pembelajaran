@include('components.header_dashboard')
@include('components.navbar_home')

@if ($s == '' && $filter == '' && $categ == '')
    <div class="my-5 py-5 bg-[url('{{ asset('header_home.png') }}')] bg-center bg-cover" style="height: 75vh">

    </div>

    <div class="my-32 py-5 bg-[url('{{ asset('section_1.png') }}')] bg-center bg-cover" style="height: 50vh">

    </div>
@endif

<section class="mx-48 py-8 border-b">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Topic Kursus</h2>
       
    </div>

    <!-- Grid Topics -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 mb-5 gap-4" id="categ-container">
        <!-- Card -->
        @foreach ($data_category as $data)
            <a href="/kursus/category/{{Str::slug($data->nama_pelajaran)}}/{{$data->id}}" action="" method="get" class="h-64 w-64 relative">
                <button type="submit">
                    <div
                        class="absolute top-0 left-0 w-[230px] h-full bg-gray-900/80 hover:bg-gray-900/30 duration-300 z-[1]">
                    </div>
                    <input name="categ" value="{{ $data->id }}" hidden>
                    <input name="name" value="{{ $data->nama_pelajaran }}" hidden>
                    <div
                        class="bg-[url('{{ $data->foto }}')] bg-center bg-cover mx-auto h-64 w-[230px] flex items-end justify-center p-4 text-white font-semibold">
                        <span class="z-[3]">
                            {{ $data->nama_pelajaran }}

                        </span>
                    </div>
                </button>

            </a>
        @endforeach

    </div>
</section>

<section class="mx-48 bg-white py-10 grid grid-cols-1  gap-6">
    <!-- Video Online Section -->
    <div class="md:col-span-3 bg-white">
        <div class="flex justify-between items-center mb-4">
            @if ($categ != '')
                <h2 class="text-xl font-bold text-gray-800">SEMUA KURSUS CATEGORY {{ $name }}</h2>
            @else
                <h2 class="text-xl font-bold text-gray-800">SEMUA KURSUS</h2>
            @endif

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
                <a href="/kursus/{{Str::slug($data->nama_kursus)}}/{{$data->id}}" class="shadow-md p-3">
                    <div class="bg-[url('{{ $data->foto }}')] bg-center bg-cover h-40 w-full"></div>
                    <span
                        class="inline-block bg-yellow-400 text-white text-xs px-3 py-1 rounded-full mt-2">{{ $data->category->nama_pelajaran }}</span>
                    <h3 class="font-semibold mt-1 text-sm">{{ $data->nama_kursus }}</h3>
                    <p class="text-xs text-orange-600">{{ $data->pengajar->name }}</p>
                    {{-- <p class="text-xs text-gray-500">(2078 siswa sudah coba)</p> --}}
                    @if ($data->harga > 0)
                        <p class="font-bold mt-1">RP.{{$data->harga}}</p>
                    @else
                        <p class="font-bold mt-1">Free</p>
                    @endif

                    <p class="h-[80px] overflow-hidden text-sm text-gray-400">
                        {{$data->deskripsi}}
                    </p>
                </a>
            @endforeach

        </div>
    </div>

    {{ $data_kursus->links() }}


</section>

@include('components.footer')



{{-- @include('components.footer') --}}
