<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Enrollment</title>
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
            background-color: #007bff; /* Blue color for header */
            color: white;
            padding: 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
            font-weight: bold;
            position: relative; /* To position the close button absolutely */
        }
        .btn-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        .form-label {
            font-weight: 600;
        }
        .form-control, .form-select {
            border-radius: 5px;
        }
        .btn-warning {
            background-color: #ffc107; /* Yellow color for button */
            color: white;
            font-weight: bold;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            Edit Enrollment
            <button type="button" class="btn-close" onclick="window.history.back();"></button>
        </div>
        <div class="p-4">
            <form action="{{ route('enrollment.update', $enrollment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit_id">

                <div class="row g-3">
                    @error('student_id')
                        <div class="text-danger fw-bold">
                            <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
                        </div>
                    @enderror
                    <div class="col-md-6">
                        <label for="student_id" class="form-label">Search Student</label>
                        <select class="form-select select2" id="student_id" name="student_id" required>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" {{ old('student_id', $enrollment->student_id) == $student->id ? 'selected' : '' }}>
                                    {{ $student->id }} - {{ $student->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="subject_id" class="form-label">Search Subject</label>
                        <select class="form-select select2" id="subject_id" name="subject_id" required>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ old('subject_id', $enrollment->subject_id) == $subject->id ? 'selected' : '' }}>
                                    {{ $subject->id }} - {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="enrollment_date" class="form-label">Enrollment Date</label>
                        <input type="date" class="form-control" name="enrollment_date" value="{{ old('enrollment_date', $enrollment->enrollment_date) }}" required>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success px-4">Update Enrollment</button>
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
