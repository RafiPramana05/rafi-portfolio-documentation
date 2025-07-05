<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminMessageController;

Route::get('/home', function () {
    return view('portofolio');
});
Route::get('/',[PortofolioController::class,'index'])->name('portofolio.home');
Route::get('/project',[ProjectController::class,'index'])->name('project.index');

// Contact Form Route
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Projects Management
    Route::prefix('projects')->group(function () {
        Route::get('/', [AdminProjectController::class, 'index'])->name('admin.projects.index');
        Route::get('/create', [AdminProjectController::class, 'create'])->name('admin.projects.create');
        Route::post('/', [AdminProjectController::class, 'store'])->name('admin.projects.store');
        Route::get('/{project}/edit', [AdminProjectController::class, 'edit'])->name('admin.projects.edit');
        Route::put('/{project}', [AdminProjectController::class, 'update'])->name('admin.projects.update');
        Route::delete('/{project}', [AdminProjectController::class, 'destroy'])->name('admin.projects.destroy');
        Route::patch('/{project}/toggle', [AdminProjectController::class, 'toggleStatus'])->name('admin.projects.toggle');
        
        // Trash/Restore routes
        Route::get('/trash', [AdminProjectController::class, 'trash'])->name('admin.projects.trash');
        Route::patch('/restore/{id}', [AdminProjectController::class, 'restore'])->name('admin.projects.restore');
        Route::delete('/force-delete/{id}', [AdminProjectController::class, 'forceDelete'])->name('admin.projects.force-delete');
    });

    // Messages Management
    Route::prefix('messages')->group(function () {
        Route::get('/', [AdminMessageController::class, 'index'])->name('admin.messages.index');
        Route::get('/{contact}', [AdminMessageController::class, 'show'])->name('admin.messages.show');
        Route::delete('/{contact}', [AdminMessageController::class, 'destroy'])->name('admin.messages.destroy');
        Route::post('/{contact}/mark-read', [AdminMessageController::class, 'markAsRead'])->name('admin.messages.mark-read');
        Route::post('/{contact}/mark-unread', [AdminMessageController::class, 'markAsUnread'])->name('admin.messages.mark-unread');
        Route::post('/bulk-action', [AdminMessageController::class, 'bulkAction'])->name('admin.messages.bulk-action');
    });
});

