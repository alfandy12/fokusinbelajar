<!-- layout dari guest -->
<x-app-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Single Course</x-slot>

    <div class="flex flex-row mt-20 mb-5">
        <div class="px-2 py-4 rounded-lg shadow-lg ml-5 border-2 border-purple-400">
            <a href="/admin-singlecourse" class="font-bold bg-green-500 py-2 px-3 rounded-lg text-white ml-2 mr-1 hover:bg-green-700 transition hover:duration-300">Back</a>
            <a href="/admin-singlecourse/{{ $singleDetail->slug }}/edit" class="font-bold bg-purple-600 py-2 px-3 rounded-lg text-white mr-1 hover:bg-purple-800 transition hover:duration-300">Edit</a>
            <form action="/admin-singlecourse/{{ $singleDetail->slug }}" method="post" class="inline">
                @method('delete')
                @csrf
                <button onClick="confirm('Apakah Anda ingin menghapus Data ini?')" class="font-bold bg-red-600 py-2 px-3 rounded-lg text-white mr-1 hover:bg-red-800 transition hover:duration-300">Delete</button> 
              </form>
        </div>
      </div>

           
      <div class="container flex justify-center justify-items-center" style="margin: 10px 10px; ">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $singleDetail->slug}}" title="YouTube video player"
          frameborder="0" style="border-radius: 25px;"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen></iframe>
      </div>
    
      <div class="mx-5 my-5">
      <div tabindex="0" class="collapse w-full my-1 mx-2 border rounded-box border-base-300 collapse-close">
        <div class="collapse-title text-xl font-medium text-center">
        <a href="{{$singleDetail->link}}" target="_blank">{{$singleDetail->title}}</a>
        </div>
      </div>
    
      <div tabindex="0" class="collapse w-full my-1 mx-2 border rounded-box border-base-300 collapse-close">
        <div class="collapse-title text-xl font-medium text-center">
        {{$singleDetail->category->name}}
        </div>
      </div>
    
      <div tabindex="0" class="collapse w-full my-1 mx-2 border rounded-box border-base-300 collapse-close">
        <div class="collapse-title text-xl font-medium text-center">
        <a href="https://www.youtube.com/channel/{{$singleDetail->channel_id}}" target="_blank">{{$singleDetail->channel_name}}</a>
        </div>
      </div>
    
      <div class="collapse w-full my-1 mx-2 border rounded-box border-base-300 collapse-arrow">
        <input type="checkbox">
        <div class="collapse-title text-xl font-medium text-center">
          Deskripsi :
        </div>
        <div class="collapse-content">
          
          <p>{!! nl2br($singleDetail->description)!!}
          </p>
        </div>
      </div>
    </div>
     




   


</x-app-layout>