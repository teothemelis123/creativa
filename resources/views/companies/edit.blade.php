
@extends('layout')
     @section('content')
                    <h2>Edit Company</h2>

                    
                    <form action="{{ route('companies.update', $company->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Company Name:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}">
                        </div>

                        <div class="form-group">
                            <label for="logo">Logo (minimum 100x100):</label>
                            <input type="file" name="logo" id="logo" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="website">Website:</label>
                            <input type="text" name="website" id="website" class="form-control" value="{{ $company->website }}">
                        </div>

                        <button type="submit" class="btn btn-secondary">Update Company</button>
                    </form>
                @endsection
          

