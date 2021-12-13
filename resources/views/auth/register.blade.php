
<!-- layout dari guest -->
<x-guest-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Registration</x-slot>
    <!-- isi content di bawah -->

    <div class="text-center mt-20">
        <a href="/" class="mb-5 text-5xl font-bold text-green-600">
            Registration
        </a>
    </div>
    <div class="flex justify-center flex-row mb-5">
        <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">

            <div class="card-body">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('register') }}">
                    @csrf
        
                    <!-- Name -->
                    <div class="form-control mt-2">
                        <x-label for="name" :value="__('Name')" />
        
                        <x-input id="name" class="input input-bordered" type="text" name="name" :value="old('name')" required autofocus />
                    </div>
        
                    <!-- Email Address -->
                    <div class="form-control mt-2">
                        <x-label for="email" :value="__('Email')" />
        
                        <x-input id="email" class="input input-bordered" type="email" name="email" :value="old('email')" required />
                    </div>
        
                    <!-- Password -->
                    <div class="form-control mt-2">
                        <x-label for="password" :value="__('Password')" />
        
                        <x-input id="password" class="input input-bordered"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>
        
                    <!-- Confirm Password -->
                    <div class="form-control mt-2">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
        
                        <x-input id="password_confirmation" class="input input-bordered"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                    <div class="form-control mt-2">
                        <button type="submit" class="bg-green-500 text-white px-3 py-3 rounded-lg font-semibold hover:bg-green-600 hover:transition duration-300">Register Account</button>
                    </div>
                </form>
               

            </div>
        </div>
    </div>
       
       

</x-guest-layout>
