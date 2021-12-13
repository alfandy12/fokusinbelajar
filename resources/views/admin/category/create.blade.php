<x-app-layout>
    <x-slot name="title">
        Category
    </x-slot>

    <div
        class="grid md:justify-items-center text-center justify-items-center text-5xl text-green-600 font-bold underline mb-4 mt-16 mx-2">
        <div>Add Data Category</div>
    </div>

    <div class="h-full w-11/12 md:w-1/3 block mx-auto rounded-lg mb-24 shadow-lg">
    <form action="/admin-category" method="post">
      @csrf
        <div class="form-control mx-4">
            <label class="label">
              <span class="label-text" for="name">Name</span>
            </label> 
            <input type="text" id="name" name="name" placeholder="name..." class="input input-primary input-bordered @error('name') input-error @enderror" value="{{ old('name') }}">

        </div> 
          @error('name')
          <label class="label ml-4">
              <span class="label-text-alt text-red-500">{{ $message }}</span>
            </label>
          @enderror
        
          <div class="form-control mx-4">
            <label class="label">
              <span class="label-text" for="slug">Slug</span>
            </label> 
            <input type="text" id="slug" name="slug" placeholder="slug..." class="input input-primary input-bordered @error('slug') input-error @enderror" value="{{ old('slug') }}">
            <i class="text-sm text-gray-400 mt-1">*The slug category must be created manually, please adjust the name. If the slug contains spaces, put a hyphen ( - ).
                <br>example: engineering-science</i>
        </div> 
          @error('slug')
          <label class="label ml-4">
              <span class="label-text-alt text-red-500">{{ $message }}</span>
            </label>
          @enderror
         
         

          <div class="flex justify-end mr-4 my-2">
            <button type="submit" class="btn btn-primary my-2">Add</button>
          </div>
        
      </form>
    </div>



</x-app-layout>