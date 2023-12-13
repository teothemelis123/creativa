@extends('layout')
@section('content')
    <h2>Create Employee</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

   <form action="{{ route('employees.store', ['company' => $company->id]) }}" method="post">
        @csrf

        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
        </div>

           Company: {{$company->name }}
           <input type="hidden" name="company_id" value="{{ $company->id }}">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create Employee</button>
    </form>

@endsection