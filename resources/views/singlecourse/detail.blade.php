<!-- layout dari guest -->
<x-guest-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Single Course</x-slot>
<br>
<br>
<br>

<div class="grid justify-items-center text-center  text-5xl text-green-600 font-semibold underline my-4 mx-2">
    <div>Detail Courses</div>

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
    <a href="/singlecourse/category/{{$singleDetail->category->slug}}">{{$singleDetail->category->name}}</a>
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
      <p>{!! nl2br($singleDetail->description)!!}</p>
    </div>
  </div>
</div>
</x-guest-layout>