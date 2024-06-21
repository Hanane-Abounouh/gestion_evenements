<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EvaluationController;


Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/events/myevents', [EventController::class, 'myEvents'])->name('events.myevents')->middleware('auth');
Route::post('/events/{event}/buy-ticket', [EventController::class, 'buyTicket'])->name('events.buy-ticket');
Route::delete('/events/{event}/delete-ticket', [EventController::class, 'deleteTicket'])->name('events.delete-ticket');
// route/web.php
Route::resource('events', EventController::class);
Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('events/create', [EventController::class, 'create'])->name('events.create');

// routes/web.php



// Route pour stocker une évaluation
Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');
Route::post('/evaluations', 'EvaluationController@store')->name('evaluations.store');

Route::delete('/evaluations/{evaluation}', [EvaluationController::class, 'destroy'])->name('evaluations.destroy');
Route::post('/comments/store', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])
    ->name('comments.destroy');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth');
