<!-- layout dari guest -->
<x-guest-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Multi Courses</x-slot>

    <div class="grid justify-items-center text-5xl text-green-600 font-semibold underline my-4 mx-2 mt-20">
        <div>Courses</div>
    
    </div>

        <iframe class="w-4/5 h-44 sm:w-7/12 sm:h-96 block mx-auto" src="https://www.youtube.com/embed/{{$video->link}}" title="YouTube video player"
            frameborder="0" style="border-radius: 25px;"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>

   
	
	<div class="flex flex-wrap mx-1 overflow-hidden">

  <div class="my-1 px-1 w-full overflow-hidden xl:w-1/2">
    <!-- Column Content -->
	<div class="mx-5"> 
    <div tabindex="0" class="collapse w-full my-1 mx-2 border rounded-box border-base-300 collapse-close">
        <div class="collapse-title text-xl font-medium text-center">
           {{$video->title}}
        </div>
    </div>

    <div tabindex="0" class="collapse w-full my-1 mx-2 border rounded-box border-base-300 collapse-close">
        <div class="collapse-title text-xl font-medium text-center">
            {{$video->multicourse->category->name}}
        </div>
    </div>

    <div tabindex="0" class="collapse w-full my-1 mx-2 border rounded-box border-base-300 collapse-close">
        <div class="collapse-title text-xl font-medium text-center">
            <a href="https://www.youtube.com/channel/{{$video->multicourse->channel_id}}" target="_blank">{{$video->multicourse->channel_name}}</a>
        </div>
    </div>

    <div class="collapse w-full my-1 mx-2 border rounded-box border-base-300 collapse-arrow">
        <input type="checkbox">
        <div class="collapse-title text-xl font-medium text-center">
            Deskripsi
        </div>
        <div class="collapse-content">
            <p> {!! nl2br($video->description)!!}
            </p>
        </div>
    </div>
	</div>
  </div>

  <div class="my-1 px-1 w-full overflow-hidden xl:w-1/2">
    <!-- Column Content -->
	<div class="mx-5 mb-5">
	@foreach ($allMulti as $multi)
        <div tabindex="0" class="collapse w-full my-1 mx-2 border rounded-box border-base-300 collapse-close">
            <div class="collapse-title text-xl font-medium hover:bg-gray-200 @if ($video->eps === $multi->eps)
                bg-gray-200
            @endif">
                <a href="/multicourses/{{$video->multicourse->slug}}/{{$multi->eps}}">
                @if ($video->eps != $multi->eps)
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 inline mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                  </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg> 
                @endif
                  {{$multi->eps}}. || {{Str::limit($multi->title, 20, '...') }}
                </a>
            </div>
        </div>
        @endforeach
       


   </div>
   
  </div>

</div>

</x-guest-layout>