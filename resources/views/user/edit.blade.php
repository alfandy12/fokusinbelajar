 <!-- layout dari guest -->
<x-guest-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Profile</x-slot>

    
    <div
        class="grid md:justify-items-center text-center justify-items-center text-5xl text-green-600 font-bold underline mb-4 mt-16 mx-2">
        <div>Edit Profile</div>
    </div>

<div class="h-full w-11/12 md:w-1/3 block mx-auto rounded-lg mb-24 shadow-lg">
<form action="/update-profile" method="post">
    @method('put')
  @csrf
    <div class="form-control mx-4 my-2">
        <label class="label">
          <span class="label-text" for="name">Name</span>
        </label> 
      <input type="text" id="name" name="name" placeholder="name..." class="input input-primary input-bordered @error('name') input-error @enderror" value="{{ Auth::user()->name}}">
    </div> 
      @error('name')
      <label class="label ml-4">
          <span class="label-text-alt text-red-500">{{ $message }}</span>
        </label>
      @enderror

      <div class="form-control mx-4">
        <label class="label">
          <span class="label-text" for="email">Email</span>
        </label> 
    <input type="text" id="email" name="email" placeholder="email..." class="input input-primary input-bordered @error('email') input-error @enderror" value="{{ Auth::user()->email}}">
    </div> 
      @error('email')
      <label class="label ml-4">
          <span class="label-text-alt text-red-500">{{ $message }}</span>
        </label>
      @enderror

      

      <div class="flex justify-end mr-4 my-2">
        <button type="submit" class="btn btn-primary my-2">Save</button>
      </div>
    
  </form>
</div>



</x-guest-layout>