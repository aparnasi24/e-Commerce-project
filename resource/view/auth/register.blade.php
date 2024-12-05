<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="/redirect">
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" class="block text-sm font-medium text-gray-700" />
                <x-jet-input id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" class="block text-sm font-medium text-gray-700" />
                <x-jet-input id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500" type="email" name="email" :value="old('email')" required />
            </div>

            <div>
                <x-jet-label for="address" value="{{ __('Address') }}" class="block text-sm font-medium text-gray-700" />
                <x-jet-input id="address" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500" type="text" name="address" :value="old('address')" required />
            </div>

            <div>
                <x-jet-label for="password" value="{{ __('Password') }}" class="block text-sm font-medium text-gray-700" />
                <x-jet-input id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div>
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="block text-sm font-medium text-gray-700" />
                <x-jet-input id="password_confirmation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="flex items-center mt-4">
                    <x-jet-checkbox name="terms" id="terms" required />
                    <label for="terms" class="ml-2 text-sm text-gray-600">
                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-blue-600 hover:text-blue-900">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-blue-600 hover:text-blue-900">'.__('Privacy Policy').'</a>',
                        ]) !!}
                    </label>
                </div>
            @endif

            <div>
                <x-jet-button class="w-full bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <span class="block text-sm text-gray-600 mb-2">
                {{ __('Or') }}
            </span>
            <a href="/auth/redirect" class="inline-flex items-center justify-center w-full px-6 py-3 border border-transparent rounded-md shadow-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                {{ __('Sign up with Google') }}
            </a>
        </div>

        <div class="mt-4 text-center">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
