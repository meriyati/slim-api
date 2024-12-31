<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\AdminController;
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Route untuk halaman edit profile
Route::middleware(['auth'])->group(function () {
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit.profile');
    Route::post('/update-profile', [ProfileController::class, 'update'])->name('update.profile');
});

//upload proposal
Route::get('/submit-proposal', [ProposalController::class, 'store'])->name('submit-proposal.form');
Route::get('/submit-proposal', [ProposalController::class, 'index'])->name('submit-proposal');
Route::post('/submit-proposal', [ProposalController::class, 'store'])->name('submit-proposal.store');
Route::get('/submit-proposal', [ProposalController::class, 'showForm'])->name('submit-proposal.form');

//Navigate Home
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    // Route untuk edit proposal
    Route::get('/edit-proposal/{id}/edit', [ProposalController::class, 'edit'])->name('edit-proposal.edit');
    Route::put('/edit-proposal/{id}', [ProposalController::class, 'update'])->name('edit-proposal.update');
});


Route::middleware(['auth', 'role.redirect'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth');

//dashboard
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::delete('/admin/{id}', [AdminController::class, 'delete'])->name('admin.delete');
Route::get('/admin/{id}/detail', [AdminController::class, 'show'])->name('admin.show');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');

//tambah
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');

//Seting
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/settings', [AdminController::class, 'updateSettings'])->name('admin.updateSettings');

    Route::get('/admin/proposals/{id}/edit', [AdminController::class, 'editProposal'])->name('admin.editProposal');

//edit
    Route::put('/admin/proposals/{id}', [AdminController::class, 'updateProposal'])->name('admin.updateProposal');
    
