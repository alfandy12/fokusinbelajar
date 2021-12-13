
<!-- layout dari guest -->
<x-guest-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Reset Password</x-slot>
    <!-- isi content di bawah -->
    <div class="text-center mt-20 mb-5">
        <a href="/" class="mb-5 text-5xl font-bold text-green-600">
            Change Password
        </a>
    </div>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <div class="flex justify-center flex-row mb-10">
            <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <div class="card-body">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                 <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email Address -->
                    <div class="form-control mb-2">
                        <x-label for="email" class="mb-2" :value="__('Email')" />

                        <x-input id="email" class="input input-bordered" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                    </div>
                        
                    <!-- Password -->
                    <div class="form-control mb-2">
                        <x-label for="password" class="mb-2" :value="__('Password')" />

                        <x-input id="password" class="input input-bordered" placeholder="Password" type="password" name="password" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-control mb-2">
                        <x-label for="password_confirmation" class="mb-2" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="input input-bordered"
                                            type="password"
                                            name="password_confirmation" placeholder="Confirm Password" required />
                    </div>
                    <div class="form-control mt-6">
                        <button type="submit" class="bg-green-500 text-white px-3 py-3 rounded-lg font-semibold hover:bg-green-600 hover:transition duration-300">Change Password</button>
                    </div>
                    <a href="/login" class="mt-2 text-green-500 no-underline hover:text-green-700 hover:no-underline transition duration-200">back to login</a>
                </div>
            </div>
        </div>
        </div>

       
        </form>

</x-guest-layout>
