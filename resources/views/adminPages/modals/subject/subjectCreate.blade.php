<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
            padding: 20px;
        }

        .modal-dialog {
            max-width: 500px; /* Makes the modal wider */
            margin: auto; /* Center the modal */
        }

        .modal-content {
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            padding: 20px;
            text-align: center;
        }

        .modal-title {
            font-size: 20px;
            font-weight: bold;
        }

        .modal-body {
            padding: 25px;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 6px;
            color: #333;
        }

        .form-control {
            height: 45px;
            font-size: 16px;
            border-radius: 8px;
            padding: 10px;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        }

        .modal-footer {
            padding: 20px;
            justify-content: space-between;
            border-top: none;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px 18px;
            font-size: 16px;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            border-radius: 8px;
            padding: 12px 18px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="container-fluid py-4">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createStudentModalLabel">Add Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subject.store')}}" method="POST"> 
                    @csrf
                    @method('POST')

                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="" required>
                    </div>

                
                    <div class="mb-4">
                        @error('code')
                            <div class="text-danger fw-bold">
                                <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
                            </div>
                        @enderror
                        <label for="code" class="form-label">Code</label>
                        <input type="text" class="form-control" name="code" id="code" value="" required>
                    </div>
                

                    <div class="mb-4">
                        <label for="units" class="form-label">Units</label>
                        <input type="number" class="form-control" name="units" id="units" value="" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="redirectToTable()">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    function redirectToTable() {
        window.location.href = "{{ route('Admin Subjects') }}"; 
    }
</script>
</body>
</html>
