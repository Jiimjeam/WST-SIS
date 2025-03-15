<?php

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\studentController\studentdashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', [HomeController::class, 'home'])->name('home');

//Admin Pages Routes
Route::middleware(['auth', 'verified', 'can:is-admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [StudentPageController::class, 'adminDashboard'])->name('Admin Dashboard');
    Route::get('/student', [StudentPageController::class, 'adminStudentTable'])->name('Admin Student Tables');
    Route::get('/subjects', [SubjectController::class, 'adminSubject'])->name('Admin Subjects');
    Route::get('/profiles', [StudentPageController::class, 'adminProfile'])->name('Admin Profile');
    Route::get('/enrolled', [EnrollmentController::class, 'index'])->name('Admin Enrolled Students');
    Route::get('/addGrades', [GradeController::class, 'index'])->name('Admin Add Grades');
    Route::resource('students', StudentController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('enrollment', EnrollmentController::class);
    Route::resource('grades', GradeController::class);
    
}); 

Route::get('/student/dashboard', [studentdashboard::class, 'indexStudent'])
    ->middleware(['auth:student', 'auth' ,'verified'])
    ->name('dashboard');
    
    Route::get('/student/profiles', function () {
        return view('studentPages.profiles');})
        ->middleware(['auth:student', 'auth' ,'verified'])->name('profiles');    

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
