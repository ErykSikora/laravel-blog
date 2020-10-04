@extends('layouts/default')    

@section('title', 'Logowanie')

@section('content')

{{-- @php

echo '<pre>';
print_r($errors);
echo '</pre>';

@endphp --}}

<div class="wrapper">
    <div class="rte">
        <h1>Logowanie</h1>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-fieldset">
            <input class="form-field{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Your e-mail" value={{ old('email') }}>
        </div>
        <div class="form-fieldset">
            <input class="form-field{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password">
        </div>
        <button class="button">Zaloguj się</button>
    </form>

    <div class="rte mt">
        <p>Nie masz konta? <a href="{{ route('register') }}">Zarejestruj się.</a><br>Zapomniałeś hasła? <a href="{{ route('password.request') }}">Zresetuj.</a></p>
    </div>
</div>

@endsection


{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
