@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Employee Details</h1>

    <div class="bg-white rounded shadow p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-xl font-semibold mb-4">Personal Information</h2>
                <div class="space-y-3">
                    <p><span class="font-medium">Name:</span> {{ $employee->first_name }} {{ $employee->last_name }}</p>
                    <p><span class="font-medium">Gender:</span> {{ ucfirst($employee->gender) }}</p>
                    <p><span class="font-medium">Age:</span> {{ \Carbon\Carbon::parse($employee->birthday)->age }} years</p>
                    <p><span class="font-medium">Birthday:</span> {{ $employee->birthday->format('F j, Y') }}</p>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-semibold mb-4">Employment Information</h2>
                <div class="space-y-3">
                    <p><span class="font-medium">Monthly Salary:</span> ₱{{ number_format($employee->monthly_salary, 2) }}</p>
                    <p><span class="font-medium">Created At:</span> {{ $employee->created_at->format('F j, Y g:i a') }}</p>
                    <p><span class="font-medium">Updated At:</span> {{ $employee->updated_at->format('F j, Y g:i a') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex space-x-3">
            <a href="{{ route('employees.edit', $employee->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Edit
            </a>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700" onclick="return confirm('Are you sure?')">
                    Delete
                </button>
            </form>
            <a href="{{ route('employees.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                Back to List
            </a>
        </div>
    </div>
</div>
@endsection