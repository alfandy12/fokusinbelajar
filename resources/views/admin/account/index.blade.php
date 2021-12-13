<x-app-layout>
    <x-slot name="title">
        Account
    </x-slot>

    <div
        class="grid md:justify-items-center text-center justify-items-center text-5xl text-green-600 font-bold underline mb-4 mt-16 mx-2">
        <div>Data Account</div>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success mx-10 my-4">
      <div class="flex-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">          
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>                
        </svg> 
        <label>{{ session('success')}}</label>
      </div>
    </div>
    @endif
    <div class="flex flex-wrap overflow-hidden mx-5">

        <div class="w-full overflow-hidden md:w-1/2 lg:w-1/2 xl:w-1/2 my-2">
          <!-- Column Content -->
          <a href="/admin-account/create" class="btn btn-primary ml-2">Add Data</a> 
        </div>
        <div class="w-full overflow-hidden md:w-1/2 lg:w-1/2 xl:w-1/2">
          <!-- Column Content -->
          <form action="/admin-account">
            @csrf
          <div class="form-control mx-2">
            <div class="flex justify-end space-x-2 mb-5">
              <input type="text" name="search" placeholder="Search" class="w-full md:w-2/4 input input-primary input-bordered" value="{{ request('search')}}"> 
              <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg></button>
            </div>
          </div>
        </form>
        </div>
      
      </div>

      
<div class="overflow-x-auto mx-5 rounded shadow-2xl">
    <table class="table table-zebra w-full">
      <thead>
        <tr>
          <th>No.</th> 
          <th>Name</th> 
          <th>Level</th>
          <th>Email</th> 
          <th>Verifed</th>
          <th>Created At</th>
          <th>Update At</th>
          <th>aksi</th>

        </tr>
      </thead> 
      <tbody>

          @foreach ($accounts as $no=>$account)
         
        <tr>
        <td>{{$accounts->firstItem()+$no}}</td>
            <td>{{ $account->name}}</td>
            <td>{{ $account->level}}</td>
            <td>{{ $account->email}}</td>
            <td>
                @if ($account->email_verified_at != null)
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="#6ee7b7">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                  @else
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="#f87171">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                  </svg>
                @endif
            </td>
            <td>{{ date("D, d M, Y. H:i A", strtotime($account->created_at))}}</td>
            <td>{{ date("D, d M, Y. H:i A", strtotime($account->updated_at))}}</td>
            <td><a href="/admin-account/{{$account->id}}/edit" class="btn btn-outline btn-sm btn-warning"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
              </svg></a>
              <form action="/admin-account/{{ $account->id }}" method="post" class="inline">
                @method('delete')
                @csrf
                <button onClick="confirm('Apakah Anda ingin menghapus Data ini?')" class="btn btn-outline btn-sm btn-error"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg></button>
               
              </form>
             </td>
        </tr>
        @endforeach
       
      </tbody>
    </table>
  </div>
  
  <div class="mx-5 my-5">{{ $accounts->links() }}</div>
</x-app-layout>
