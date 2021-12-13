
 <!-- layout dari guest -->
<x-guest-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Profile</x-slot>

    <div class="grid md:justify-items-center justify-items-center text-5xl text-green-600 font-semibold underline mb-4 mt-16 mx-2">
    My Profile
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success mx-4 lg:mx-44 my-4">
      <div class="flex-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">          
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>                
        </svg> 
        <label>{{ session('success')}}</label>
      </div>
    </div>
    @endif



    <div class="h-full w-11/12 md:w-2/3 block mx-auto rounded-lg mb-24 shadow-lg">
        <div class="mx-5 my-5">
          <br>
            <div class="mt-5 text-2xl font-semibold mb-1">{{Auth::user()->name}}</div>
            <div class="inline" >{{Auth::user()->email}}</div>@if (Auth::user()->email_verified_at != null)
            <div class="text-green-500 inline"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
              </svg> 
            </div>
            @endif
           <br>
           
           <div class="mt-2 mb-3 text-sm">Member Since {{ date("D, d M, Y. H:i A", strtotime(Auth::user()->created_at))}}</div>
            <div class="inline py-2 px-2 shadow-lg text-green-500 font-semibold rounded-xl"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            <div class="inline mt-2">{{Auth::user()->level}}</div>
        </div>
            
            <div class="flex flex-col md:flex-row justify-items-center mx-auto md:justify-end">
                <a href="/edit-profile" class="btn btn-sm btn-primary mx-1 my-2">Edit Profile</a> 
                <a href="/change-password" class="btn btn btn-outline btn-sm btn-primary mx-1 my-2">Edit Password</a>
                <a href="/remove-profile" class="btn btn btn-outline btn-sm btn-error mx-1 my-2">Delete Account</a>  
                
              </div>
           
    </div>
    </div>


</x-guest-layout>

