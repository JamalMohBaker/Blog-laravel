{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<x-blog-layout title="Register">
    <div class="container mt-5 border p-5 mb-2">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="firstname" class="form-control" placeholder="firstname" id="">
            </div>
            <div class="form-group">
                <input type="text" name="lastname" class="form-control" placeholder="lastname" id="">
            </div>
            <div class="form-group">
                <input type="text" name="phone" class="form-control" placeholder="phone" id="">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="email" id="">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="password" id="">
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="password confirmation" id="">
            </div>
            <div class="form-group d-flex justify-content-center align-item-center">
                   <button class="btn btn-primary ">
                        {{ __('Register') }}
                   </button>
            </div>
            <div class="form-group d-flex justify-content-center align-item-center">
                <a href="{{ route('login') }}">Login Now</a>
             </div>
        </form>
    </div>
</x-blog-layout>
