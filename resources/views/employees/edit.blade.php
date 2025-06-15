@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Edit Employee</h1>

    <form method="POST" action="{{ route('employees.update', $employee->id) }}" class="max-w-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="first_name" class="block text-gray-700 mb-2">First Name</label>
            <input type="text" name="first_name" id="first_name" class="w-full px-3 py-2 border rounded" value="{{ $employee->first_name }}" required>
            @error('first_name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="last_name" class="block text-gray-700 mb-2">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="w-full px-3 py-2 border rounded" value="{{ $employee->last_name }}" required>
            @error('last_name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="gender" class="block text-gray-700 mb-2">Gender</label>
            <select name="gender" id="gender" class="w-full px-3 py-2 border rounded" required>
                <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $employee->gender == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('gender')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="birthday" class="block text-gray-700 mb-2">Birthday</label>
            <input type="date" name="birthday" id="birthday" class="w-full px-3 py-2 border rounded" value="{{ $employee->birthday->format('Y-m-d') }}" required>
            @error('birthday')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="monthly_salary" class="block text-gray-700 mb-2">Monthly Salary</label>
            <input type="number" step="0.01" name="monthly_salary" id="monthly_salary" class="w-full px-3 py-2 border rounded" value="{{ $employee->monthly_salary }}" required>
            @error('monthly_salary')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update Employee
        </button>
    </form>
</div>
@endsection