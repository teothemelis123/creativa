@extends('layout')
@section('content')
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Details') }}
        </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">{{ $company->name }}</h3>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p><strong>Email:</strong> {{ $company->email ?? 'N/A' }}</p>
                            <p><strong>Website:</strong> {{ $company->website ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <p><strong>Logo:</strong></p>
                            @if ($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" class="max-w-full h-auto">
                            @else
                                <p>No logo available</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
