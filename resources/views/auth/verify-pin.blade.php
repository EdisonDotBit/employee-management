@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
    <h1 class="text-2xl font-bold mb-6">Verify Your Email</h1>

    @if (session('status'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('status') }}
    </div>
    @endif

    @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    <form method="POST" action="{{ route('verify.pin.submit') }}">
        @csrf
        <input type="hidden" name="email" value="{{ session('email') ?? old('email') }}">

        <div class="mb-4">
            <label for="pin" class="block text-gray-700 mb-2">6-digit Verification Code</label>
            <input type="text"
                name="pin"
                id="pin"
                class="w-full px-3 py-2 border rounded @error('pin') border-red-500 @enderror"
                required
                maxlength="6"
                pattern="\d{6}"
                placeholder="Enter code from email">
            @error('pin')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 mb-4">
            Verify Account
        </button>
    </form>

    <form method="POST" action="{{ route('resend.pin') }}">
        @csrf
        <input type="hidden" name="email" value="{{ session('email') ?? old('email') }}">
        <button type="submit" class="text-blue-600 hover:underline">
            Didn't receive a code? Resend
        </button>
    </form>
</div>
@endsection