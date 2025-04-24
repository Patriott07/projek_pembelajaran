@include('components.header_dashboard')
<!-- component -->
@include('components.sidebar')

<main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
    @include('components.navbar')

    <!-- Content -->
    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 mb-6">
            <div
                class="p-6 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                @if (Session::has('ok'))
                    <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
                        <p class="font-bold">Berhasil!!</p>
                        <p class="text-sm">{{ Session::get('ok') }}</p>
                    </div>
                @endif

                @if (Session::has('err'))
                    <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
                        <p class="font-bold">Something Error!!</p>
                        <p class="text-sm">{{ Session::get('err') }}</p>
                    </div>
                @endif

                <div class="rounded-t mb-0 px-0 border-0">
                    <div class="flex flex-wrap items-center px-4 py-2">
                        <div class="relative w-full max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Data Kursus</h3>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        #</th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Nama Kursus</th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Deskripsi</th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Tanggal</th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Foto</th>

                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Harga/Category</th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Like</th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        action</th>
                                    <th
                                        class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_kursus as $data)
                                    <tr class="text-gray-700 dark:text-gray-100 ">
                                        <th
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs p-4">
                                            {{ $data->nama_kursus }}
                                        </td>
                                        <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs  p-4">
                                            <div
                                                style="
                                                    display: -webkit-box;
                                                    -webkit-line-clamp: 2;
                                                    -webkit-box-orient: vertical;
                                                    overflow: hidden;
                                                    text-overflow: ellipsis;
                                                ">
                                                {{ $data->deskripsi }}
                                            </div>
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $data->tanggal }}
                                        </td>
                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <a href="{{ $data->foto }}" target="_blank">
                                                <div src=" {{ $data->foto }}" alt=""
                                                    class="bg-[url('{{$data->foto}}')] bg-cover bg-center"
                                                    style="width: 100px; height:100px"></div>
                                            </a>
                                        </td>

                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            Rp.{{ $data->harga }} / 
                                            <span
                                                class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-purple-900 dark:text-purple-300">{{ $data->category->nama_pelajaran }}</span>
                                        </td>

                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            {{ $data->like }}
                                        </td>

                                        <td
                                            class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 flex flex-col ">
                                            <a href="/kursus/{{$data->id}}/video" type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center me-2 mb-2">Lihat Detail Vidio -></a>


                                            <a href="/kursus/update/{{ $data->id }}" type="submit"
                                                class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center me-2 mb-2">Update
                                                Data</a>



                                            <form action="/kursus/delete/{{ $data->id }}" method="POST">
                                                @csrf

                                                <button type="submit"
                                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center me-2 mb-2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{ $data_kursus->links() }}

            <div class="flex-col flex gap-2">

                <a href="/kursus/create"
                    class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 ">Tambah
                    Data Kursus Baru!</a>

                <button onclick="handleToggleDeleteTable()" type="button"
                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 ">Tampilkan
                    Data Yang Dihapus</button>
            </div>

            <script>
                function handleToggleDeleteTable() {
                    const tab = document.getElementById('table_delete');
                    tab.classList.toggle('hidden');
                }
            </script>

            <div id="table_delete"
                class="bg-white hidden border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Data Yang Terhapus</div>
                </div>

                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    #</th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Nama Kursus</th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Deskripsi</th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Tanggal</th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Foto</th>

                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Harga/Category</th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Like</th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    action</th>
                                <th
                                    class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_delete as $data)
                                <tr class="text-gray-700 dark:text-gray-100">
                                    <th
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                    {{ $loop->iteration }}
                                </th>
                                <td
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs p-4">
                                    {{ $data->nama_kursus }}
                                </td>
                                <td class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs  p-4">
                                    <div
                                        style="
                                            display: -webkit-box;
                                            -webkit-line-clamp: 2;
                                            -webkit-box-orient: vertical;
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                        ">
                                        {{ $data->deskripsi }}
                                    </div>
                                </td>
                                <td
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $data->tanggal }}
                                </td>
                                <td
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    <a href="{{ $data->foto }}" target="_blank">
                                        <div src=" {{ $data->foto }}" alt=""
                                            class="bg-[url('{{$data->foto}}')] bg-cover bg-center"
                                            style="width: 100px; height:100px"></div>
                                    </a>
                                </td>

                                <td
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    Rp.{{ $data->harga }} / 
                                    <span
                                        class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-purple-900 dark:text-purple-300">{{ $data->category->nama_pelajaran }}</span>
                                </td>

                                <td
                                    class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $data->like }}
                                </td>
                                    <td
                                        class="border-t-0 px-4 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <form action="/kursus/restore/{{ $data->id }}" method="post">
                                            @csrf

                                            <button type="submit"
                                                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-xs px-3 py-1.5 text-center me-2 mb-2">Restore
                                                Data</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <!-- End Content -->
</main>
