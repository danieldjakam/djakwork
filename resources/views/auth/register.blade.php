@extends('layouts.app')

@section('content')
<h1 class="text-3xl text-green-500 mb-6 text-center">{{ __('register.title') }}</h1>
<form method="POST" action="{{ route('register') }}" class="w-full max-w-sm mx-auto rounded-lg border shadow-md p-5 mb-5">
    @csrf
    <div class="mb-4">
        <label for="name" class="block font-semibold text-gray-700 mb-2">{{ __('register.username') }}</label>
        <input id="name" type="text" name="name" class="shadow border rounded w-full p-2" value="{{ old('name') }}" autocomplete="name" placeholder="{{ __('register.username') }}" autofocus>
       @error('name')
              <span class="text-red-400 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="email" class="block font-semibold text-gray-700 mb-2">{{ __('register.email') }}</label>
        <input id="email" type="email" name="email" class="shadow border rounded w-full p-2" value="{{ old('email') }}" autocomplete="email" placeholder="{{ __('register.email') }}" autofocus>
        @error('email')
            <span class="text-red-400 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="block font-semibold text-gray-700 mb-2">{{ __('register.password') }}</label>
        <input id="password" type="password" name="password" class="shadow border rounded w-full p-2" value="{{ old('password') }}" autocomplete="password" placeholder="{{ __('register.password') }}" autofocus>
        @error('password')
            <span class="text-red-400 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="block font-semibold text-gray-700 mb-2">{{ __('register.confirm') }}</label>
        <input id="password_confirmation" type="password" name="password_confirmation" class="shadow border rounded w-full p-2" value="{{ old('password_confirmation') }}" autocomplete="password_confirmation" placeholder="{{ __('register.confirm') }}" autofocus>
    </div>

    <p for="role-select" class="font-semibold text-gray-700">{{ __('register.i want to be') }}</p>
    <div class="flex justify-between items-center">
        <label for="freelance">{{ __('register.freelance') }}
            <input type="radio" value="1" id="freelance" name="role_id">
            <span class="checkmark"></span>
        </label>
        <label for="client">{{ __('register.client') }}
            <input type="radio" value="2" id="client" name="role_id">
            <span class="checkmark"></span>
        </label>
    </div>
    @error('role_id')
        <span class="text-red-400 text-sm block">{{ $message }}</span>
    @enderror

    <button type="submit" class="bg-green-500 text-white hover:bg-green-700 transition ease-in-out duration-500 rounded-md shadow-md w-full block px-4 py-2 mt-3">{{ __('register.register') }}</button>
</form>
@endsection
