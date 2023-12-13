@extends('layout')
@section('content')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employee Details') }}
        </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
                    
                    <div>
                        <p><strong>Email:</strong> {{ $employee->email ?? 'N/A' }}</p>
                        <p><strong>Phone:</strong> {{ $employee->phone ?? 'N/A' }}</p>
                        <!-- Display other employee details here -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection
