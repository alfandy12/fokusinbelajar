<x-app-layout>
    <x-slot name="title">
        Account
    </x-slot>

    <div
        class="grid justify-items-center text-center text-5xl text-green-600 font-bold underline mb-4 mt-16 mx-2">
        <div>Edit Data Account</div>
    </div>

    <div class="h-full w-11/12 md:w-1/3 block mx-auto rounded-lg mb-24 shadow-lg">
    <form action="/admin-account/{{ $account->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-control mx-4">
            <label class="label">
              <span class="label-text" for="name">Name</span>
            </label> 
            <input type="text" id="name" name="name" placeholder="name..." class="input input-primary input-bordered @error('name') input-error @enderror" value="{{ $account->name }}">
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
            <input type="text" id="email" name="email" placeholder="email..." class="input input-primary input-bordered @error('email') input-error @enderror" value="{{ $account->email }}">
          </div> 
          @error('email')
          <label class="label ml-4">
              <span class="label-text-alt text-red-500">{{ $message }}</span>
            </label>
          @enderror

          <div class="form-control mx-4 mt-2">
            <label class="label">
            <span class="label-text" for="role">Role Account</span>
          </label> 
            <select class="select select-bordered select-primary w-full @error('level') select-error @enderror" name="level">
                <option disabled="disabled" selected="selected">Choose a role</option> 
                <option value="admin" {{ $account->level == 'admin' ? 'selected' : '' }}>Admin</option> 
                <option value="user" {{ $account->level == 'user' ? 'selected' : '' }}>User</option> 
            </select>
          </div> 
          @error('level')
          <label class="label ml-4">
              <span class="label-text-alt text-red-500">{{ $message }}</span>
            </label>
          @enderror


          <div class="form-control mx-4">
            <label class="label">
              <span class="label-text" for="password">New Password</span>
            </label> 
            <input type="password" id="password" name="password" placeholder="New password..." class="input input-primary input-bordered @error('password') input-error @enderror">
          
          </div> 
          @error('password')
          <label class="label ml-4">
              <span class="label-text-alt text-red-500">{{ $message }}</span>
            </label>
          @enderror

          <div class="form-control mx-4">
            <label class="label">
              <span class="label-text" for="password_confirmation">Re-type New Password</span>
            </label> 
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-type New password..." class="input input-primary input-bordered @error('password_confirmation') input-error @enderror">
          
          </div> 
          @error('password_confirmation')
          <label class="label ml-4">
              <span class="label-text-alt text-red-500">{{ $message }}</span>
            </label>
          @enderror



          <div class="flex justify-end mr-4 my-2">
            <button type="submit" class="btn btn-primary my-2">Edit</button>
          </div>
        
      </form>
    </div>


</x-app-layout>