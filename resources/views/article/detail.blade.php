<!-- layout dari guest -->
<x-guest-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Article</x-slot>

    <div class="flex md:flex-row-reverse flex-wrap mt-20">
        <div class="w-full hidden md:block md:w-1/4">
            
            <div class="rounded-lg bg-gray-700 px-4 py-4 text-center text-green-500 font-bold text-xl"> Artikel terpopuler</div>
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

            <div class="rounded-lg bg-gray-700 px-4 py-4 text-center text-green-500 font-bold text-xl mt-6">Artikel Terbaru</div>
            @foreach ($articleNew as $articleBaru)
                
            <a href="{{ route('show', $articleBaru->slug )}}">
            <div class="rounded-lg shadow-md mt-2 py-2 flex">
                <img src="{{url('articles/'.$articleBaru->thumbnail)}}" class="h-20 w-20 object-cover rounded-lg ml-2">
                <div class="flex flex-wrap overflow-hidden">
                    <div class="overflow-hidden">
                        <h2 class="text-lg ml-4 font-bold">{{Str::of($articleBaru->title)->words(3)}}</h2>
                    </div>
                    <div class="overflow-hidden ml-4">
                        <p class="inline text-sm text-justify">{{ Str::of(strip_tags($articleBaru->description))->words(8) }}</p>
                    </div>
                </div>
            </div>
        </a>
            @endforeach
            
        </div>
        
        
        <div class="w-full md:w-3/4">
            <div class="mx-4">
                <div class="inline text-gray-400">
                        
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>{{ date("D, d M, Y. H:i A", strtotime($article->updated_at))}}

                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>{{ number_format($article->read, 0, ',', '.')}}</div>


                <img src="{{url('articles/'.$article->thumbnail)}}" alt="" class="rounded-lg h-96 block mx-auto mt-5">
                <h1 class="text-center text-2xl font-bold mt-4 mb-2">{{ ucfirst($article->title)}}</h1>

               
                <div class="rounded-xl py-4 text-justify shadow-lg mt-2 mb-8">
                    
                      <div class="mx-4"> {!!$article->description!!}</div>
                       
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
  

 </div>
</x-guest-layout>