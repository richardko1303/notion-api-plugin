<?php
namespace Wezeo\Notion;

use Illuminate\Support\Facades\Route;
use Wezeo\Notion\Http\Controllers\IntegController;

Route::group(['prefix' => 'notion'], function () {
    Route::post('/find', [IntegController::class, 'index']);
    Route::post('/create', [IntegController::class, 'create']);
    Route::post('/delete', [IntegController::class, 'delete']);
    Route::post('/user', [IntegController::class, 'user']);
    Route::post('/update', [IntegController::class, 'update']);

    /* ZAPIER HANDLER */
    Route::post('/api/v1/receive', [IntegController::class, 'receive']);
});
