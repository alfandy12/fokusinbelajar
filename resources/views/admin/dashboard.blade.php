<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <div class="mt-16 mx-5">
        <h3 class="text-2xl text-green-500 font-bold ml-5">Data Statistics Fokusin Belajar</h3>
        <div class="w-full shadow stats">
          <div class="stat">
            <div class="stat-figure text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-8 h-8 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                  </svg>
             
            </div> 
            <div class="stat-title">Single Course</div> 
            <div class="stat-value text-primary">{{ $countSinglecourse }}</div> 
          </div> 
          <div class="stat">
            <div class="stat-figure text-info">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-8 h-8 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                  </svg>
            </div> 
            <div class="stat-title">Multi Courses</div> 
            <div class="stat-value text-info">{{ $countMulticourse }}</div> 
          </div> 
          <div class="stat">
            <div class="stat-figure text-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-8 h-8 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                  </svg>
            </div> 
            <div class="stat-title">Article</div> 
            <div class="stat-value text-secondary">{{ $countArticles }}</div>
          </div> 
          <div class="stat">
            <div class="stat-figure text-accent">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-8 h-8 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
              </div> 
              <div class="stat-title">User</div> 
            <div class="stat-value text-accent">{{ $countUsers}}</div>
          </div>
        </div>
      </div>

      <div class="mt-16 mx-5">
        <h3 class="text-2xl text-green-500 font-bold ml-5">Data Statistics Single Course Fokusin Belajar</h3>
        <div class="w-full shadow stats">
          @foreach ($categories as $category)
          <div class="stat">
            <div class="stat-figure text-primary"> 
            </div> 
            <div class="text-purple-800">{{ Str::limit($category->name, 10, '...')}}</div> 
            <div class="text-primary">{{ $category->singlecourse->count() }}</div> 
          </div> 
          @endforeach
        </div>
      </div>

      <div class="mt-16 mx-5">
        <h3 class="text-2xl text-green-500 font-bold ml-5">Data Statistics MultiCourse Fokusin Belajar</h3>
        <div class="w-full shadow stats">
          @foreach ($categories as $category)
          <div class="stat">
            <div class="stat-figure text-primary"> 
            </div> 
            <div class="text-purple-800">{{ Str::limit($category->name, 10, '...')}}</div> 
            <div class="text-primary">{{ $category->multicourse->count() }}</div> 
          </div> 
          @endforeach
        </div>
      </div>
 
</x-app-layout>
