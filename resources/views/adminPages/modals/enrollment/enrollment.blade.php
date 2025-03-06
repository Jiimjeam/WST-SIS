<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Enrollment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background: #fff;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Add Enrollment</div>
        <div class="p-4">
            <form action="{{ route('enrollment.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    @error('student_id')
                        <div class="text-danger fw-bold">
                            <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
                        </div>
                    @enderror
                    <div class="col-md-6">
                        <label for="student_id" class="form-label fw-semibold">Search Student</label>
                        <select class="form-select select2" id="student_id" name="student_id" required>
                            <option value="">Select a student...</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->id }} - {{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="subject_id" class="form-label fw-semibold">Search Subject</label>
                        <select class="form-select select2" id="subject_id" name="subject_id" required>
                            <option value="">Select a subject...</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->id }} - {{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="enrollment_date" class="form-label fw-semibold">Enrollment Date</label>
                        <input type="date" class="form-control" name="enrollment_date" required>
                    </div>

                    <div class="col-12 text-end">
                        <a href="{{ route('Admin Enrolled Students') }}" class="btn btn-secondary px-4">Back</a>
                        <button type="submit" class="btn btn-success px-4">Enroll</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

</body>
</html>
                   