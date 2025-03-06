<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Details</title>
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
                        <h3>Subject Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <p><strong>ID:</strong> {{ $subject->id }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Name:</strong> {{ $subject->name }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Subject Code:</strong> {{ $subject->code }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong># of Units:</strong> {{ $subject->units }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Created At:</strong> {{ $subject->created_at }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Updated At:</strong> {{ $subject->updated_at }}</p>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('Admin Subjects') }}" class="btn btn-primary">Back to Table</a>
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
