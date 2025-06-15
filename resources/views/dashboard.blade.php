@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Welcome, {{ Auth::user()->name }}!</h2>

<p class="mb-6">Here are some quick actions:</p>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <a href="{{ route('employees.index') }}" class="bg-blue-600 text-white p-4 rounded shadow hover:bg-blue-700">
        View Employees
    </a>
    <a href="{{ route('employees.create') }}" class="bg-red-600 text-white p-4 rounded shadow hover:bg-red-700">
        Add New Employee
    </a>
    <a href="{{ route('employees.summary') }}" class="bg-gray-600 text-white p-4 rounded shadow hover:bg-gray-700">
        View Summary
    </a>
</div>
@endsection