
<!-- layout dari guest -->
<x-guest-layout>

  <!-- title web wajib memasukan ini -->
  <x-slot name="title">Home</x-slot>
  <!-- isi content di bawah -->
  <br>
  @if(session()->has('removeprofile'))
  <div class="alert fixed md:w-2/4 z-20 top-16 alert-success">
    <div class="flex-1">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mx-2 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <label>{{ session('removeprofile')}}</label>
      
    </div>
  </div>
  @endif
<div class="flex flex-wrap mx-px overflow-hidden md:mx-px bg-gray-200 mt-8">

  <div class="my-px px-px w-full overflow-hidden md:my-px md:px-px md:w-full lg:w-full xl:w-1/2">
    <h3 class="text-center text-5xl text-green-500 font-bold mb-6 mt-2">Fokusin Belajar</h3>
    <p class="text-justify mx-16 font-semibold text-gray-500 mb-3">Tempat belajar online untuk membantu para pelajar
      lain mencari materi belajar yang berkualitas.</p>
    <a href="/singlecourse" class="bg-green-500 text-white px-2 py-2 rounded-lg font-semibold hover:bg-green-600 hover:transition duration-300 ml-16">Mulai
      Belajar</a>
  </div>
  <div class="my-px px-px w-full overflow-hidden md:my-px md:px-px md:w-full lg:w-full xl:w-1/2">
    <img src="{{ asset('assets/img/footer.png')}}" alt="" width="200" class="block mx-auto mt-6">
  </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#E5E7EB" fill-opacity="1" d="M0,64L80,74.7C160,85,320,107,480,96C640,85,800,43,960,48C1120,53,1280,107,1360,133.3L1440,160L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z">
  </path>
</svg>


<div class="flex flex-wrap mx-2 overflow-hidden xl:mx-5">

  <div class="my-2 px-2 w-full overflow-hidden xl:my-5 xl:px-5 xl:w-1/3">
    <div class="card shadow-lg mx-2">
      <div class="card-body">
        <div class="bg-gray-600 mask mask-hexagon px-2 py-2 flex justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 25" stroke="#fff">
            <path d="M12 14l9-5-9-5-9 5 9 5z" />
            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
          </svg>
        </div>
        <h2 class="card-title text-center mt-6">Pelajaran yang dipersonalisasi
        </h2>
        <p class="text-center">Pengguna dapat belajar sesuka hati, belajar secara mandiri, dan memilih mata pelajaran
          yang disukai</p>
      </div>

    </div>
  </div>

  <div class="my-2 px-2 w-full overflow-hidden xl:my-5 xl:px-5 xl:w-1/3">
    <div class="card shadow-lg mx-2">
      <div class="card-body">
        <div class="bg-gray-600 mask mask-hexagon px-2 py-2 flex justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 25" stroke="#fff">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <h2 class="card-title text-center mt-6">Materi terpercaya</h2>
        <p class="text-center">Materi dan video sudah kami kurasi & pilihkan agar dapat dengan mudah dimengerti dan
          dipelajari mandiri</p>
      </div>

    </div>
  </div>

  <div class="my-2 px-2 w-full overflow-hidden xl:my-5 xl:px-5 xl:w-1/3">
    <div class="card shadow-lg mx-2">
      <div class="card-body">
        <div class="bg-gray-600 mask mask-hexagon px-2 py-2 flex justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 25" stroke="#fff">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
          </svg>
        </div>
        <h2 class="card-title text-center mt-6">Artikel</h2>
        <p class="text-center">Kami juga telah menyediakan berbagai macam Artikel menarik untuk di baca
          oleh para penguna</p>
      </div>

    </div>
  </div>

</div>
</x-guest-layout>