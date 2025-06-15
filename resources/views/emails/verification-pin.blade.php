@extends('layouts.email')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Verification PIN</h1>
    <p class="mb-4">Your verification PIN is:</p>
    <div class="bg-gray-100 p-4 rounded text-center text-2xl font-mono font-bold mb-4">
        {{ $pin }}
    </div>
    <p class="text-sm text-gray-600">This PIN will expire after verification.</p>
</div>
@endsection