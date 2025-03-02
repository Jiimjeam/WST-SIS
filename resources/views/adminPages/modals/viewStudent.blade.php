<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional custom styling */
        body {
            background-color: #f8f9fa;
        }
        .main-content {
            margin-top: 50px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .card-footer {
            background-color: #f1f1f1;
        }
        .page-footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Main Content Section -->
    <div class="container main-content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header text-center">
                        <h3>Student Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <p><strong>ID:</strong> {{ $student->id }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Name:</strong> {{ $student->name }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Email:</strong> {{ $student->email }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Address:</strong> {{ $student->address }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Age:</strong> {{ $student->age }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Created At:</strong> {{ $student->created_at }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Updated At:</strong> {{ $student->updated_at }}</p>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('Admin Student Tables') }}" class="btn btn-primary">Back to Table</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
