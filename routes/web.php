<?php

use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EbookController as AdminEbookController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\TutorialController as AdminTutorialController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\EbookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\User\AccountController as UserAccountController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\ProjectController as UserProjectController;
use App\Http\Controllers\User\TutorialController as UserTutorialController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/ebook', [EbookController::class, 'index'])->name('ebook');
Route::get('/tutorial', [TutorialController::class, 'index'])->name('tutorial');
Route::get('/project', [ProjectController::class, 'index'])->name('project');

Route::get('/ebook/search', [SearchController::class, 'ebook'])->name('search-ebook');
Route::get('/tutorial/search', [SearchController::class, 'tutorial'])->name('search-tutorial');
Route::get('/project/search', [SearchController::class, 'project'])->name('search-project');

Route::prefix('admin')
    ->middleware('auth', 'admin')
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
        Route::resource('ebook', AdminEbookController::class);
        Route::resource('tutorial', AdminTutorialController::class);
        Route::resource('project', AdminProjectController::class);
        Route::resource('account', AdminAccountController::class);
        Route::resource('user', AdminUserController::class);
    });

Route::prefix('user')
    ->middleware('auth', 'user')
    ->group(function () {
        Route::get('/', [UserDashboardController::class, 'index'])->name('user-dashboard');
        Route::resource('tutorials', UserTutorialController::class);
        Route::resource('projects', UserProjectController::class);
        Route::resource('accounts', UserAccountController::class);
    });



Auth::routes();
