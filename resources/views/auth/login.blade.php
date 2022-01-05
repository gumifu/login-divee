<x-guest-layout>
    <x-auth-card class="mb-4">
        <x-slot name="logo">
            <a href="/">
                <x-login-logo class="" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }} " class="mb-4">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
            <hr class="my-3">
            <div class="w-fit mx-auto">
                <x-button class="w-60 mx-auto flex">
                        <a href="{{ route('register') }}" class="mx-auto text-sm text-white-700 dark:text-gray-500">新規登録</a>
                </x-button>
            </div>
            <!-- <p>SNS ログイン</p> -->
            <div class="w-fit flex flex-col justify-center mx-auto ">
                <a href="/login/google" class="text-center w-60 mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-auto ">
                    <i class="fab fa-google fa-fw "></i> Googleでログイン
                    <!-- <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" > -->
                </a>
                <a href="/login/facebook" class="text-center  w-60 mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fab fa-facebook fa-fw"></i> Facebookでログイン
                    <!-- <img src="https://scontent.ffuk3-1.fna.fbcdn.net/v/t39.2365-6/17639236_1785253958471956_282550797298827264_n.png?_nc_cat=105&ccb=1-5&_nc_sid=ad8a9d&_nc_ohc=XVExvw7XAO0AX9N3Tum&_nc_ht=scontent.ffuk3-1.fna&oh=00_AT98HTNjJUzbSdHsoO5XIZSxDOPP9zaLB-70m_aZcVSMWA&oe=61D64496" > -->
                </a>
                <a href="/login/github" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fab fa-github fa-fw"></i>Github
                </a>
            </div>



        </form>

        <!-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a> -->
    </x-auth-card>

</x-guest-layout>
