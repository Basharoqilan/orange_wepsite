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
            <h2>Add Student</h2>
            <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Name Input -->
                <div class="form-group mb-3">
                    <label for="cohort_id" class="form-label">Cohort:</label>
                    <select name="cohort_id" id="cohort_id" class="form-control" style="color: white; background-color: #2C254A;" required>
                        <option value=""  style="color: white; background-color: #333;">Select a cohort</option>
                        @foreach ($Cohorts as $cohort)
                            <option value="{{ $cohort->id }}"
                                {{ old('cohort_id') == $cohort->id ? 'selected' : '' }}>
                                {{ $cohort->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Email Input -->
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="name" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                     @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                </div>


                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                     @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                </div>


                <div class="form-group mb-3">
                    <label for="job_title" class="form-label">Job Title:</label>
                    <input type="text" name="job_title" id="job_title" class="form-control" value="{{ old('job_title') }}" required>
                     @error('job_title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                </div>


                <div class="form-group mb-3">
                    <label for="company_name" class="form-label">Company Name:</label>
                    <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name') }}" required>
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


                <div class="d-flex justify-content-between">
                    <a href="{{ route('students') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Add Student</button>
                </div>
            </form>
    </div>
        </div>
    </div>

    @include('dashboard.layout.footer')
</body>
</html>
