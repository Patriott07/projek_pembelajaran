@include('components.header_dashboard')

<!-- component -->
{{-- kirim file harus pakai enctype --}}
<form method="POST" action="/category/create" enctype="multipart/form-data" class="flex items-center h-screen"> 
    @csrf 
    {{-- token, gunanya untuk agar laravel mengenali kita kirim form --}}

    <div class="bg-white  shadow-xl rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 w-10/12 mx-auto">
        <div class="text-3xl font-bold text-blue-400">
            Form Create Category.
        </div>
        <div class="text-sm mb-5 text-gray-400">
            Mulai isi form dengan baik dan benar.
        </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                    for="grid-first-name">
                    Nama Pelajaran
                </label>
                <input name="nama_pelajaran"
                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                    id="grid-first-name" type="text" placeholder="Masukkan Nama Pelajaran . . .">
                <p class="text-red text-xs italic">Please fill out this field.</p>
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                    for="grid-last-name">
                    Foto
                </label>
                <input name="file_foto"
                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                    id="grid-last-name" type="file" placeholder="">
            </div>
        </div>


        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                    for="grid-first-name">
                    Deskripsi
                </label>
                <textarea name="deskripsi" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                    id="grid-first-name" type="text" placeholder="Masukkan Deskripsi . . ."></textarea>
                <p class="text-red text-xs italic">Please fill out this field.</p>
            </div>
        </div>

        <div class="flex">
            <button type="submit"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit
                form</button>
            <a href="/category" type="button"
                class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Kembali
                ke Dashboard -></a>
        </div>

    </div>
</form>
{{-- @include('components.footer') --}}
