<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
{{--@extends('auth.layouts.master')--}}

{{--@section('title', 'Autorizacija')--}}

{{--@section('content')--}}
{{--    <div class="col-md-8">--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">Autorizacija</div>--}}

{{--            <div class="card-body">--}}
{{--    <form method="POST" action="{{ route('login') }}" aria-label="Login">--}}
{{--        @csrf--}}
{{--        <div class="form-group row">--}}
{{--            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail</label>--}}

{{--            <div class="col-md-6">--}}
{{--                <input id="email" type="email" class="form-control"--}}
{{--                       name="email" value="" required autofocus>--}}

{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="form-group row">--}}
{{--            <label for="password" class="col-md-4 col-form-label text-md-right">Slaptazodis</label>--}}

{{--            <div class="col-md-6">--}}
{{--                <input id="password" type="password" class="form-control"--}}
{{--                       name="password" required>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="form-group row mb-0">--}}
{{--            <div class="col-md-8 offset-md-4">--}}
{{--                <button type="submit" class="btn btn-primary">--}}
{{--                    Ieiti--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--    </div></div></div>--}}
{{--@endsection--}}
