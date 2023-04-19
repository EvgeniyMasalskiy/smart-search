<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\SubscriberController;
use App\Models\Group;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/lib', function () {
    return view('library');
});
Route::get('/register2/', function () {
    return view('register');
    });
Route::get('/search/', function () {
    return view('search');
});
Route::get('/search2/', function () {
    return view('search2');
});
Route::get('/spam/', function () {
    return view('spam');
});
Route::get('/user/', function () {
    return view('user');
});
Route::post('/spam', [SubscriberController::class, 'distribution'])->name('distribution-form');
Route::get('/group/', function () {
    return view('add-group');
});
Route::post('/contacts/submit', 'ContactController@submit')->name('contact-form');

Route::get('/subscribers', [SubscriberController::class, 'allDate'])->name('all-subscribers-form');
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe-form');


Route::get('/groups', [GroupController::class, 'getGroup'])->name('all-group-form');
Route::post('/search/', [GroupController::class, 'addGroup'])->name('add-group-form');
Route::delete('/search/', [GroupController::class, 'deleteGroup'])->name('delete-group-form');
Route::get('/view-spam/', function () {
    return view('view-spam');
});

Route::post('/view-spam/', [SubscriberController::class, 'addSubscriber'])->name('add-subscriber-form');
Route::delete('/view-spam/', [SubscriberController::class, 'deleteSubscriber'])->name('delete-subscriber-form');

Route::get('/resources', [GroupController::class, 'getGroup'])->name('all-resource-form');
Route::post('/lib', [ResourceController::class, 'addResource'])->name('add-resource-form');
