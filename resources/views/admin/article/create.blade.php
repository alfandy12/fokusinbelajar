<x-app-layout>
    <x-slot name="title">
        Article
    </x-slot>

    <div
        class="grid md:justify-items-center text-center justify-items-center text-5xl text-green-600 font-bold underline mb-4 mt-16 mx-2">
        <div>Add Data Article</div>
    </div>

    <div class="h-full w-11/12 md:w-1/3 block mx-auto rounded-lg mb-24 shadow-lg">
    <form action="/admin-article" method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-control mx-4">
            <label class="label">
              <span class="label-text" for="title">Title</span>
            </label> 
            <input type="text" id="title" name="title" placeholder="Title..." class="input input-primary input-bordered @error('title') input-error @enderror" value="{{ old('title') }}">
          </div> 
          @error('title')
          <label class="label ml-4">
              <span class="label-text-alt text-red-500">{{ $message }}</span>
            </label>
          @enderror

          <div class="form-control mx-4">
            <label class="label">
              <span class="label-text" for="slug">Slug</span>
            </label> 
            <input type="text" id="slug" name="slug" placeholder="Slug..." class="input input-primary input-bordered @error('slug') input-error @enderror">
            <i class="text-sm text-gray-400 mt-1">*slug will be automatically filled if the input is clicked</i>
          </div> 
          @error('slug')
          <label class="label ml-4">
              <span class="label-text-alt text-red-500">{{ $message }}</span>
            </label>
          @enderror

          
          <div class="form-control mx-4">
            <label class="label">
                <span class="label-text">Gambar</span>
            </label>
            <img class="img-preview mb-4 rounded-lg">
                <div class="relative h-28 rounded-lg border-dashed border-2 @error('thumbnail') border-red-500 @enderror border-primary bg-white flex justify-center items-center hover:cursor-pointer">
                    <div class="absolute">
                        <div class="flex flex-col items-center "> <i class="fa fa-cloud-upload fa-3x text-gray-200"></i> <span class="block text-gray-400 font-normal">Attach you files here</span> <span class="block text-gray-400 font-normal">or</span> <span class="block text-blue-400 font-normal">Browse files</span> </div>
                    </div>
                    <input type="file" class="h-full w-full opacity-0" name="thumbnail" id="file-upload" onchange="previewImage()">
                </div>
                <div id="file-upload-filename" class="text-sm text-gray-400"></div>
                <div class="flex justify-between items-center text-gray-400"> <span class="text-sm">Accepted file type: jpg/png</span> <span class="flex items-center "><i class="fa fa-lock mr-1"></i> secure</span> </div>
                @error('thumbnail')
                <p class="label-text-alt text-red-500">{{ $message }}</p>
                @enderror
            </div> 

          <div class="form-control mx-4">
            <label class="label">
                <span class="label-text">Description</span>
            </label>
            <input id="x" type="hidden" name="description" value="{{ old('description') }}">
            <trix-editor input="x" class="bg-white mt-5 @if($errors->any()) border-red-500 @else border border-purple-500 @endif rounded-lg" placeholder="Description..." ></trix-editor>
          
            @error('description')
            <label class="label">
                <span class="label-text-alt text-red-500">{{ $message }}</span>
              </label>
            @enderror
          </div>

          <div class="flex justify-end mr-4 my-2">
            <button type="submit" class="btn btn-primary my-2">Add</button>
          </div>
        
      </form>
    </div>

    <script>
      // script untuk generete slug otomatis
      const title = document.querySelector('#title');
      const slug = document.querySelector('#slug');
      
      //ambil dan ganti lalu masukan ke dalam value
      title.addEventListener('change', function() {
        fetch('/admin/article/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
      });

        // script untuk menampilkan nama dari upload file    
    var input = document.getElementById( 'file-upload' );
    var infoArea = document.getElementById( 'file-upload-filename' );
    
    input.addEventListener( 'change', showFileName );
    
    function showFileName( event ) {
      
      // the change event gives us the input it occurred in 
      var input = event.srcElement;
      
      // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
      var fileName = input.files[0].name;
      
      // use fileName however fits your app best, i.e. add it into a div
      infoArea.textContent = 'File name: ' + fileName;
    }

    //preview image 
    function previewImage(){
        const image = document.querySelector('#file-upload');
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
 
    // script untuk menonaktifkan trix editor agar tidak dapat upload gambar pada trix
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
    </script>

</x-app-layout>