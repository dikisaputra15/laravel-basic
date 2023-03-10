<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Models\User;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $images = Multipic::all();
    return view('home', compact('brands','abouts','images'));
});

Route::get('/home', function () {
    echo "This is home page";
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact-fhuseb-teuty',[ContactController::class, 'index'])->name('con');

// category controller
Route::get('/category/all',[CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add',[CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class, 'Edit']);
Route::post('/category/update/{id}',[CategoryController::class, 'Update']);
Route::get('/softdelete/category/{id}',[CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}',[CategoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}',[CategoryController::class, 'Pdelete']);

// brand controller
Route::get('/brand/all',[BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add',[BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class, 'Edit']);
Route::post('/brand/update/{id}',[BrandController::class, 'Update']);
Route::get('/brand/delete/{id}',[BrandController::class, 'Delete']);

//Multi Image
Route::get('/multi/all',[BrandController::class, 'Multpic'])->name('multi.image');
Route::post('/multi/add',[BrandController::class, 'StoreImg'])->name('store.image');

//admin all route
Route::get('/home/slider',[HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider',[HomeController::class, 'StoreSlider'])->name('store.slider');

//home about
Route::get('/home/About',[AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/About',[AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/About',[AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}',[AboutController::class, 'EditAbout']);
Route::post('/update/homeabout/{id}',[AboutController::class, 'UpdateAbout']);
Route::get('/about/delete/{id}',[AboutController::class, 'DeleteAbout']);

//portfolio
Route::get('/portfolio',[AboutController::class, 'Portfolio'])->name('portfolio');

//admin contact page
Route::get('/admin/contact',[ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/add/contact',[ContactController::class, 'AdminAddContact'])->name('add.contact');
Route::post('/admin/store/contact',[ContactController::class, 'AdminStoreContact'])->name('store.contact');
Route::get('/admin/message',[ContactController::class, 'AdminMessage'])->name('admin.message');

//home contact page 
Route::get('/contact',[ContactController::class, 'Contact'])->name('contact');
Route::post('/contact/form',[ContactController::class, 'ContactForm'])->name('contact.form');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/user/logout',[BrandController::class, 'Logout'])->name('user.logout');

//change password
Route::get('/user/password',[ChangePass::class, 'CPassword'])->name('change.password');
Route::post('/password/update',[ChangePass::class, 'UpdatePassword'])->name('password.update');

//user profile
Route::get('/user/profile',[ChangePass::class, 'PUpdate'])->name('profile.update');