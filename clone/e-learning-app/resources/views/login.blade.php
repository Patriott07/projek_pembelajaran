@include('components.header')
<div class="w-full relative bg-center bg-cover bg-fixed" style="background-image:url('{{asset('background (1).jpg')}}');">
    <div class="absolute top-0 left-0 w-full h-screen" style="position:fixed; top:0; left:0;background-color:rgba(132, 130, 130, 0.5);"></div>

    <div class="absolute top-0 left-0 w-10/12 mx-auto flex justify-start items-center h-screen bg-transparent">
        <form action="/login" method="post" class="w-4/12 p-8 bg-white flex flex-col gap-4"
            style="border-radius: 10px; z-index:10;">
            @csrf
            <div>
                <div class="text-3xl font-bold ">
                    RUANG<span class="text-amber-400">ILMU
                    </span>
                </div>
    
                <div class="text-lg text-amber-400 font-bold">
                    LOGIN
                </div>
    
            </div>
    
    
            <p class="text-gray text-sm">Selamat datang di website RuangIlmu. tempat asik buat belajar mudah, nyaman dan cepat.</p>
            <div class="flex flex-col gap-4">
                
                {{-- Alert Pemberitahuan --}}

                @if (Session::has('ok'))
                <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
                    <p class="font-bold">Berhasil!!</p>
                    <p class="text-sm">{{Session::get('ok')}}</p>
                </div>
                @endif

                @if (Session::has('err'))
                <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
                    <p class="font-bold">Something Error!!</p>
                    <p class="text-sm">{{Session::get('err')}}</p>
                </div>
                @endif
    
                <input type="text" name="email" class="shadow-md hover:shadow-2xl w-full w-11 p-3 text-black text-sm"
                    style="background-color: white; border:1px solid gray; border-radius:5px"
                    placeholder="Input your email..">
    
                <input type="password" name="password" class="shadow-md hover:shadow-2xl w-full w-11 p-3 text-sm text-black"
                    style="background-color: white; border:1px solid gray; border-radius:5px"
                    placeholder="Input your password..">
    
                <div class="flex justify-between items-center">
                    <!-- submit harus sama agar kena triger isset($_POST) -->
                    <button type="submit" name="submit" class="px-4 py-3 bg-amber-400 font-semibold w-fit shadow-2xl text-sm text-white cursor-pointer rounded-md">
                        Submit Form
                    </button>
    
                    <a href="./register" class="font-semibold text-sm" style="color: rgb(15, 159, 216)">
                        Start Register
    
                </div>
    
            </div>
        </form>
    
    </div>
    
</div>

