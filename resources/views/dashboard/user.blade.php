<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    @extends('dashboard.master')

    <div class="content-body" >
        <div class="container-fluid">
            <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
                <h2 class="font-w600 mb-2 mr-auto">Users</h2>

                <a href="{{ route('user.create') }}" class="btn btn-success" style="color: white">
                    <i class="fa fa-plus"></i> Add User
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" style="color: white">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Users as $User)
                            <tr>
                                <td>{{ $User->id }}</td>
                                <td>{{ $User->name }}</td>
                                <td>{{ $User->email }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $User->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('user.delete', $User->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('dashboard.layout.footer')
</body>
</html>
