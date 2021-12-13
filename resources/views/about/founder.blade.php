<!-- layout dari guest -->
<x-guest-layout>

  <!-- title web wajib memasukan ini -->
  <x-slot name="title">Founder</x-slot>

  <div class="grid justify-items-center text-center text-5xl text-green-600 font-semibold underline mb-4 mt-20 mx-2">
    <div>Founder</div>

  </div>

  <div class="container mx-auto mb-1">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="flex justify-center text-xl my-5">
        <div
          class="max-w-sm rounded overflow-hidden shadow-lg bg-gradient-to-tl from-blue-400 via-purple-500 to-pink-500">
          <div class="mx-14 indicator">
            <div class="indicator-item indicator-bottom indicator-center badge badge-secondary font-bold">Chandra Aulia
              Tama</div>
            <img class="rounded-full block mx-auto mt-5" height="200" width="200" src="{{ asset('assets/img/chandra.jpg')}}" alt="">
          </div>
          <div class="px-6 py-4">
            <div class="font-bold text-white text-sm mb-2 text-center">Mahasiswa/Fullstack dev</div>

          </div>
        </div>
      </div>

      <div class="flex justify-center text-xl my-5">
        <div
          class="max-w-sm rounded overflow-hidden shadow-lg bg-gradient-to-tl from-blue-400 via-purple-500 to-pink-500">
          <div class="mx-14 indicator">
            <div class="indicator-item indicator-bottom indicator-center badge badge-secondary font-bold">Alfandy
              Afriandani</div>
            <img class="rounded-full block mx-auto mt-5" height="200" width="200" src="{{ asset('assets/img/alfandy.jpg')}}" alt="">
          </div>
          <div class="px-6 py-4">
            <div class="font-bold text-white text-sm mb-2 text-center">Web Progamming</div>
          </div>
        </div>
      </div>

      <div class="flex justify-center text-xl my-5">
        <div
          class="max-w-sm rounded overflow-hidden shadow-lg bg-gradient-to-tl from-blue-400 via-purple-500 to-pink-500">
          <div class="mx-14 indicator">
            <div class="indicator-item indicator-bottom indicator-center badge badge-secondary font-bold">Aditya
              Fitriansyah</div>
            <img class="rounded-full block mx-auto mt-5" height="200" width="200" src="{{ asset('assets/img/aditya.jpg')}}" alt="">
          </div>
          <div class="px-6 py-4">
            <div class="font-bold text-white text-sm mb-2 text-center">Web Progamming</div>

          </div>
        </div>
      </div>

      <div class="flex justify-center text-xl my-5">
        <div
          class="max-w-sm rounded overflow-hidden shadow-lg bg-gradient-to-tl from-blue-400 via-purple-500 to-pink-500">
          <div class="mx-14 indicator">
            <div class="indicator-item indicator-bottom indicator-center badge badge-secondary font-bold">Ibra Waliyuda
            </div>
            <img class="rounded-full block mx-auto mt-5" height="200" width="200" src="{{ asset('assets/img/ibra.jpg')}}" alt="">
          </div>
          <div class="px-6 py-4">
            <div class="font-bold text-white text-sm mb-2 text-center">Content Creator</div>

          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="container mx-auto mb-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="flex justify-center text-xl my-5">
        <div
          class="max-w-sm rounded overflow-hidden shadow-lg bg-gradient-to-tl from-blue-400 via-purple-500 to-pink-500">
          <div class="mx-14 indicator">
            <div class="indicator-item indicator-bottom indicator-center badge badge-secondary font-bold">Mahesa</div>
            <img class="rounded-full block mx-auto mt-5" height="200" width="200" src="{{ asset('assets/img/mahesa.jpg')}}" alt="">
          </div>
          <div class="px-6 py-4">
            <div class="font-bold text-white text-sm mb-2 text-center">Mahasiswa</div>

          </div>
        </div>
      </div>

      <div class="flex justify-center text-xl my-5">
        <div
          class="max-w-sm rounded overflow-hidden shadow-lg bg-gradient-to-tl from-blue-400 via-purple-500 to-pink-500">
          <div class="mx-14 indicator">
            <div class="indicator-item indicator-bottom indicator-center badge badge-secondary font-bold">Guna Marga</div>
            <img class="rounded-full block mx-auto mt-5" height="200" width="200" src="{{ asset('assets/img/guna.jpg')}}" alt="">
          </div>
          <div class="px-6 py-4">
            <div class="font-bold text-white text-sm mb-2 text-center">Web Progamming</div>
          </div>
        </div>
      </div>

      <div class="flex justify-center text-xl my-5">
        <div
          class="max-w-sm rounded overflow-hidden shadow-lg bg-gradient-to-tl from-blue-400 via-purple-500 to-pink-500">
          <div class="mx-14 indicator">
            <div class="indicator-item indicator-bottom indicator-center badge badge-secondary font-bold">Mikdad Nahdawi</div>
            <img class="rounded-full block mx-auto mt-5" height="200" width="200" src="{{ asset('assets/img/mikdad.jpg')}}" alt="">
          </div>
          <div class="px-6 py-4">
            <div class="font-bold text-white text-sm mb-2 text-center">Mahasiswa</div>

          </div>
        </div>
      </div>

      <div class="flex justify-center text-xl my-5">
        <div
          class="max-w-sm rounded overflow-hidden shadow-lg bg-gradient-to-tl from-blue-400 via-purple-500 to-pink-500">
          <div class="mx-14 indicator">
            <div class="indicator-item indicator-bottom indicator-center badge badge-secondary font-bold">Bakti Gemilang
            </div>
            <img class="rounded-full block mx-auto mt-5" height="200" width="200" src="{{ asset('assets/img/bakti.jpg')}}" alt="">
          </div>
          <div class="px-6 py-4">
            <div class="font-bold text-white text-sm mb-2 text-center">Mahasiswa</div>

          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="mx-5 mb-10">
    <img src="{{ asset('assets/img/all.jpeg')}}" alt="foto pelulusan" class="block mx-auto rounded-xl">
  </div>
</x-guest-layout>