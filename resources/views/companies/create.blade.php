        @extends('layout')
        @section('content')
         <div class="container">
        <h2>Create Company</h2>


        <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Company Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="logo">Logo (minimum 100x100):</label>
                <input type="file" name="logo" id="logo" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" name="website" id="website" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create Company</button>
        </form>
    </div>
    @endsection