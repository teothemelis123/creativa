
@extends('layout')
     @section('content')
    <div class="container">
        <h2>Edit Employee</h2>

        <form action="{{ route('employees.update', $employee->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $employee->first_name }}" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $employee->last_name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}">
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $employee->phone }}">
            </div>

            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary">Update Employee</button>
        </form>
    </div>
@endsection
          

