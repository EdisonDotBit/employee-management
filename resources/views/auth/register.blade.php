@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
    <h1 class="text-2xl font-bold mb-6">Register</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 mb-2">Full Name</label>
            <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded" required autofocus>
            @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email</label>
            <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded" required>
            @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 mb-2">Password</label>
            <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded" required>
            @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 mb-2">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-3 py-2 border rounded" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
            Register
        </button>
    </form>

    <div class="mt-4 text-center">
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Already have an account? Login</a>
    </div>
</div>
@endsection