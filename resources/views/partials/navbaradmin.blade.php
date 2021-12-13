
<!-- ini navbar admin -->
<nav class="flex items-center justify-between flex-wrap bg-neutral p-2 fixed w-full top-0" style="z-index:9999;">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a class="" href="/">
            <img src="{{ asset('assets/img/fokusinbelajarsmall.png') }}" alt="Logo" class="h-10 w-8" style="margin-right:20px;" />
            </a>
        </div>

        <div class="block lg:hidden">
            <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-green-500 border-green-600 hover:text-green hover:border-green">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>

        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="mr-2"> <!-- kalo titlenya sama kaya home berarti active tambahkan textgreen -->
                <a class="@if($title == 'Dashboard') text-green-500 @else text-white @endif font-bold inline-block py-2 px-4 no-underline" href="/dashboard">Dashboard</a>
                </li>

                <li class="mr-2">
                    <a class="@if($title == 'Category') text-green-500 @endif text-white font-bold inline-block py-2 px-4 no-underline" href="/admin-category">Category</a>
                </li>

                <li class="mr-2">
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="inline-block @if($title == 'Single Course') text-green-500 @elseif($title == 'Multi Courses') text-green-500 @else text-white @endif font-bold no-underline py-2 px-4">
                            <span>Courses</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg z-10">
                            <div class="px-2 py-2 bg-white rounded-md shadow">
                                <a class="@if($title == 'Single Course') bg-gray-200 @endif block px-4 py-2 mt-2 text-
                                sm rounded-lg hover:bg-gray-200" href="/admin-singlecourse">Single Course</a>
                                <a class="@if($title == 'Multi Courses') bg-gray-200 @endif block px-4 py-2 mt-2 text-sm rounded-lg hover:bg-gray-200" href="/admin-multicourse">Multi Courses</a>

                            </div>
                        </div>
                    </div>
                </li>

                <li class="mr-2">
                    <a class="@if($title == 'Article') text-green-500 @endif text-white font-bold inline-block py-2 px-4 no-underline" href="/admin-article">Article</a>
                </li>

                <li class="mr-2">
                    <a class="@if($title == 'Account') text-green-500 @endif text-white font-bold inline-block py-2 px-4 no-underline" href="/admin-account">Account</a>
                </li>
            
                @auth
                <div class="dropdown">
                    <div tabindex="0" class="cursor-pointer m-1 inline-block py-2 px-4 text-white no-underline">{{ Auth::user()->name }}</div> 
                    <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
                        @auth
                        <li><a href="/">Home</a></li>
                        <li><a href="/my-profile">Profile</a></li>
                        @endauth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                        <li>
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                      </li> 
                    </form>
                    </ul>
                  </div>
                  
               
                @else
                <li class="mr-3">
                    <a href="{{ route('login') }}" class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-orange-500 text-white px-5 py-2 rounded-md mt-2">
                        Login
                    </a>
                @endauth
                </li>
            </ul>
        </div>
    </nav>

  <span class="text-lg font-bold">
    Fokusin Belajar
  </span>