@include('components.header')

@if(session('success'))
    <div class="text-green-500">{{ session('success') }}</div>
@endif

@if($errors->any())
    <ul class="text-red-500 text-sm list-disc ml-4">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="w-full relative bg-center bg-cover bg-fixed" style="background-image:url('{{asset('background (1).jpg')}}');">
    <div class="absolute top-0 left-0 w-full h-screen" style="position:fixed; top:0; left:0;background-color:rgba(132, 130, 130, 0.5);"></div>

    <div class="absolute top-0 left-0 w-10/12 mx-auto flex justify-start items-center h-screen bg-transparent">
        <form action="/register" method="post" class="w-4/12 p-8 bg-white flex flex-col gap-4"
            style="border-radius: 10px; z-index:10;">
            @csrf 
            {{-- menghasilkan token --}}
            
            <div>
                <div class="text-3xl font-bold ">
                    RUANG<span class="text-amber-400">ILMU
                    </span>
                </div>
    
                <div class="text-lg text-amber-400 font-bold">
                    REGISTER
                </div>
    
            </div>
    
    
            <p class="text-gray text-sm">Selamat datang di website RuangIlmu. tempat asik buat belajar mudah, nyaman dan cepat.</p>
            <div class="flex flex-col gap-4">
    
    
                <input type="text" name="name" class="shadow-md hover:shadow-2xl w-full w-11 p-3 text-black text-sm"
                    style="background-color: white; border:1px solid gray; border-radius:5px"
                    placeholder="Input your name..">
    
                <input type="text" name="email" class="shadow-md hover:shadow-2xl w-full w-11 p-3 text-black text-sm"
                    style="background-color: white; border:1px solid gray; border-radius:5px"
                    placeholder="Input your email..">
    
                <input type="password" name="password" class="shadow-md hover:shadow-2xl w-full w-11 p-3 text-sm text-black"
                    style="background-color: white; border:1px solid gray; border-radius:5px"
                    placeholder="Input your password..">
    
                <div class="flex justify-between items-center">
                    <!-- submit harus sama agar kena triger isset($_POST) -->
                    <button type="submit" class="px-4 py-3 bg-amber-400 font-semibold w-fit shadow-2xl text-sm text-white cursor-pointer rounded-md">
                        Submit Form
                    </button>
    
                    <a href="./login" class="font-semibold text-sm" style="color: rgb(15, 159, 216)">
                        Start Login
    
                </div>
    
            </div>
        </form>
    
    </div>
    
</div>

