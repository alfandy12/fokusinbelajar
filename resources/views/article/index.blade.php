<!-- layout dari guest -->
<x-guest-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Article</x-slot>

    <div
        class="grid md:justify-items-center justify-items-center text-5xl text-green-600 font-semibold underline mb-4 mt-16 mx-2">
        <div>Article</div>
    </div>

    <form action="/article">
        @csrf
    <div class="form-control mx-2">
        <div class="flex justify-end space-x-2 mb-5">
          <input type="text" name="search" placeholder="Search" class="w-full md:w-1/4 input input-primary input-bordered" value="{{ request('search')}}" value="{{ request('search')}}"> 
          <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg></button>
        </div>
      </div>
    </form>
      

    <div class="flex md:flex-row-reverse flex-wrap">
        <div class="w-full md:w-1/4 p-4 text-green-500 font-semibold text-xl">
            <div class="rounded-lg bg-gray-700 px-4 py-4 text-center "> Artikel terpopuler</div>
            <div class="text-green-500 font-semibold text-lg">
               
             
                    @foreach ($popularItem as $popular) 
                    <a href="{{ route('show', $popular->slug )}}">
                        <div class="rounded-lg shadow-md mt-2 py-2 flex">
                            <img src="{{url('articles/'.$popular->thumbnail)}}" class="h-20 w-20 object-cover rounded-lg ml-2">
                            <div class="flex flex-wrap overflow-hidden">
                                <div class="overflow-hidden">
                                    <h2 class="text-lg ml-4 font-bold">{{Str::of( $popular->title)->words(3)}}</h2>
                                </div>
                                <div class="overflow-hidden ml-4">
                                    <p class="inline text-sm text-justify">{{ Str::of(strip_tags($popular->description))->words(8) }}</p>
                                </div>
                            </div>
                        </div>
                    </a>               
                       
                    @endforeach     
              
               
            </div>
        </div>
        <div class="w-full md:w-3/4">

            <!-- ini kartu -->
            @foreach ($articles as $article)
            <div class="card lg:card-side bordered mb-4 shadow-md ml-4 mr-4 md:mr-1">
                <figure>
                    <img src="{{url('articles/'.$article->thumbnail)}}" class="h-44 w-44 min-w-full object-cover">
                </figure>
                <div class="card-body relative">
                    <h2 class="card-title">{{ Str::of($article->title)->words(5) }}</h2>
                    <p class="mb-2">{{ Str::of(strip_tags($article->description))->words(15) }}</p>
                    <a href="{{ route('show', $article->slug )}}" class="btn btn-ghost">Baca Selengkapnya</a>
                    <div class="inline-flex items-center text-gray-400 text-xs absolute bottom-2 right-6"><svg
                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>&nbsp;{{ date("D, d M, Y. H:i A", strtotime($article->updated_at))}} &emsp; <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd" />
                        </svg>&nbsp;{{ number_format($article->read, 0, ',', '.')}}</div>
                </div>
            </div>

            @endforeach

        </div>
        
    </div>
    <div class="mx-6 my-5">{{ $articles->links() }}</div>

</x-guest-layout>