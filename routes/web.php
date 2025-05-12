<?php

use App\Http\Controllers\GroupMasterController;
use App\Http\Controllers\SubGroupMasterController;
use App\Http\Controllers\ItemMasterController;
use App\Http\Controllers\BrandMasterController;

Route::get('/', function () {
    return view('welcome');
});

// Define resource routes for the controllers
Route::resource('groupmasters', GroupMasterController::class);
Route::resource('itemmasters', ItemMasterController::class); // Make sure to use the correct plural naming
Route::resource('subgroupmasters', SubGroupMasterController::class); // Corrected plural name
Route::resource('brandmasters', BrandMasterController::class); // Add the route for brandmasters
