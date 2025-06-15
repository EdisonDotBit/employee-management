@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Employee Summary</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Gender Distribution</h2>
            <div class="space-y-2">
                <p>Male: {{ $maleCount }}</p>
                <p>Female: {{ $femaleCount }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Average Age</h2>
            <p>{{ number_format($averageAge, 1) }} years</p>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Total Monthly Salary</h2>
            <p>₱{{ number_format($totalSalary, 2) }}</p>
        </div>
    </div>

    <a href="{{ route('employees.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Back to Employees
    </a>
</div>
@endsection