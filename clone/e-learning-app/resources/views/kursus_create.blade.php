@include('components.header_dashboard')

<!-- component -->
{{-- kirim file harus pakai enctype --}}
<form method="POST" action="/kursus/create" enctype="multipart/form-data" class="flex items-center h-screen">
    @csrf
    {{-- token, gunanya untuk agar laravel mengenali kita kirim form --}}

    <div class="bg-white  shadow-xl rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-10/12 mx-auto">
        <div class="text-3xl font-bold text-blue-400">
            Form Create Kursus.
        </div>
        <div class="text-sm mb-5 text-gray-400">
            Mulai isi form dengan baik dan benar.
        </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                    fore="grid-first-name">
                    Nama Kursus
                </label>
                <input name="nama_kursus"
                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                    id="grid-first-name" type="text" placeholder="Masukkan Nama Pelajaran . . .">
                <p class="text-red text-xs italic">Please fill out this field.</p>
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                    fore="grid-last-name">
                    Foto
                </label>
                <input name="file_foto"
                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                    id="grid-last-name" type="file" placeholder="">
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                    fore="grid-first-name">
                    Harga Kursus
                </label>
                <input name="harga"
                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                    id="grid-first-name" type="text" placeholder="Masukkan Harga Kursus . . .">
                <p class="text-red text-xs italic">Tambahkan harga / 0 untuk gratis.</p>
            </div>
            <div class="md:w-1/3 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                    fore="grid-last-name">
                    Pengajar
                </label>
                {{-- <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label> --}}
                <select id="countries" name="pengajar_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Pilih Pengajar . . .</option>

                    @foreach ($pengajar as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach

                </select>

            </div>
            <div class="md:w-1/3 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                    Category Kursus
                </label>
                <select id="countries" name="category_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Pilih Kategori Kursus . . .</option>
                    @foreach ($category as $data)
                        <option value="{{$data->id}}">{{$data->nama_pelajaran}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                    fore="grid-first-name">
                    Deskripsi Kursus
                </label>
                <textarea name="deskripsi"
                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                    id="grid-first-name" type="text" placeholder="Masukkan Deskripsi . . ."></textarea>
                <p class="text-red text-xs italic">Please fill out this field.</p>
            </div>

            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                    fore="grid-last-name">
                    Tanggal
                </label>
                <input name="tanggal"
                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                    id="grid-last-name" type="date" placeholder="">
            </div>
        </div>

        <div class="flex">
            <button type="submit"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit
                form</button>
            <a href="/kursus" type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Kembali
                ke Dashboard -></a>
        </div>

    </div>
</form>
{{-- @include('components.footer') --}}
