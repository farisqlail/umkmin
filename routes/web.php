<?php


use App\Models\ProdukUmkm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\Api\ProdukUmkmController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */

// Route::get('/', function () {
//     return view('home');
// });


// Route::get('/', function () {
//     return view('home', [
//         "title" => "Home",
//         "active" => ""  
//     ]);
// });


// Route::get('/companies', function () {
//     return view('layouts.company.index', [
//         "title" => "Home",
//         "active" => "home"
//     ]);
// });

// Route::get('/company-profile', function () {
//     return view('layouts.company.profile', [
//         "title" => "Company Profile",
//         "active" => "home"
//     ]);
// });


Route::get('/company-catalogs', function () {
    return view('layouts.company.catalogs', [
        "title" => "Company Catalogs",
        "active" => "home"
    ]);
});

Route::get('/company-catalog-1', function () {
    return view('layouts.company.catalog', [
        "title" => "Company Catalog",
        "active" => "home"
    ]);
});

Route::get('/company-appointment', function () {
    return view('layouts.company.appointment', [
        "title" => "Appointment",
        "active" => "home"
    ]);
});


// Route::get('/products', function () {
//     return view('layouts.company.product', [
//         "title" => "Product",
//         "active" => "home"
//     ]);
// });

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "home"
    ]);
});




Route::controller(GeneralController::class)->group(function () {
    Route::get('/login', 'indexlogin')->name('login');
    Route::post('/login', 'login')->name('auth.login');
    Route::get('/register', 'indexregister')->name('register');
    Route::post('/register', 'simpanregister')->name('register.simpan');
    Route::get('/forgot', 'indexforgot')->name('forgot');
    Route::post('/forgot', 'simpanforgot')->name('forgot.simpan');
    Route::get('/otp', 'indexotp')->name('otp');
    Route::post('/otp', 'simpanotp')->name('otp.simpan');
    Route::get('/sandi', 'indexsandi')->name('sandi');
    Route::post('/sandi', 'simpansandi')->name('sandi.simpan');
});

Route::controller(UserAuthController::class)->group(function () {
    Route::get('/registervisitor', 'indexregistervisitor')->name('registervisitor');
    Route::post('/registervisitor', 'simpanregistervisitor')->name('registervisitor.simpan');
    Route::get('/registermitra', 'indexregistermitra')->name('registermitra');
    Route::post('/registermitra', 'simpanregistermitra')->name('registermitra.simpan');
});

Route::controller(AdminAuthController::class)->group(function () {
    Route::get('/registeradmin', 'indexregisteradmin')->name('registeradmin');
    Route::post('/registeradmin', 'simpanregisteradmin')->name('registeradmin.simpan');
});


Route::post('/regismitra', [AuthController::class, 'register']);
Route::post('/regisuser', [AuthController::class, 'register']);
Route::post('/masuk', [AuthController::class, 'login']);

Route::get('/umkm_prod', [ProdukUmkmController::class, 'index']);
Route::post('/keluar', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth:sanctum', 'verified', 'isUmkm']], function () {
    Route::get('/dashboard', [DashboardPostController::class, 'index2']);
    Route::get('/dashboard/profile/{id}', [DashboardPostController::class, 'user']);
    Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
    Route::resource('/dashboard/posts', DashboardPostController::class);
    Route::get('/dashboard/email', [DashboardPostController::class, 'email']);
    Route::put('/dashboard/update', [AuthController::class, 'update']);
});

Route::group(['middleware' => ['auth:sanctum', 'verified', 'isAdmin']], function () {
    Route::resource('/manajemen/categories', AdminAuthController::class);
    Route::post('/manajemen/new_category', [AdminAuthController::class, 'storeCategory']);
    Route::put('/ubahCategories', [AdminAuthController::class, 'update']);
    Route::get('/manajemen/categories/show/{id}', [AdminAuthController::class, 'show']);

    Route::get('/manajemen/users', [UserController::class, 'index']);
    Route::put('/manajemen/users/status', [UserController::class, 'update']);
    Route::get('/manajemen/history', [DashboardPostController::class, 'history']);
});

Route::group(['middleware' => ['auth:sanctum', 'verified', 'isUser']], function () {
});



// Route::get('/dashboard/posts/create', function(){
//     return view('dashboard.posts.create');
// });



Route::get('/products', [ProdukUmkmController::class, 'index']);
Route::get('/products/{id}', [ProdukUmkmController::class, 'byCategory']);
Route::get('/companies', [UmkmController::class, 'index']);
Route::get('/companies/{category}', [UmkmController::class, 'byCategory']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/profile/{username}', [HomeController::class, 'profile']);
Route::get('/catalog/{slug}', [HomeController::class, 'catalog']);
Route::get('/catalogs/{name}', [HomeController::class, 'catalogs']);
Route::get('/appointment/{name}', [HomeController::class, 'appoinment']);

Route::get('/sendemail', [EmailController::class, 'kirimEmail']);
Route::get('/dashboard/mailA/{id}', [EmailController::class, 'updateEmailAccepted']);
Route::patch('/dashboard/mailR/{id}', [EmailController::class, 'updateEmailRejected']);


Route::get('/forget-password', [ResetPasswordController::class, 'showForgetPasswordForm']);
Route::post('/forget-password-ps', [ResetPasswordController::class, 'submitForgetPasswordForm']);
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('/reset-password-ps', [ResetPasswordController::class, 'submitResetPasswordForm']);


Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});