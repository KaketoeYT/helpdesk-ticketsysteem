<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Settings;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TicketAssignmentController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::put('settings/profile', [Settings\ProfileController::class, 'update'])->name('settings.profile.update');
    Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])->name('settings.profile.destroy');
    Route::get('settings/password', [Settings\PasswordController::class, 'edit'])->name('settings.password.edit');
    Route::put('settings/password', [Settings\PasswordController::class, 'update'])->name('settings.password.update');
    Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])->name('settings.appearance.edit');
});

// admin routes
Route::middleware(['auth', 'admin:admin'])->group(function () {

    // Routes voor users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Routes voor categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Routes voor status
    Route::get('/statuses', [StatusController::class, 'index'])->name('statuses.index');
    Route::get('/statuses/create', [StatusController::class, 'create'])->name('statuses.create');
    Route::post('/statuses', [StatusController::class, 'store'])->name('statuses.store');
    Route::get('/statuses/{status}/edit', [StatusController::class, 'edit'])->name('statuses.edit');
    Route::put('/statuses/{status}', [StatusController::class, 'update'])->name('statuses.update');
    Route::delete('/statuses/{status}', [StatusController::class, 'destroy'])->name('statuses.destroy');

    // Routes voor locaties
    Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
    Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
    Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
    Route::get('/locations/{location}/edit', [LocationController::class, 'edit'])->name('locations.edit');
    Route::put('/locations/{location}', [LocationController::class, 'update'])->name('locations.update');
    Route::delete('/locations/{location}', [LocationController::class, 'destroy'])->name('locations.destroy');

    // Routes voor Priorities
    Route::get('/priorities', [PriorityController::class, 'index'])->name('priorities.index');
    Route::get('/priorities/create', [PriorityController::class, 'create'])->name('priorities.create');
    Route::post('/priorities', [PriorityController::class, 'store'])->name('priorities.store');
    Route::get('/priorities/{priority}/edit', [PriorityController::class, 'edit'])->name('priorities.edit');
    Route::put('/priorities/{priority}', [PriorityController::class, 'update'])->name('priorities.update');
    Route::delete('/priorities/{priority}', [PriorityController::class, 'destroy'])->name('priorities.destroy');

    // Routes voor ticket assignmentss
    Route::get('/ticket_assignment', [TicketAssignmentController::class, 'index'])->name('ticket_assignments.index');
    Route::get('/ticket_assignment/create', [TicketAssignmentController::class, 'create'])->name('ticket_assignments.create');
    Route::post('/ticket_assignment', [TicketAssignmentController::class, 'store'])->name('ticket_assignments.store');
    Route::get('/ticket_assignment/{ticketAssignment}/edit', [TicketAssignmentController::class, 'edit'])->name('ticket_assignments.edit');
    Route::put('/ticket_assignment/{ticketAssignment}', [TicketAssignmentController::class, 'update'])->name('ticket_assignments.update');
    Route::delete('/ticket_assignment/{ticketAssignment}', [TicketAssignmentController::class, 'destroy'])->name('ticket_assignments.destroy');
    });
    


// User routes
Route::get('/userdashboard', [UserDashboardController::class, 'index'])->name('userdashboard.index');
Route::get('/userdashboard/create', [UserDashboardController::class, 'create'])->name('userdashboard.create');
Route::post('/userdashboard', [UserDashboardController::class, 'store'])->name('userdashboard.store');

// Routes voor Tickets
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
Route::delete('/tickets/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');


require __DIR__ . '/auth.php';
