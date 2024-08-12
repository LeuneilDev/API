<?php


use App\Http\Controllers\Api\V1\OrderBoxInfoController;
use App\Http\Controllers\Api\V1\OrderInfoController;
use App\Http\Controllers\Api\V1\TrackingController;
use App\Http\Controllers\Api\V1\BoxChargesController;
use App\Http\Controllers\Api\V1\BoxInfoController;
use App\Http\Controllers\Api\V1\BranchController;
use App\Http\Controllers\Api\V1\ContainerController;
use App\Http\Controllers\Api\V1\DestinationController;
use App\Http\Controllers\Api\V1\PaymentMethodController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);



Route::middleware(["auth:sanctum"])->prefix('v1')->group(function () {
    Route::post("/logout", [AuthController::class, "logout"]);
    Route::apiResource("orderinfo", OrderInfoController::class);
    Route::apiResource("orderboxinfo", OrderBoxInfoController::class);
    Route::apiResource("tracking", TrackingController::class);
    Route::apiResource("boxcharges", BoxChargesController::class);
    Route::apiResource("boxinfo", BoxInfoController::class);
    Route::apiResource("destination", DestinationController::class);
    Route::apiResource("branch", BranchController::class);
    Route::apiResource("paymentmethod", PaymentMethodController::class);
    Route::apiResource("container", ContainerController::class);
});