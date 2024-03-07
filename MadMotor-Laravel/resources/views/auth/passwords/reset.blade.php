@extends('main')

@section('content')
        <div class="min-h-screen bg-gray-100 flex items-center justify-center">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-md w-full">
                <h1 class="text-center text-2xl font-bold mb-6">{{ __('Reset Password') }}</h1>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="email">
                            {{ __('Email Address') }}
                        </label>
                        <input   class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email de tu cuenta" />
                        @error('email')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="password">
                            {{ __('Password') }}
                        </label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password" placeholder="**********" />
                        @error('password')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="password-confirm">
                            {{ __('Confirm Password') }}
                        </label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="**********" />
                    </div>

                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>

                @if (session('status'))
                    <div class="mt-4 alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    @endsection
