<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/w', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/', function () {
    $posts = PostResource::collection(Post::latest()->paginate(10));
    return Inertia::render('Dashboard', compact("posts"));
})->name('dashboard');

// About
Route::get("/about", function () {
    return Inertia::render("About");
})->name("about");

// Products
Route::get("/products", function () {
    return Inertia::render("Products");
})->name("products");

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Post 
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    Route::delete('/posts/destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});
Route::get('/posts', [PostController::class, 'index'])->name('post.index');

require __DIR__ . '/auth.php';
