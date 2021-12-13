 <!-- layout dari guest -->
 <x-guest-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Profile</x-slot>

    
    <div
        class="grid md:justify-items-center text-center justify-items-center text-5xl text-green-600 font-bold underline mb-4 mt-16 mx-2">
        <div>Delete Account</div>
    </div>

    @if(session()->has('wrongOldPassword'))
    <div class="alert alert-error mx-4 md:mx-72 lg:mx-96 my-4">
      <div class="flex-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current"> 
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>                         
        </svg>
        <label>{{ session('wrongOldPassword')}}</label>
      </div>
    </div>
    @endif

<div class="h-full w-11/12 md:w-1/3 block mx-auto rounded-lg mb-24 shadow-lg">
<form action="/remove-profile-accept">
  @csrf
    <div class="form-control mx-4 my-2">
        <label class="label">
          <span class="label-text" for="password">Password</span>

        </label> 
      <input type="password" id="password" name="password" placeholder="password..." class="input input-primary input-bordered">
      <i class="text-sm text-gray-400 mt-1">*Please enter your current password to delete your account</i>
    </div> 

      <div class="flex justify-end mr-4 my-2">
        <button type="submit" class="btn btn-primary my-2">Save</button>
      </div>
    
  </form>
</div>



</x-guest-layout>