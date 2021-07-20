<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActionController;


Route::get('/', [ActionController::class, 'index']);

Route::get('/list', [ActionController::class, 'list']);

Route::get('/create', [ActionController::class, 'create']);

Route::post('/store', [ActionController::class, 'store']);

Route::get('/json', [ActionController::class, 'viewJsonData']);

