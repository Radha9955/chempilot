<?php

use App\Http\Controllers\GroupMasterController;
use App\Http\Controllers\SubGroupMasterController;
use App\Http\Controllers\ItemMasterController;
use App\Http\Controllers\ProductMasterController;
use App\Http\Controllers\DisplayMasterController;
use App\Http\Controllers\BrandMasterController;
use App\Http\Controllers\GSTMasterController;
use App\Http\Controllers\HSNMasterController;
use App\Http\Controllers\TaxMasterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryMasterController;
use App\Http\Controllers\StateMasterController;
use App\Http\Controllers\DistrictMasterController;
use App\Http\Controllers\CityMasterController;
use App\Http\Controllers\BranchMasterController;



Route::get('/', function () {
    return view('welcome');
});

// Define resource routes for the controllers
Route::resource('groupmasters', GroupMasterController::class);
Route::resource('itemmaster', ItemMasterController::class);
Route::resource('subgroupmaster', SubGroupMasterController::class);
Route::resource('productmaster', ProductMasterController::class);

Route::get('/subgroup/get-group', [ProductMasterController::class, 'getGroupBySubgroup'])->name('productmaster.getGroupBySubgroup');

Route::resource('displaymaster', DisplayMasterController::class); // This was fixed
Route::resource('brandmasters', BrandMasterController::class); // This wa
Route::resource('gstmasters', GSTMasterController::class);
Route::resource('hsnmasters', HSNMasterController::class);
Route::resource('taxmasters', TaxMasterController::class);
Route::resource('countrymaster', CountryMasterController::class);
Route::resource('statemaster', StateMasterController::class);
Route::resource('districtmaster', DistrictMasterController::class);
Route::resource('citymaster', CityMasterController::class);

// Route for getting districts based on state
// web.php (or api.php)
Route::get('/get-districts/{stateID}', [CityMasterController::class, 'getDistricts']);
Route::resource('branchmaster', BranchMasterController::class);




