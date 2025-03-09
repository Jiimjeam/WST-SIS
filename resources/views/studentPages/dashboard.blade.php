@extends('layouts.dashboardlayout')

@section('title', 'Student Dashboard')

@section('dashboard')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<div class="container mt-4">
    <h1 class="text-center mb-4 text-primary">📚 Student Dashboard</h1>

    {{-- Personal Information Section --}}
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body">
            <h4 class="mb-3 text-secondary">👤 Personal Information</h4>
            <div class="row">
                @foreach (['Name' => $student->name, 'Email' => $student->email, 'Address' => $student->address, 'Age' => $student->age] as $label => $value)
                    <div class="col-md-6 mb-2">
                        <strong class="text-dark">{{ $label }}:</strong> <span class="text-muted">{{ $value }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Enrollments & Grades Section --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="mb-3 text-secondary">📖 Enrollments and Grades</h4>
            @if ($enrollments->isEmpty())
                <div class="alert alert-secondary text-center">No enrollments found.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Enrollment Date</th>
                                <th class="text-center">Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enrollments as $enrollment)
                                <tr>
                                    <td class="text-center">{{ $enrollment->subject->name }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($enrollment->enrollment_date)->format('M d, Y') }}</td>
                                    <td class="text-center">
                                        @php
                                            $grade = optional($enrollment->grades->first())->grades;
                                        @endphp
                                        <span class="badge 
                                            @if ($grade === null) bg-secondary
                                            @elseif ($grade >= 90) bg-success
                                            @elseif ($grade >= 75) bg-warning
                                            @else bg-danger
                                            @endif
                                        ">
                                            {{ $grade ?? 'N/A' }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
