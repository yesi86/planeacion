<x-guest-layout>
    <div class="text-center mb-6">
        <!-- Logo con esquinas redondeadas y más grande -->
        <img src="{{ asset('images/LogoITSX.png') }}" alt="Logo" class="mx-auto mb-4 w-40 h-40 object-contain rounded-full -mt-24">
        <h2 class="text-2xl font-semibold text-black dark:text-black">Inicio de Sesión</h2>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo:')" class="text-sm font-bold text-gray-600 dark:text-gray-600"/>
            <x-text-input 
                id="email" 
                class="block mt-1 w-full text-black dark:text-red" 
                style="background-color: #024A86; color: white; border-radius: 1rem;"  
                type="email" 
                name="email" 
                :value="old('email')" 
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Contraseña:')" class="text-sm font-bold text-gray-600 dark:text-gray-600"/>
            <x-text-input 
                id="password" 
                class="block mt-1 w-full text-black dark:text-black" 
                style="background-color: #024A86; color: white; border-radius: 1rem;"
                type="password" 
                name="password" 
                required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-between mt-4">
            <div class="flex items-center">
                <!-- Recuerdame -->
                <div class="flex items-center mr-4">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <label for="remember_me" class="ml-2 text-sm font-bold text-gray-600 dark:text-gray-400">{{ __('Recuérdame') }}</label>
                </div>
            </div>

            <!-- Botón "Iniciar" con hover y estilo Tailwind -->
            <div class="flex items-center">
                <x-primary-button 
                    class="bg-[#b7b1af] text-white rounded-xl w-[230px] py-1.5 px-12 transition-colors duration-300 hover:bg-[#58585b]">
                    {{ __('Iniciar') }}
                </x-primary-button>
            </div>
            
        </div>
    </form>
</x-guest-layout>
