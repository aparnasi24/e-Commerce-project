<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="/redirect">
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" class="block text-sm font-medium text-gray-700" />
                <x-jet-input id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div>
                <x-jet-label for="password" value="{{ __('Password') }}" class="block text-sm font-medium text-gray-700" />
                <x-jet-input id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-between">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div>
                <x-jet-button class="w-full bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <span class="block text-sm text-gray-600 mb-2">
                {{ __('Or') }}
            </span>
            <a href="/auth/redirect" class="inline-flex items-center justify-center w-full px-6 py-3 border border-transparent rounded-md shadow-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                {{ __('Sign in with Google') }}
            </a>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
