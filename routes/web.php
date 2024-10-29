<?php

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\FobController;
use App\Http\Controllers\Admin\MakeController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\Admin\BodyTypeController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\InquiriesController;
use App\Http\Controllers\frontend\FilterController;
use App\Http\Controllers\frontend\InquiryController;
use App\Http\Controllers\frontend\AutopartController;
use App\Http\Controllers\Admin\ExchangeRateController;
use App\Http\Controllers\Admin\TransmissionController;
use App\Http\Controllers\frontend\StaticPageController;
use App\Http\Controllers\Admin\HomepageBannersController;
use App\Http\Controllers\frontend\Auth\UserLoginController;
use App\Http\Controllers\Admin\AutopartController as AdminAutopartController;

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
// web.php
Route::get('/check-auth', function () {
    if (Auth::check()) {
        return response()->json(['authenticated' => true]);
    } else {
        return response()->json(['authenticated' => false]);
    }
});


// Route for displaying the list of inquiries

///////--  Frontend Section --///////

// Route::get('user/login', [UserLoginController::class, 'showLoginForm'])->name('user.login');
// Route::post('user/login', [UserLoginController::class, 'login']);
// Route::post('user/logout', [UserLoginController::class, 'logout'])->name('user.logout');
// Route::get('user/register', [UserLoginController::class, 'showRegistrationForm'])->name('user.register');
// Route::post('user/register', [UserLoginController::class, 'register']);
Route::post('/users/{id}/status', [UserLoginController::class, 'updateStatus'])->name('users.updateStatus');


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about-us', [StaticPageController::class, 'about'])->name('about');
Route::get('/contact-us', [StaticPageController::class, 'contact'])->name('contact');
Route::get('/faqs', [StaticPageController::class, 'faq'])->name('faq');
Route::get('/cars', [FilterController::class, 'cars'])->name('filter.cars');
Route::get('/car/show/{id}', [FilterController::class, 'carShow'])->name('car.show');

Route::Post('/filtering/cars/web', [FilterController::class, 'filterCarsWeb'])->name('filter-cars-web');
Route::Post('/cars/search', [FilterController::class, 'search'])->name('searchFilter');


Route::get('/autoparts', [AutopartController::class, 'index'])->name('autoparts');
Route::get('/autoparts/show/{id}', [AutopartController::class, 'show'])->name('autoparts.show');

Route::post('/getport', [FilterController::class, 'getport'])->name('getport');
Route::post('/getcalculate', [FilterController::class, 'getCalculate'])->name('getcal');


Route::post('/submit/inquiry', [InquiryController::class, 'store'])->name('inquiry.store');
Route::post('/submit/contact', [InquiryController::class, 'storeContact'])->name('contact.store');

Route::post('/set-currency', [HomeController::class, 'setCurrency'])->name('setCurrency');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/my-inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::post('/inquiry/{id}/reply', [InquiryController::class, 'reply'])->name('inquiry.reply');
});
Route::post('fetchModels', [ModelController::class, 'fetchModels'])->name('admin.fetchModels');
// Apply 'admin' middleware to all routes within this group
Route::middleware(['auth', 'admin'])->group(function () {

    // Public route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {


        Route::get('/inquiries', [InquiriesController::class, 'index'])->name('inquiries.index');
        Route::delete('inquiries/{inquiry}', [InquiriesController::class, 'destroy'])->name('inquiries.destroy');
        Route::resource('model', ModelController::class)->except(['show']);
        // Route::resource('details', DetailController::class);
        Route::resource('make', MakeController::class)->except(['show']);
        Route::resource('shipping', ShippingController::class)->except(['show']);
        Route::resource('bodyType', BodyTypeController::class);

        Route::resource('transmission', TransmissionController::class)->except(['show']);
        Route::resource('companies', DetailController::class)->only(['edit', 'update']);
        Route::get('users', [DetailController::class, 'getUsers'])->name('users.index');

        Route::resource('fob', FobController::class)->except(['show']);
        Route::resource('exchange_rates', ExchangeRateController::class)->except(['show']);
        Route::resource('cars', CarController::class)->except(['show']);
        Route::post('delete_item_image', [CarController::class, 'delete_item_image'])->name('delete_item_image');
        Route::get('banners', [BannerController::class, 'index'])->name('banners.index');
        Route::post('updateBanner', [BannerController::class, 'updateBanner'])->name('banners.updateBanner');
        Route::post('deleteBanner', [BannerController::class, 'destroy'])->name('banners.delete');
        Route::post('temp-images-create', [CarController::class, 'tempImagesCreate'])->name('temp-images-create');

        Route::controller(AdminAutopartController::class)->prefix('autoparts')->name('autoparts.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/detail/{id}', 'show')->name('show');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
            Route::post('/update/{id}', 'update')->name('update');
            Route::post('/store', 'store')->name('store');
        });

        // Other routes that need admin access
        Route::controller(ContactUsController::class)->prefix('contact-us')->name('contactus.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/detail/{id}', 'show')->name('show');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/destroy', 'destroy')->name('destroy');
            Route::post('/update/{id}', 'update')->name('update');
        });

        Route::controller(AboutUsController::class)->prefix('about-us')->name('about.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/detail/{id}', 'show')->name('show');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/destroy', 'destroy')->name('destroy');
            Route::post('/update/{id}', 'update')->name('update');
            Route::post('/store', 'store')->name('store');
        });

        Route::prefix('homepage-banners')->name('homepage_banners.')->group(function () {
            Route::get('/', [HomepageBannersController::class, 'index'])->name('index');
            Route::post('/uploadBanners', [HomepageBannersController::class, 'uploadBanners'])->name('uploadBanners');
            Route::post('/update-featured-cars', [HomepageBannersController::class, 'updateFeaturedCarsBanner'])->name('updateFeaturedCarsBanner');
        });
    });

    // Routes accessible to all authenticated users
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
});


require __DIR__ . '/auth.php';
