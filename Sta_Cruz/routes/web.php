<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
// Show the user registration form
Route::get('/user/create', [LoginController::class, 'showCreateUserForm'])->name('user.create');

// Handle the user creation form submission
Route::post( '/user/create', [LoginController::class, 'createUser'])->name('user.store');


// Optional: Route for handling logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view(view: 'login.login');
});


// Optionally, you can add a dashboard route or a protected route for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [StudentController::class, 'adminDashboard'])->name('admin.dashboard');

    // Student Routes
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});

Route::middleware(['auth'])->get('/student/dashboard', [StudentController::class, 'studentDashboard'])->name('student.dashboard');





