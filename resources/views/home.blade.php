@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Welcome to Employee Management</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-3">Manage Employees</h2>
            <p class="mb-4">Efficiently manage your employee records</p>
            @guest
            <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Login to Get Started
            </a>
            @endguest
            @auth
            <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Enter Dashboard
            </a>
            @endauth
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-3">About Us</h2>
            <p class="mb-4">Learn about our employee management system</p>
            <a href="{{ route('about') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                About Page
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-3">Contact Support</h2>
            <p class="mb-4">Need help? Contact our support team</p>
            <a href="{{ route('contact') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                Contact Us
            </a>
        </div>
    </div>
</div>
@endsection