<x-app-layout>
    <x-slot name="title">
        Single Course
    </x-slot>

    <div
        class="grid md:justify-items-center text-center justify-items-center text-5xl text-green-600 font-bold underline mb-4 mt-16 mx-2">
        <div>Edit Data Single Course</div>
    </div>

    <div class="h-full w-11/12 md:w-1/3 block mx-auto rounded-lg mb-24 shadow-lg">
    <form action="/admin-singlecourse/{{$singleEdit->slug}}" method="post">
        @method('put')
      @csrf
        <div class="form-control mx-4">
            <label class="label">
              <span class="label-text" for="link">Link</span>
            </label> 
            <input type="text" id="link" name="link" placeholder="https://youtu.be/VShmGBDUYlk" class="input input-primary input-bordered @error('link') input-error @enderror" value="{{ $singleEdit->link }}">
            <i class="text-sm text-gray-400 mt-1">*open youtube click the share button then copy the link and paste it in the input above</i>
        </div> 
         
          @error('link')
          <label class="label ml-4">
              <span class="label-text-alt text-red-500">{{ $message }}</span>
            </label>
          @enderror

          <div class="form-control mx-4 mt-2">
            <label class="label">
            <span class="label-text" for="role">Category</span>
          </label> 
            <select class="select select-bordered select-primary w-full @error('category') select-error @enderror" name="category_id">
                <option disabled="disabled" selected="selected">Choose a categories</option> 
                @foreach ($categories as $category)
                <option value="{{$category->id}}" {{ old('category_id', $singleEdit->category_id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
               
            </select>
          </div> 
          @error('category_id')
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