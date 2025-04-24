@include('components.header_dashboard')
<!-- component -->
@include('components.sidebar')

@include('components.navbar')


<form action="/pengajar/update/{{ $data->id }}" method="POST" enctype="multipart/form-data"
    class="max-w-4xl my-8 me-[7vw] ms-auto bg-white shadow-lg rounded-xl p-6 space-y-6">
    @csrf
    <h2 class="text-xl font-semibold">Personal Information</h2>

    <!-- Avatar -->
    <div class="flex">
        <a href="{{ $data->foto }}" class="flex items-center space-x-4 w-fit">
            <div
                class="w-20 bg-[url('{{ $data->foto }}')] bg-center bg-cover h-20 bg-gray-200 rounded-full flex items-center justify-center relative">
                {{-- <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 12c2.7 0 4.9-2.2 4.9-4.9S14.7 2.2 12 2.2 7.1 4.4 7.1 7.1 9.3 12 12 12zm0 2c-3.1 0-9.3 1.6-9.3 4.9v2.9h18.6v-2.9c0-3.3-6.2-4.9-9.3-4.9z" />
                </svg> --}}
                <div class="absolute -bottom-1 -right-1 bg-white p-1 rounded-full">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536M9 11l6 6m2-2l-6-6M3 21h4l10-10-4-4L3 17v4z" />
                    </svg>
                </div>
            </div>
        </a>

        <label for="foto" id="label_foto" class="ms-3 mt-8 text-sm font-bold cursor-pointer hover:text-blue-500">
            [ Change Profile Here ]
        </label>

        <input type="file" name="file_foto" id="foto" hidden onchange="handleChange()">

        <div class="bg-green-100 ms-5 mt-3 border-l-4 border-green-500 text-green-700 p-3 mb-4 hidden" id="alert">
            <p class="font-bold text-sm">Selamatt!</p>
            <p class="text-xs">Foto Profil berhasil dirubah, silahkan submit untuk melanjutkan.</p>
        </div>

        <script>
            function handleChange() {
                document.getElementById('label_foto').classList.add('hidden');
                document.getElementById('alert').classList.toggle('hidden');


            }
        </script>
    </div>

    <!-- Email -->
    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
            Your Username
        </label>
        <input name="name" value="{{ $data->name }}"
            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
            id="grid-first-name" type="text" placeholder="Masukkan Nama Pelajaran . . .">
        <p class="text-red text-xs italic">Please fill out this field.</p>
    </div>

    <div class="-mx-3 md:flex mb-6 px-3">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Bio
            </label>
            <textarea name="bio"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                id="grid-first-name" type="text" placeholder="Masukkan Deskripsi . . .">{{ $data->bio }}</textarea>
            {{-- <p class="text-red text-xs italic">Please fill out this field.</p> --}}
        </div>

        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Keahlian
            </label>
            <textarea name="keahlian"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                id="grid-first-name" type="text" placeholder="Masukkan Deskripsi . . .">{{ $data->keahlian }}</textarea>
            {{-- <p class="text-red text-xs italic">Please fill out this field.</p> --}}
        </div>
    </div>


    <!-- Submit Button -->
    <div class="text-start px-3">
        <button class="bg-blue-900 hover:bg-blue-800 text-white font-semibold px-6 py-2 rounded-md transition">
            Update Profile
        </button>
    </div>
</form>
