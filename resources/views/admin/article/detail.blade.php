<!-- layout dari guest -->
<x-app-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Article</x-slot>

    <div class="flex flex-row mt-20 mb-5">
        <div class="px-2 py-4 rounded-lg shadow-lg ml-5 border-2 border-purple-400">
            <a href="/admin-article" class="font-bold bg-green-500 py-2 px-3 rounded-lg text-white ml-2 mr-1 hover:bg-green-700 transition hover:duration-300">Back</a>
            <a href="/admin-article/{{ $article->id }}/edit" class="font-bold bg-purple-600 py-2 px-3 rounded-lg text-white mr-1 hover:bg-purple-800 transition hover:duration-300">Edit</a>
            <form action="/admin-article/{{ $article->id }}" method="post" class="inline">
                @method('delete')
                @csrf
                <input type="hidden" name="deleteImage" value="{{ $article->thumbnail }}">
                <button onClick="confirm('Apakah Anda ingin menghapus Data ini?')" class="font-bold bg-red-600 py-2 px-3 rounded-lg text-white mr-1 hover:bg-red-800 transition hover:duration-300">Delete</button> 
              </form>
        </div>
      </div>

            <div class="inline text-gray-400 ml-5">
                                
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>{{ date("D, d M, Y. H:i A", strtotime($article->updated_at))}}

                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>{{ number_format($article->read, 0, ',', '.')}}
            </div>
     


    <div class="flex flex-wrap overflow-hidden mt-4">

        <div class="w-full overflow-hidden">    
                <img src="{{url('articles/'.$article->thumbnail)}}" class="w-2/4 block mx-auto object-cover rounded-lg mb-4">
                <h3 class="font-bold text-2xl text-center mt-2">{{ $article->title}}</h3>
                <div class="mx-5 my-3 rounded py-4 text-justify shadow-lg">  
                   <div class="mx-4"> {!!$article->description!!}</div>
                </div>
        </div>
      
    </div>

   


</x-app-layout>