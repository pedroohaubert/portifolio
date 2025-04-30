<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TopicController;

Route::get('/', function (){
    return view('home');
});

// Rotas para Posts
Route::prefix('posts')->group(function () {
    Route::get('/admin', [PostController::class, 'admin'])->name('posts.admin');
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/', [PostController::class, 'store'])->name('posts.store');
    Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

// Rotas para Categorias
Route::prefix('categories')->group(function () {
    Route::get('/admin', [CategoryController::class, 'admin'])->name('categories.admin');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// Rotas para Projetos
Route::prefix('projects')->group(function () {
    Route::get('/admin', [ProjectController::class, 'admin'])->name('projects.admin');
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});

// Rotas para Tópicos
Route::prefix('topics')->group(function () {
    Route::get('/admin', [TopicController::class, 'admin'])->name('topics.admin');
    Route::get('/create', [TopicController::class, 'create'])->name('topics.create');
    Route::post('/', [TopicController::class, 'store'])->name('topics.store');
    Route::get('/{topic}', [TopicController::class, 'show'])->name('topics.show');
    Route::get('/{topic}/edit', [TopicController::class, 'edit'])->name('topics.edit');
    Route::put('/{topic}', [TopicController::class, 'update'])->name('topics.update');
    Route::delete('/{topic}', [TopicController::class, 'destroy'])->name('topics.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

