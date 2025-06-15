@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Employees</h1>
        <a href="{{ route('employees.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Add Employee
        </a>
    </div>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salary</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($employees as $employee)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ ucfirst($employee->gender) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ \Carbon\Carbon::parse($employee->birthday)->age }} years
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        ₱{{ number_format($employee->monthly_salary, 2) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('employees.show', $employee->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="text-gray-600 hover:text-gray-900 mr-3">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection