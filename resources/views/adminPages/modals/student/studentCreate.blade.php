<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Form Styling */
        .form-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            max-width: 600px;
        }

        .form-container h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .form-label {
            font-size: 16px;
            color: #333;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            border: 1px solid #ccc;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
        }

        .text-danger {
            font-size: 14px;
            color: red;
            margin-top: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-size: 16px;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            font-size: 16px;
            padding: 10px 20px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
                width: 90%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Create Student</h2>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            @method('POST')

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                @error('email')
                    <div class="text-danger fw-bold">
                        <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
                    </div>
                @enderror
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="" required>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="" required>
            </div>

            <!-- Age -->
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" name="age" id="age" value="" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" value="" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('Admin Student Tables') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
