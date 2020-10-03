@extends('layouts/default')    

@section('title', 'Rejestracja')

@section('content')

{{-- @php

echo '<pre>';
print_r($errors);
echo '</pre>';

@endphp --}}

<div class="wrapper">
    <div class="rte">
        <h1>Rejestracja</h1>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-fieldset">
        <input class="form-field{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Adres e-mail" value="{{ old('email') }}">
        </div>
        <div class="form-fieldset">
            <input class="form-field{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" placeholder="Imię i nazwisko" value="{{ old('name') }}">
        </div>
        <div class="form-fieldset">
            <input class="form-field{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Hasło">
        </div>
        <div class="form-fieldset">
            <input class="form-field" type="password" name="password_confirmation" placeholder="Powtórz hasło">
        </div>
        <button class="button">Wyślij</button>
    </form>
</div>

@endsection


{{-- <x-guest-layout>7
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Name') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Confirm Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
