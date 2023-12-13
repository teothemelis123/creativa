<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css?v=0.1') }}">

</head>
<body>
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if(session('success'))
                    <div class="dark:bg-green bg-green border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert" style="background-color:green;">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                @if(session('error'))
                    <div class="dark:bg-green bg-green border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert" style="background-color:red;">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
