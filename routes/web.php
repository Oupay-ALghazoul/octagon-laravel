<?php

use App\Http\Controllers\Api\ContactController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    return view('home');
});

Route::get('/index', function () {
    return view('home');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/founders', function () {
    return view('founders');
});

Route::get('/value-proposition', function () {
    return view('value-proposition');
});

Route::get('/global-footprin', function () {
    return view('global-footprin');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/global-capabilities', function () {
    return view('global-capabilities');
});

Route::get('/countries-representative', function () {
    return view('countries-representative');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/sub-services/{id}', function () {
    return view('sub-service');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact', [ContactController::class, 'store']);

Route::get('/lang/{lang?}', function ($lang = 'en') {
    Session::put('locale', $lang);
    // App::setLocale('ar');
    // app()->setLocale($lang);
    // app()->setLocale('ar');
    // dd(app()->getLocale());
    return redirect()->back();
})->name('change-lang');

Route::group(['prefix' => 'admin-94'], function () {
    Voyager::routes();
});


Route::get('storage/files/{dir1}/{dir2}/{filename}', function ($dir1, $dir2, $filename) {

    $path = storage_path('app/public/' . $dir1 . '/' . $dir2 . '/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('storage/{dir1}/{dir2}/{filename}', function ($dir1, $dir2, $filename) {

    $path = storage_path('app/public/' . $dir1 . '/' . $dir2 . '/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});

// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});