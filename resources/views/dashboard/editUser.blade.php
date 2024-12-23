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
            <h2>Edit User</h2>
        <form action="{{ route('user.update', $User->id) }}" method="POST">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $User->name }}" required>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $User->email }}" required>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
                <label for="password">Password (optional):</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <button type="submit" class="btn btn-success" style="color: white">Update</button>
            <a href="{{ route('users') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
        </div>
    </div>

    @include('dashboard.layout.footer')
</body>
</html>
