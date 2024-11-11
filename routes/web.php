<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleModelController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\VersionController;
use Illuminate\Support\Facades\Route;

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

// Redirects the default route to the dashboard
Route::redirect("/", "dashboard");

// Route for the main dashboard
// Main dashboard will be replaced with the ad viewing page with all the existing ads and a way to create new ads
Route::prefix("dashboard")->group(function () {
    Route::get("/", [DashboardController::class, "index"])->name("dashboard.index");
});

// Routes for the SQL query reports
Route::prefix('reports')->group(function () {
    Route::get("/", [QueryController::class, "index"])->name("query.index");

    // I want to make these queries only visible to the admin
    Route::get("/SQL01", [QueryController::class, "showUserVehicleCount"])->name("01.query");
    Route::get("/SQL02", [QueryController::class, "showBrandVehicleCount"])->name("02.query");
    Route::get("/SQL03", [QueryController::class, "showBrandModelVersionCount"])->name("03.query");
    Route::get("/SQL04", [QueryController::class, "showVehicleBrandName"])->name("04.query");
    Route::get("/SQL05", [QueryController::class, "showVehicleBrandTypeSort"])->name("05.query");
    Route::get("/SQL06", [QueryController::class, "showInactiveUserListings"])->name("06.query");
    Route::get("/SQL07", [QueryController::class, "showUserCommentByID"])->name("07.query");
    Route::get("/SQL08", [QueryController::class, "showInactiveListings"])->name("08.query");

});

// All of these routes are not gonna be able to be accessed by the normal user 

// Routes for the user CRUD
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');

    Route::get('/registerUser', [UserController::class, 'registerUser'])->name('register.user');
    Route::post('/registerUser', [UserController::class, 'registerUser'])->name('register.user');

    Route::get('/updateUser/{id}', [UserController::class, 'updateUser'])->name('update.user');
    Route::put('/updateUser/{id}', [UserController::class, 'updateUser'])->name('update.user');

    Route::delete('/delete', [UserController::class, 'delete'])->name('user.delete');
});

// Routes for the vehicles CRUD
Route::prefix('vehicles')->group(function () {
    Route::get('/', [VehicleController::class, 'index'])->name('vehicles.index');

    Route::get('/registerVehicle', [VehicleController::class, 'registerVehicle'])->name('register.vehicle');
    Route::post('/registerVehicle', [vehicleController::class, 'registerVehicle'])->name('register.vehicle');

    Route::get('/updateVehicle/{id}', [VehicleController::class, 'updateVehicle'])->name('update.vehicle');
    Route::put('/updateVehicle/{id}', [VehicleController::class, 'updateVehicle'])->name('update.vehicle');

    Route::delete('/delete', [VehicleController::class, 'delete'])->name('vehicle.delete');
});

// Routes for the brands CRUD
Route::prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('brands.index');

    Route::get('/registerBrand', [BrandController::class, 'registerBrand'])->name('register.brand');
    Route::post('/registerBrand', [BrandController::class, 'registerBrand'])->name('register.brand');

    Route::get('/updateBrand/{id}', [BrandController::class, 'updateBrand'])->name('update.brand');
    Route::put('/updateBrand/{id}', [BrandController::class, 'updateBrand'])->name('update.brand');

    Route::delete('/delete', [BrandController::class, 'delete'])->name('brand.delete');
});

// Routes for the models CRUD
Route::prefix('models')->group(function () {
    Route::get('/', [VehicleModelController::class, 'index'])->name('models.index');

    Route::get('/registerModel', [VehicleModelController::class, 'registerModel'])->name('register.model');
    Route::post('/registerModel', [VehicleModelController::class, 'registerModel'])->name('register.model');

    Route::get('/updateModel/{id}', [VehicleModelController::class, 'updateModel'])->name('update.model');
    Route::put('/updateModel/{id}', [VehicleModelController::class, 'updateModel'])->name('update.model');

    Route::delete('/delete', [VehicleModelController::class, 'delete'])->name('model.delete');
});

// Routes for the versions CRUD
Route::prefix('versions')->group(function () {
    Route::get('/', [VersionController::class, 'index'])->name('versions.index');

    Route::get('/registerVersion', [VersionController::class, 'registerVersion'])->name('register.version');
    Route::post('/registerVersion', [VersionController::class, 'registerVersion'])->name('register.version');

    Route::get('/updateVersion/{id}', [VersionController::class, 'updateVersion'])->name('update.version');
    Route::put('/updateVersion/{id}', [VersionController::class, 'updateVersion'])->name('update.version');

    Route::delete('/delete', [VersionController::class, 'delete'])->name('version.delete');
});

// Routes for the comments CRUD
Route::prefix('comments')->group(function () {
    Route::get('/', [CommentController::class, 'index'])->name('comments.index');

    Route::get('/registerComment', [CommentController::class, 'registerComment'])->name('register.comment');
    Route::post('/registerComment', [CommentController::class, 'registerComment'])->name('register.comment');

    Route::get('/updateComment/{id}', [CommentController::class, 'updateComment'])->name('update.comment');
    Route::put('/updateComment/{id}', [CommentController::class, 'updateComment'])->name('update.comment');

    Route::delete('/delete', [CommentController::class, 'delete'])->name('comment.delete');
});

// Routes for the types CRUD
Route::prefix('types')->group(function () {
    Route::get('/', [VehicleTypeController::class, 'index'])->name('types.index');

    Route::get('/registerType', [VehicleTypeController::class, 'registerType'])->name('register.type');
    Route::post('/registerType', [VehicleTypeController::class, 'registerType'])->name('register.type');

    Route::get('/updateType/{id}', [VehicleTypeController::class, 'updateType'])->name('update.type');
    Route::put('/updateType/{id}', [VehicleTypeController::class, 'updateType'])->name('update.type');

    Route::delete('/delete', [VehicleTypeController::class, 'delete'])->name('type.delete');
});