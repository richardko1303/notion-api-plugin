<?php

namespace Wezeo\Integ;

use Illuminate\Support\Facades\Route;
use Wezeo\Integ\Http\Controllers\IntegController;

use Wezeo\Integ\classes\SyncToNotion;

Route::group(['prefix' => 'api/v1'], function () {
    Route::get('/', [IntegController::class, 'index']);
    Route::get('/sync', [SyncToNotion::class, 'getProjectFromApi']);
});
