<?php
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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


// Route::get('/',[HomeController::class, 'index']);

// HALAMAN HOME : home-blade
Route::get('/', function () {
    return view('home',[
        "tittle" => "Home",
        "active" => "Home"
    ]);
});

// HALAMAN ABOUT : about-blade
Route::get('/about', function () {
    return view('about',[
        "tittle" => "About",
        "active" => "About",
        "name" => "Samantha",
        "class" => "Computer Science"
    ]);
});

// HALAMAN POSTS : posts-blade
// Menggunakan Controller : (Controller Halaman Posts)
Route::get('/posts', [PostController::class, 'index'] );

// posts-blade :
// Yang tulisan kuning (category) berasal dari models
Route::get('/categories/{category:slug}', function(Category $category){

    return view('posts',[

        // Data-data berikut dikirim ke views > category.blade.php
        'tittle' => "Post by Category : $category->name ",
        'active' => "Posts",
        'posts' => $category->postx->load('category', 'author'),
        'category' => $category->name
    ]);
});

// posts-blade :
Route::get('/authors/{author:username}', function(User $author) 
{
    // Data2 berikut dikirim ke views > posts.blade.php
    return view('posts',[
        'tittle' => "Post by Author : $author->name",
        'active' => "Posts",
        'posts' => $author->postx->load('category', 'author') 
        // $user->postx berisi relasi dengan tabel lain, berasal dari fungsi dalam model user dengan menghilangkan dalam kurung
    ]);
});

// HALAMAN POST : post-blade
// (Controller Halaman Single Post)
Route::get('posts/{post:slug}', [PostController::class, 'show']);

// HALAMAN CATEGORIES : categories-blade
Route::get('/categories', function(){

    return view('categories', [
        'tittle' => 'Kategori :',
            'active' => 'Categories',
        'categories' => Category::all()
    ]);
});



Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Halaman Dashboard :
Route::get('/dashboard', function() 
{
    return view('dashboard.index');
})->middleware('auth');

// Halaman MY Posts (CRUD->Index) :
// Route::get('/dashboard/posts/index', [DashboardPostController::class, 'index'])->middleware('auth');
// Namun route diatas telah ditangani oleh route resource :

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
