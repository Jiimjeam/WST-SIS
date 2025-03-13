@extends('layouts.Adminlayout')

@section('title', 'Admin Dashboard')

@section('Admindashboard')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  $(document).ready(function () {
    $('#myDataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "pageLength": 25,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('grades.index') }}" method="GET" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <label for="subject_id" class="form-label fw-semibold">Filter by Subject:</label>
                        <select name="subject_id" id="subject_id" class="form-select" onchange="this.form.submit()">
                            <option value="">All Subjects</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ $selectedSubject == $subject->id ? 'selected' : '' }}>
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table id="myDataTable" class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Student</th>
                            <th>Subject</th>
                            <th>Grade</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $enrollment->student->name }}</td>
                                <td>{{ $enrollment->subject->name }}</td>
                                <td>
                                    <span class="badge {{ $enrollment->grades->isNotEmpty() ? ($enrollment->grades->first()->grades >= 3.0 ? 'bg-success' : 'bg-danger') : 'bg-secondary' }}">
                                        {{ $enrollment->grades->isNotEmpty() ? $enrollment->grades->first()->grades : 'N/A' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editGradeModal{{ $enrollment->id }}">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </button>

                                    @if ($enrollment->grades->isNotEmpty())
                                    <form action="{{ route('grades.destroy', $enrollment->grades->first()->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this grade?');">
                                            <i class="bi bi-trash"></i> Remove
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>

                            <!-- Edit Grade Modal -->
                            <div class="modal fade" id="editGradeModal{{ $enrollment->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning text-dark">
                                            <h5 class="modal-title">Edit Grade for {{ $enrollment->student->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{ route('grades.update', $enrollment->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-body">
                                                <label for="grades" class="form-label">Grade</label>
                                                @error('grade')
                                                    <div class="text-danger fw-bold">
                                                        <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                                <select name="grades" id="grades" class="form-select">
                                                    @foreach ([1.0, 1.25, 1.5, 1.75, 2.0, 2.25, 2.5, 2.75, 3.0, 3.25, 3.5, 3.75, 4.0, 4.25, 4.5, 4.75, 5.0] as $grade)
                                                        <option value="{{ $grade }}" {{ $enrollment->grades->isNotEmpty() && $enrollment->grades->first()->grades == $grade ? 'selected' : '' }}>
                                                            {{ $grade }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>

@endsection
