<?php

use App\Http\Controllers\GroupMasterController;
use App\Http\Controllers\SubGroupMasterController;
use App\Http\Controllers\ItemMasterController;

Route::get('/', function () {
    return view('welcome');
});

// Define resource routes for the controllers
Route::resource('groupmasters', GroupMasterController::class);
Route::resource('itemmaster', ItemMasterController::class);

Route::resource('subgroupmaster', SubGroupMasterController::class);
