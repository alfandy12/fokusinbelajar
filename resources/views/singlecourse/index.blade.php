<!-- layout dari guest -->
<x-guest-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Single Course</x-slot>

<div class="grid justify-items-center text-5xl text-green-600 font-semibold underline my-4 mx-2 mt-20">
    <div>Courses</div>

</div>


<div class="containermx-auto">
    <div class="justify-items-center">
        <div class="grid grid-cols mx-2 md:grid-cols-2 lg:grid-cols gap-6">
            <label for="my-modal-2" class="modal-button flex"><svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>&nbsp;Filter</label>
            <input type="checkbox" id="my-modal-2" class="modal-toggle">
            <div class="modal">
            
                <div class="modal-box">

                    @foreach ($categories as $category)
                    <div class="form-control">
                        <label class="cursor-pointer label">
                        <a href="/singlecourse/category/{{$category->slug}}">{{$category->name}}</a>
                      
                        </label>
                    </div>
                    @endforeach
                    
                    <div class="modal-action">
                        
                        <label for="my-modal-2" class="btn">Close</label>
                    </div>
                </div>
  
            </div>
            <div class="form-control mx-2">
                <form action="/singlecourse">
                    @csrf
                <div class="flex space-x-2">
                    <input type="text" name="search" placeholder="B.Inggris Grammar"
                class="w-full input input-primary input-bordered" id="myFilter" onkeyup="myFunction()" value="{{ request('search')}}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($singlecourse as $single)
                
            
             <a href="/singlecourse/{{$single->slug}}">
                <div class="flex justify-center text-xl my-5">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            <img class="w-full" src="{{$single->thumbnail}}" alt="">     
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2 text-center">{{Str::limit($single->title, 15)}}</div>
                        <div class="font-bold text-gray-400 text-sm mb-2">{{Str::limit($single->channel_name, 25)}}</div>
                            <p class="text-gray-700 text-base text-justify">
                                {{Str::limit($single->description, 50)}}
                            </p>
                        </div>
                        <div class="px-2 pt-4 pb-2">
                            <span
                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $single->category->name}}</span>
                        </div>
                    </div>
                </div>
            </a>

       
            @endforeach
        
    </div>
</div>

<br>
<div class="mx-10">{{ $singlecourse->links() }}</div>

<br>


</x-guest-layout>