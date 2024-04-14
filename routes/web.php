<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FobController;
use App\Http\Controllers\Admin\MakeController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\BodyTypeController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\ExchangeRateController;
use App\Http\Controllers\Admin\CarController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('model', ModelController::class)->except(['show']);
    Route::resource('make', MakeController::class)->except(['show']);
    Route::resource('shipping', ShippingController::class)->except(['index', 'show']);
    Route::resource('bodyType', BodyTypeController::class);
    Route::resource('fob', FobController::class)->except(['show']);
    Route::resource('exchange_rates', ExchangeRateController::class)->except(['show']);
    Route::resource('cars', CarController::class)->except(['show']);
    Route::post('delete_item_image',[CarController::class,'delete_item_image'])->name('delete_item_image');
    Route::post('temp-images-create', [CarController::class,'tempImagesCreate'])->name('temp-images-create');
});

Route::get('generateSlug', function (Request $request) {
    $slug = '';
    if (!empty($request->title)) {
        $slug = Str::slug($request->title);
    }
    return response()->json([
        'status' => true,
        'slug' => $slug,
    ]);
})->name('generateSlug');
