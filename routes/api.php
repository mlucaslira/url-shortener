<?php

use App\Http\Controllers\Api\ShortUrlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* 
* Cria automaticamente as rotas de todos os endpoints de /short-urls e /short-urls/{id}
* Route::apiResource('short-urls', ShortUrlController::class);
*/

Route::get('short-urls', [ShortUrlController::class, 'index']);
Route::get('short-urls/{short_url}', [ShortUrlController::class, 'show']);
Route::post('short-urls', [ShortUrlController::class, 'store']);
Route::put('short-urls/{short_url}', [ShortUrlController::class, 'update']);
Route::patch('short-urls/{short_url}', [ShortUrlController::class, 'update']);
Route::delete('short-urls/{short_url}', [ShortUrlController::class, 'destroy']);