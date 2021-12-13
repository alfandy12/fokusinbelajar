<?php


use App\Models\Category;
use App\Http\Controllers\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountAdminController;
use App\Http\Controllers\ArticleAdminController;
use App\Http\Controllers\SinglecourseController;
use App\Http\Controllers\CategoryAdminController;
use App\Http\Controllers\MulticourseAdminController;
use App\Http\Controllers\MulticourseController;
use App\Http\Controllers\SinglecourseAdminController;

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
// ini route home
Route::get('/', function () {
    return view('home/index');
});

// ini route untuk about ourplatform
Route::get('/ourplatform', function () {
    return view('about/ourplatform');
});

// ini route untuk about founder
Route::get('/founder', function () {
    return view('about/founder');
});

// ini route untuk profile
Route::get('/my-profile', [Profile::class, 'index'])->middleware(['auth']);

// ini route untuk edit profile
Route::get('/edit-profile', [Profile::class, 'edit'])->middleware(['auth']);

// ini route untuk update profile
Route::match(['put', 'patch'], '/update-profile', [Profile::class, 'update'])->middleware(['auth']);

// ini route untuk change password
Route::get('/change-password', [Profile::class, 'changepassword'])->middleware(['auth']);

// ini route untuk update profile
Route::match(['put', 'patch'], '/update-password', [Profile::class, 'updatepassword'])->middleware(['auth']);

// ini route untuk remove profile
Route::get('/remove-profile', [Profile::class, 'requestremove'])->middleware(['auth']);

// ini route untuk remove akun di setujui
Route::get('/remove-profile-accept', [Profile::class, 'remove'])->middleware(['auth']);

// ini route untuk Singlecourse
Route::get('/singlecourse', [SinglecourseController::class, 'index']);

// ini route untuk Singlecourse Detail
Route::get('/singlecourse/{slug}', [SinglecourseController::class, 'show']);

// ini route untuk kategori slug
Route::get('/singlecourse/category/{slug}', [SinglecourseController::class, 'category']);

// ini route untuk multicourse
Route::get('/multicourses', [MulticourseController::class, 'index']);

// ini route untuk multicourse video
Route::get('/multicourses/{slug}/{eps}', [MulticourseController::class, 'video']);

// ini route untuk kategori slug
Route::get('/multicourses/{slug}', [MulticourseController::class, 'category']);

// ini route untuk admin singlecourse
Route::resource('/admin-singlecourse', SinglecourseAdminController::class)->middleware(['auth', 'ceklevel:admin']);

// ini route untuk admin multicourse
Route::resource('/admin-multicourse', MulticourseAdminController::class)->middleware(['auth', 'ceklevel:admin']);

// ini route untuk admin kategori
Route::resource('/admin-category', CategoryAdminController::class)->middleware(['auth', 'ceklevel:admin']);

// ini route untuk admin account
Route::resource('/admin-account', AccountAdminController::class)->middleware(['auth', 'ceklevel:admin']);

// ini route untuk artikel detail
Route::get('/article/{article:slug}', [ArticleController::class, 'show'])->name('show');

// ini route untuk artikel
Route::get('/article', [ArticleController::class, 'index']);

// ini route untuk admin artikel
Route::resource('/admin-article', ArticleAdminController::class)->middleware(['auth', 'ceklevel:admin']);

// route untuk ambil atau check slug /admin-article/checkSlug
Route::get('/admin/article/checkSlug', [ArticleAdminController::class, 'checkSlug'])->middleware(['auth', 'ceklevel:admin']);

// halaman dashboard wajib level admin
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'ceklevel:admin'])->name('dashboard');

require __DIR__ . '/auth.php';
