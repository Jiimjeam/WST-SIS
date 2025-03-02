<?php


use App\Http\Controllers\adminController\admindashboard;
use App\Http\Controllers\adminController\adminstudentTables;
use App\Http\Controllers\adminController\adminprofiles;
use App\Http\Controllers\adminController\adminsubjects;
use App\Http\Controllers\adminController\adminenrolled;
use App\Http\Controllers\adminController\adminaddgrades;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\studentController\studentdashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;



Route::get('/', [HomeController::class, 'home'])->name('home');


//Student Routes
Route::get('/student/dashboard', [studentdashboard::class, 'indexStudent'])
    ->middleware(['auth' ,'verified'])
    ->name('dashboard');

    Route::get('/tables', function () {
        return view('studentPages.tables');
    })->middleware(['auth', 'verified'])->name('tables');
    
    Route::get('/profiles', function () {
        return view('studentPages.profiles');
    })->middleware(['auth', 'verified'])->name('profiles');    



//Admin Pages Routes
Route::get('/admin/dashboard', [admindashboard::class, 'indexAdmin'])
    ->middleware(['auth', 'verified'])
    ->name('Admin Dashboard');

    Route::get('admin/students', [adminstudentTables::class, 'AstudentTables'])
    ->middleware(['auth', 'verified'])
    ->name('Admin Student Tables');

    Route::get('admin/profiles', [adminprofiles::class, 'Aprofiles'])
    ->middleware(['auth', 'verified'])
    ->name('Admin Profile');

    Route::get('admin/subjects', [adminsubjects::class, 'Asubjects'])
    ->middleware(['auth', 'verified'])
    ->name('Admin Subjects');

    Route::get('admin/enrolled', [adminenrolled::class, 'Aenrolled'])
    ->middleware(['auth', 'verified'])
    ->name('Admin Enrolled Students');

    Route::get('admin/addGrades', [adminaddgrades::class, 'Aaddgrades'])
    ->middleware(['auth', 'verified'])
    ->name('Admin Add Grades');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
