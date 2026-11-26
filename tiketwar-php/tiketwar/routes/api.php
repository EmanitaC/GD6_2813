<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KonserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/ping', function () {
    return response()->json(['pesan' => 'API TiketWar aktif']);
});
Route::get('/konser', [KonserController::class, 'index'])
    ->name('api.konser.index');
Route::get('/konser/{konser}', [KonserController::class, 'show'])
    ->whereNumber('konser')->name('api.konser.show');
