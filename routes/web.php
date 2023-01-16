<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrierController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsLifestyleController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/search', [HomeController::class, 'search']);

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/product', [ProductsController::class, 'index'])->name('products.index');
Route::post('/product/filter', [ProductsController::class, 'filter'])->name('products.filter');
Route::get('/product/attention{product?}', [ProductsController::class, 'attention'])->name('products.attention');
Route::get('/product/download_instruction', [ProductsController::class, 'downloadInstruction'])->name('products.download_instruction');
Route::get('/product/{slug}', [ProductsController::class, 'show'])->name('products.show');

Route::get('/carrier', [CarrierController::class, 'index'])->name('carrier.index');
Route::get('/carrier/apply/{id}', [CarrierController::class, 'apply'])->name('carrier.apply');
Route::post('/apply', [CarrierController::class, 'insertApplication'])->name('apply');

Route::get('/newslifestyle', [NewsLifestyleController::class, 'index'])->name('newslifestyle.index');
Route::get('/newslifestyle/news', [NewsLifestyleController::class, 'news'])->name('newslifestyle.news');
Route::get('/newslifestyle/lifestyle', [NewsLifestyleController::class, 'lifestyle'])->name('newslifestyle.lifestyle');
Route::get('/newslifestyle/{slug}', [NewsLifestyleController::class, 'show'])->name('newslifestyle.show');

Route::get('/contact/', [ContactsController::class, 'index'])->name('contacts.index');

// Auth routes
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function () {
  Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');

  Route::group(['middleware' => ['AdminCheck']], function () {
    Route::get('/admin/{action?}', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/{action?}', [AdminController::class, 'post']);

    Route::get('/banners/{action?}/{banner?}', [AdminController::class, 'banners'])->name('banners');
    Route::post('/banners/{ation?}', [AdminController::class, 'bannersPost'])->name('banners.post');

    Route::get('/admin-products/{action?}/{product?}', [AdminController::class, 'products'])->name('admin.products');
    Route::post('/admin-products/{action?}/', [AdminController::class, 'productsPost'])->name('admin.products.post');

    Route::get('/admin-newslifestyles/{action?}/{newslifestyle?}', [AdminController::class, 'newslifestyles'])->name('admin.newslifestyles');
    Route::post('/admin-newslifestyles/{action?}/', [AdminController::class, 'newslifestylesPost'])->name('admin.newslifestyles.post');

    Route::get('/admin-vacancies/{action?}/{vacancy?}', [AdminController::class, 'vacancies'])->name('admin.vacancies');
    Route::post('/admin-vacancies/{action?}/', [AdminController::class, 'vacanciesPost'])->name('admin.vacancies.post');
  });
});

Route::redirect('/products/', '/product');
Route::redirect('/about-us/', '/about');
Route::redirect('/career/', '/carrier');
Route::redirect('/contacts/', '/contact');
Route::redirect('/nosology/{path}', '/product');
Route::redirect('/vitaminy/', '/product');
Route::redirect('//polza-zhirnyh-kislot-omega-3-dlja-zdorovja/', '/newslifestyle/polza-zhirnyh-kislot-omega-3-dlya-zdorovya');
Route::redirect('/avitaminoz-i-gipovitaminoz/', '/newslifestyle/avitaminoz-i-gipovitaminoz');
Route::redirect('/poleznye-svojstva-vitamina-a/', '/newslifestyle/poleznye-svoystva-vitamina-a');

Route::redirect('/chem-zhenskij-mozg-otlichaetsja-ot-muzhskogo-5-interesnyh-faktov/', '/newslifestyle/chem-zhenskiy-mozg-otlichaetsya-ot-muzhskogo-5-interesnyh-faktov');
Route::redirect('/useful-articles/', '/newslifestyle');
Route::redirect('/drug-selection/', '/product');
Route::redirect('/career/', '/carrier');
Route::redirect('/career/', '/carrier');
Route::redirect('/career/', '/carrier');
Route::redirect('/career/', '/carrier');
Route::redirect('/career/', '/carrier');
Route::redirect('/career/', '/carrier');
Route::redirect('/career/', '/carrier');
