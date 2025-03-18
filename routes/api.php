<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\OfficeDocsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\EsoCourtController;
use App\Http\Controllers\IpLoggingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\UpdateTimeController;
use App\Http\Controllers\ScreenReaderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::controller(MenuController::class)->group(function () {
    Route::get('headerMenu/{lang?}', 'apiHeaderMenu');
    Route::get('footerMenu/{lang?}', 'apiFooterMenu');
});

//News Api Swati Mishra
Route::controller(NewsController::class)->group(function () {
    Route::get('headerNews/{lang?}', 'apiHeaderNews');
    Route::get('newsDescription/{lang?}', 'apiNewsDescription');
    Route::get('newsDescriptionById/{id}/{lang?}', 'newsDescriptionById');
});

//Services and Component Api Swati Mishra
Route::controller(ComponentController::class)->group(function () {
    Route::get('componentData/{componentName}/{lang?}', 'getComponentData');
    Route::get('servicesData/{lang?}',  'getServiceComponentData');
});

//Office Docs (Tenders, Circulars, Resource Library, Media Gallery, Acts and Rules, Office Orders and Guidelines) by Swati Mishra
Route::get('officeDocs/{categoryId}/{lang?}', [OfficeDocsController::class, 'getOfficeData']);

//Who's Who Api Swati Mishra 
Route::get('directory/{lang?}', [DirectoryController::class, 'apiDirectory']);

//ESO Court Api Swati Mishra
Route::get('esocourt/{lang?}', [EsoCourtController::class, 'apiEsoCourt']);

//Visitor Count Api Swati Mishra 21-01-2025
Route::get('/store-visitor-ip', [VisitorController::class, 'store']);
Route::get('/visitor-count', [VisitorController::class, 'getVisitorCount']);


// Last updated API for LNDO Website by Adarsh
Route::get('/latest-timestamp', [UpdateTimeController::class, 'latestUpdate']);

// Screen Readers API for LNDO Website by Adarsh
Route::apiResource('/screen-readers-access', ScreenReaderController::class);
