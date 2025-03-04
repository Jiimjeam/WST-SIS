<?php

use App\Models\Student;
use App\Models\User;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\studentController\studentdashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', [HomeController::class, 'home'])->name('home');


//Admin Pages Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'adminDashboard'])->name('Admin Dashboard');
    Route::get('/students', [StudentController::class, 'getAllStudents'])->name('Admin Student Tables');
    Route::get('/subjects', [StudentController::class, 'adminSubjects'])->name('Admin Subjects');
    Route::get('/profiles', [StudentController::class, 'adminProfile'])->name('Admin Profile');
    Route::get('/enrolled', [StudentController::class, 'adminEnrolledStudents'])->name('Admin Enrolled Students');
    Route::get('/addGrades', [StudentController::class, 'adminAddgrades'])->name('Admin Add Grades');
    
    Route::get('/{student}', [StudentController::class, 'show'])->name('student.show');
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::patch('/{student}', [StudentController::class, 'update'])->name('student.update');
}); 



//Student Pages Routes
Route::get('/student/dashboard', [studentdashboard::class, 'indexStudent'])
    ->middleware(['auth' ,'verified'])
    ->name('dashboard');

    Route::get('/tables', function () {
        return view('studentPages.tables');
    })->middleware(['auth', 'verified'])->name('tables');
    
    Route::get('/profiles', function () {
        return view('studentPages.profiles');
    })->middleware(['auth', 'verified'])->name('profiles');    


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
