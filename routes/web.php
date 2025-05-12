<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupMasterController;
use App\Http\Controllers\SubGroupMasterController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('groupmasters', GroupMasterController::class);
Route::resource('itemmaster', ItemMasterController::class);

Route::resource('subgroupmaster', SubGroupMasterController::class);
