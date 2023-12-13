@extends('layout')
@section('content')
                    <h3>Companies</h3>
                    <br>
                     <a href="{{ route('companies.create') }}" class="px-4 py-2 mt-4 mb-4 text-white bg-green-500 rounded hover:bg-green-600">Create New Company</a>
                     @if(isset($companies) && $companies->count() > 0)
                   <ul class="mt-4">

                        @foreach($companies as $company)
                            <li class="mb-2">
                                <div class="flex items-center justify-between w-full px-4 py-2 text-left bg-gray-200 dark:bg-gray-700">
                                    <div>
                                        {{ $company->name }}
                                    </div>
                                    <div class="flex">
                                        <a href="{{ route('companies.edit', ['company' => $company->id]) }}" class="ml-2 px-2 py-1 text-xs bg-blue-500 text-white rounded hover:underline">Edit</a>
                                        <a href="{{ route('companies.show', ['company' => $company->id]) }}" class="ml-2 px-2 py-1 text-xs bg-blue-500 text-white rounded hover:underline">Show</a>
                                        <form action="{{ route('companies.destroy', ['company' => $company->id]) }}" method="post" class="ml-2">

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-2 py-1 text-xs bg-red-500 text-white rounded hover:underline">Delete</button>
                </form>
                                        <a href="{{ route('employees.create', ['company' => $company]) }}" class="px-2 py-1 text-xs bg-green-500 text-white rounded hover:underline ml-2">Add Employee</a>

                                        <button
                                            class="w-4 h-4 ml-2 mt-1 transition-transform transform"
                                            onclick="toggleDropdown('{{ $company->id }}')"
                                        >
                                            <svg
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 9l-7 7-7-7"
                                                ></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div
                                    id="dropdown-{{ $company->id }}"
                                    class="hidden mt-2 space-y-2"
                                >
                                    @foreach($company->employees as $employee)
                                        <div class="pl-6 flex">{{ $employee->first_name }} {{ $employee->last_name }} <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="ml-2 px-2 py-1 text-xs bg-yellow-500 text-yellow rounded hover:underline">Edit Employee</a> <a href="{{ route('employees.show', ['employee' => $company->id]) }}" class="ml-2 px-2 py-1 text-xs bg-green-500 text-white rounded hover:underline">Show</a><form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-2 py-1 ml-2 text-xs bg-red-500 text-white rounded hover:underline">Delete Employee</button>
            </form></div>
                            
                                    @endforeach
                                </div>
                            </li>
                        @endforeach
                    </ul>
                {{ $companies->links() }}
                @endif
<script src="{{ asset('js/main.js') }}"></script>
@endsection