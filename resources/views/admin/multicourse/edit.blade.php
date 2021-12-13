<x-app-layout>
    <x-slot name="title">
        Multi Courses
    </x-slot>

    <div
        class="grid md:justify-items-center text-center justify-items-center text-5xl text-green-600 font-bold underline mb-4 mt-16 mx-2">
        <div>Edit Data Multi Course</div>
    </div>

    <div class="h-full w-11/12 md:w-1/3 block mx-auto rounded-lg mb-24 shadow-lg">
    <form action="/admin-multicourse/{{ $multiEdit->slug }}" method="post">
      @method('put')
      @csrf
        <div class="form-control mx-4">
            <label class="label">
              <span class="label-text" for="link">Link playlist</span>
            </label> 
            <input type="text" id="link" name="link" placeholder="https://youtube.com/playlist?list=PLFIM0718LjIVEh_d-h5wAjsdv2W4SAtkx" class="input input-primary input-bordered @error('link') input-error @enderror" value="{{ $multiEdit->link }}">
            <i class="text-sm text-gray-400 mt-1">*To see a video tutorial on how to take a playlist link, please <a href="" class="text-green-500">click here.</a></i>
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
                <option value="{{$category->id}}" {{ old('category_id', $multiEdit->category_id) == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
               
            </select>
          </div> 
          @error('category_id')
          <label class="label ml-4">
              <span class="label-text-alt text-red-500">{{ $message }}</span>
            </label>
          @enderror
         

          <div class="flex justify-end mr-4 my-2">
            <button type="submit" class="btn btn-primary my-2">Save</button>
          </div>
        
      </form>
    </div>



</x-app-layout>