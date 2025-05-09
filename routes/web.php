<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupMasterController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('groupmasters', GroupMasterController::class);
