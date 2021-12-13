<x-app-layout>
    <x-slot name="title">
        Article
    </x-slot>

    <div
        class="grid md:justify-items-center text-center justify-items-center text-5xl text-green-600 font-bold underline mb-4 mt-16 mx-2">
        <div>Data Article</div>
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
          <a href="/admin-article/create" class="btn btn-primary ml-2">Add Data</a> 
        </div>
        <div class="w-full overflow-hidden md:w-1/2 lg:w-1/2 xl:w-1/2">
          <!-- Column Content -->
          <div class="form-control mx-2">
            <form action="/admin-article">
              @csrf
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
          <th>Title</th> 
          <th>slug</th> 
          <th>description</th>
          <th>img</th>
          <th>date created</th>
          <th>date updated</th>
          <th>read</th>
          <th>aksi</th>

        </tr>
      </thead> 
      <tbody>
        @foreach ($articles as $no=>$article)
        <tr>
          <th>{{ $articles->firstItem()+$no }}</th> 
          <td>{{ Str::of($article->title)->words(5) }}</td>
          <td>{{ $article->slug }}</td> 
          <td>{{ Str::of(strip_tags($article->description))->words(10) }}</td>
          <td>{{$article->thumbnail}}</td> 
          <td>{{ date("D, d M, Y. H:i A", strtotime($article->created_at))}}</td>
          <td>{{ date("D, d M, Y. H:i A", strtotime($article->updated_at))}}</td>
          <td>{{ $article->read }}</td>
          <td>
            <a href="/admin-article/{{ $article->id }}" class="btn btn-outline btn-sm btn-info mr-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg></a>    
            <a href="/admin-article/{{ $article->id }}/edit" class="btn btn-outline btn-sm btn-warning mr-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg></a>
            <form action="/admin-article/{{ $article->id }}" method="post" class="inline">
              @method('delete')
              @csrf
              <input type="hidden" name="deleteImage" value="{{ $article->thumbnail }}">
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
  
  <div class="mx-5 my-5">{{ $articles->links() }}</div>
</x-app-layout>
