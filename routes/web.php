<?php

use App\Http\Controllers\Dashboard\ContentController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RowController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__ . '/auth.php';


Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::prefix('/dashboard')->middleware('auth')->group(function () {
        Route::get('/', function () {
            return view('admin.empty');
        })->name('dashboard');

        Route::resource('services', ServiceController::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('pages', PageController::class);
        Route::resource('sections', SectionController::class);
        Route::resource('contents', ContentController::class);

        Route::resource('messages', MessageController::class)->except([
            'show',
            'edit',
            'update',
            'create'
        ])->middleware('read');

        // Route::resource('Data', RowController::class);
        // Route::resource('employees', EmployeeController::class);
    });




    Route::get('/', [HomeController::class, 'homePage'])
        ->name('homePage');

    Route::get('about-us', [HomeController::class, 'aboutUsPage'])
        ->name('aboutUsPage');

    Route::get('services', [HomeController::class, 'servicesPage'])
        ->name('servicesPage');

    Route::get('projects', [HomeController::class, 'projectsPage'])
        ->name('projectsPage');

    Route::get('contact-us', [HomeController::class, 'contactUsPage'])
        ->name('contactUsPage');

    Route::post('sendMessage', [MessageController::class, 'store'])
        ->name('sendMessage');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

});
