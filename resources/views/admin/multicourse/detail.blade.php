<!-- layout dari guest -->
<x-app-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Multi Courses</x-slot>

    <div class="flex flex-row mt-20 mb-5">
        <div class="px-2 py-4 rounded-lg shadow-lg ml-5 border-2 border-purple-400">
            <a href="/admin-multicourse" class="font-bold bg-green-500 py-2 px-3 rounded-lg text-white ml-2 mr-1 hover:bg-green-700 transition hover:duration-300">Back</a>
            <a href="/admin-multicourse/{{ $multiDetail->slug}}/edit" class="font-bold bg-purple-600 py-2 px-3 rounded-lg text-white mr-1 hover:bg-purple-800 transition hover:duration-300">Edit</a>
            <form action="/admin-multicourse/{{ $multiDetail->slug }}" method="post" class="inline">
                @method('delete')
                @csrf
                <button type="submit" onClick="confirm('Apakah Anda ingin menghapus Data ini?')" class="font-bold bg-red-600 py-2 px-3 rounded-lg text-white mr-1 hover:bg-red-800 transition hover:duration-300">Delete</button> 
              </form>
        </div>
      </div>

      <div class="overflow-x-auto mx-5 rounded shadow-2xl">
        <table class="table table-zebra w-full">
          <thead>
            <tr>
              <th>No.</th> 
              <th>Link</th>
              <th>Title</th> 
              <th>thumbnail</th>
              <th>description</th>
              <th>Nama Channel</th>
              <th>eps</th>
              <th>aksi</th>
            </tr>
          </thead> 
          <tbody>
            @foreach ($linkmulti as $no => $link)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{Str::limit($link->link, 20, '...') }}</td>
                <td>{{Str::limit($link->title, 20, '...')}}</td>
                <td><div class="w-32">
                  <img src="{{$link->thumbnail}}" alt="" class="max-w-full rounded sm:rounded-lg"></td></div></td>
                <td>{{Str::limit($link->description, 25, '...')}}</td>
                <td>{{Str::limit($link->multicourse->channel_name, 10, '...')}}</td>
                <td>{{$link->eps}}</td>
                <td><a href="/admin-multicourse/{{ $link->multicourse->slug }}/{{$link->eps}}" class="btn btn-outline btn-sm btn-info mr-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg></a> </td>
            </tr>
            
        @endforeach



          </tbody>
        </table>
      </div>

   
   
</x-app-layout>