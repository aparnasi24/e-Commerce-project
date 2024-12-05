<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center">
      
        
        <div class="relative">
            <button id="user-menu-button" class="flex items-center text-gray-800 hover:text-gray-600 focus:outline-none" aria-haspopup="true" aria-expanded="true">
                {{ Auth::user()->name }}
                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <div id="user-menu" class="absolute right-0 z-10 mt-2 w-48 bg-white rounded-md shadow-lg hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                <div class="py-1" role="none">
                    <a href="{{ route('logout') }}" method="POST" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Log Out') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        
        <a class="btn btn-green" href="/redirect">
            {{ __('HOME') }}
        </a>
    </div>
</x-slot>

    <style>
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-green {
            background-color: #2ecc71;
            color: white;
        }

        .btn-red {
            background-color: #e74c3c;
            color: white;
        }
    </style>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            {{-- Update Profile Information --}}
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <form method="POST" action="{{ route('user-profile-information.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input id="name" name="name" type="text" value="{{ Auth::user()->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mt-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" value="{{ Auth::user()->email }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-green">Update Profile</button>
                    </div>
                </form>

                <x-jet-section-border />
            @endif

            {{-- Update Password --}}
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <form method="POST" action="{{ route('user-password.update') }}">
                    @csrf

                    <div class="mt-4">
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                        <input id="current_password" name="current_password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mt-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                        <input id="password" name="password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mt-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-green">Update Password</button>
                    </div>
                </form>

                <x-jet-section-border />
            @endif


          
        </div>
    </div>
</x-app-layout>
<script>
    document.getElementById('user-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('user-menu');
        menu.classList.toggle('hidden');
    });

    // Close the menu if clicked outside
    window.addEventListener('click', function(e) {
        if (!document.getElementById('user-menu-button').contains(e.target) && !document.getElementById('user-menu').contains(e.target)) {
            document.getElementById('user-menu').classList.add('hidden');
        }
    });
</script>