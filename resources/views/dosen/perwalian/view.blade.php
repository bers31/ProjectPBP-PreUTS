@include('header')

<div class="flex flex-col h-full">
  <x-navbar/>
  <div class="flex items-center py-3">
    <div class="font-bold text-lg md:text-xl pl-4 py-1">
        Perwalian 
    </div>
    <div class="text-lg md:text-xl py-1">
      > Detail
    </div>
  </div>
  <div class="container mx-auto py-8">
    <!-- Profile Section -->
    <div class="col-span-3 lg:col-span-3 flex flex-col lg:flex-row p-6 lg:p-8 border-2 border-[#80747475] rounded-lg gap-3 shadow-md">
        <!-- Foto Profile -->
        <div class="p-5 flex justify-center lg:justify-start">
            <img class="rounded-full w-36 h-36 lg:w-52 lg:h-52 object-cover" src="/img/Pasfoto.png" alt="pasfoto">
        </div>
        <!-- Info Profile -->
        <div class="flex flex-col justify-center gap-2 text-center lg:text-left">
            <h1 class="text-5xl text-bold text-gray-600"> {{$mahasiswa->nama}} </h1>
            <p class="text-lg text-gray-600"> {{$mahasiswa->nim}} </p>
            <p class="text-lg text-gray-600"> </p>
            <p class="text-lg text-gray-600"></p>
            <p class="text-lg text-blue-500">  </p>
        </div>
        <!-- Tombol Biodata -->
        <div class="ml-auto mt-4 lg:mt-0 flex justify-center lg:block">
            <button class="px-4 py-2 border-2 rounded-lg text-black font-semibold text-sm lg:text-lg hover:bg-[#f0f0f0]">
                Biodata
            </button>
        </div>
    </div>
  </div>
      

      </div>
    </div>
  </div>
  
</div>

@include('footer')