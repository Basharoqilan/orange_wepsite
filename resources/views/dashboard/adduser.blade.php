<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <!-- Include any CSS for styling -->
</head>
<body style="color: white">
    @include('dashboard.master')

    <div class="content-body" >
        <div class="container-fluid">
            <h2>Add User</h2>
            <form action="{{ route('user.store') }}" method="POST">
                @csrf

                <!-- Name Input -->
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                </div>

                <!-- Email Input -->
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('users') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </div>
            </form>
    </div>
        </div>
    </div>

    @include('dashboard.layout.footer')
</body>
</html>
