<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupMasterController;
use App\Http\Controllers\SubGroupMasterController;
use App\Http\Controllers\ItemMasterController;
use App\Http\Controllers\ProductMasterController;
use App\Http\Controllers\DisplayMasterController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('groupmasters', GroupMasterController::class);
Route::resource('itemmaster', ItemMasterController::class);

Route::resource('subgroupmaster', SubGroupMasterController::class);
Route::resource('productmaster', ProductMasterController::class);
Route::get('/subgroup/get-group', [ProductMasterController::class, 'getGroupBySubgroup'])->name('productmaster.getGroupBySubgroup');
Route::resource('displaymaster', DisplayMasterController::class);
