

<!-- layout dari guest -->
<x-guest-layout>

    <!-- title web wajib memasukan ini -->
    <x-slot name="title">Forgot Password</x-slot>
    <div class="text-center mt-20">
        <a href="/" class="mb-5 text-5xl font-bold text-green-600">
            Fokusin Belajar
        </a>
    </div>
    <!-- isi content di bawah -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="flex justify-center flex-row mb-10">
                <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                    <div class="card-body">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="text-sm text-gray-600">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>
                        <div class="form-control">
                            <label for="email" class="label" :value="__('Email')">
                                <span class="label-text">Email</span>
                            </label>
                            <x-input id="email" placeholder="email" class="input input-bordered" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                        <div class="form-control mt-6">
                            <button type="submit" class="bg-green-500 text-white px-3 py-3 rounded-lg font-semibold hover:bg-green-600 hover:transition duration-300">Search Email</button>
                        </div>
                        <a href="/login" class="mt-2 text-green-500 no-underline hover:text-green-700 hover:no-underline transition duration-200">Back to login</a>
                    </div>
                </div>
            </div>
            </div>
        </form>
</x-guest-layout>
