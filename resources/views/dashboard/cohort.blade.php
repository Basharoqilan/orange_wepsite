<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cohorts</title>
    <style>
        select, option {
            color: white;
            background-color: #333;
        }
    </style>
</head>
<body>
    @extends('dashboard.master')

    <div class="content-body" >
        <div class="container-fluid">
            <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
                <h2 class="font-w600 mb-2 mr-auto">Cohorts</h2>

                <a href="{{ route('cohort.create') }}" class="btn btn-success" style="color: white">
                    <i class="fa fa-plus"></i> Add Cohort
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" style="color: white">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Academy</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cohorts as $cohort)
                            <tr>
                                <td>{{ $cohort->id }}</td>
                                <td>{{ $cohort->name }}</td>
                                <td>{{ $cohort->academy->name }}</td>
                                <td>
                                    <a href="{{ route('cohort.edit', $cohort->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('cohort.delete', $cohort->id) }}" method="POST" style="display:inline-block;">
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
