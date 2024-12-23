<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
</head>
<body style="color: white">
    @include('dashboard.master')

    <div class="content-body" >
        <div class="container-fluid">
            <h2>Edit Student</h2>
        <form action="{{ route('student.update', $Student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group" >
                <label for="cohort_id">Cohort</label>
                <select name="cohort_id" id="cohort_id" class="form-control"  style="color: white; background-color: #2C254A;" required >
                    <option value=""  style="color: white; background-color: #333;">Select a cohort</option>
                    @foreach ($Cohorts as $cohort)
                        <option value="{{ $cohort->id }}"
                            {{ $Student->cohort_id == $cohort->id ? 'selected' : '' }}
                            style="color: white; background-color: #333;">
                            {{ $cohort->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $Student->name }}" required>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $Student->email }}" required>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>


            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" name="job_title" id="job_title" class="form-control" value="{{ $Student->job_title }}" required>
                @error('job_title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
                <label for="company_name">Company Name:</label>
                <input type="text" name="company_name" id="company_name" class="form-control" value="{{ $Student->company_name }}" required>
                @error('company_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group mb-3">
                <label for="picture" class="form-label">Student Picture:</label>
                <input type="file" name="picture" id="picture" class="form-control" accept="image/*">
                @error('picture')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <button type="submit" class="btn btn-success" style="color: white">Update</button>
            <a href="{{ route('students') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
        </div>
    </div>

    @include('dashboard.layout.footer')
</body>
</html>
