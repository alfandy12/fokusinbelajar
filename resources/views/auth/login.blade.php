
<!-- layout dari guest -->
<x-guest-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Login</x-slot>
    <!-- isi content di bawah -->
    <div class="hero min-h-screen bg-base-200">
        <div class="flex-col justify-center hero-content lg:flex-row">
            <div class="text-center lg:text-left">
                <a href="/" class="mb-5 text-5xl font-bold text-green-600">
                    Fokusin Belajar
                </a>
                <p class="mb-8">
                    Fokusin Belajar membantu para pelajar lain mencari materi belajar yang berkualitas.
                </p>
            </div>
            <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card-body">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input placeholder="email" class="input input-bordered" type="email" name="email" value="{{old('email')}}" required autofocus >
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input placeholder="password" class="input input-bordered"  type="password" name="password" required autocomplete="current-password" >
                    </div>
                     <!-- Remember Me -->
                    <div class="form-control mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="radio radio-sm radio-accent" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="form-control mt-6">
                        <button type="submit" class="bg-green-500 text-white px-3 py-3 rounded-lg font-semibold hover:bg-green-600 hover:transition duration-300">Login</button>
                    </div>
                     
                    <label class="label">
                        <a href="{{ route('password.request') }}" class="label-text-alt">Forgot password?</a>
                    </label>
                    <div class="divider"></div>
                    <div class="form-control">
                        <a href="{{ route('register') }}" class="btn btn-outline btn-primary">create new account</a>
                    </div>
    
                </div>
            </form>
            </div>
        </div>
    </div>

</x-guest-layout>
