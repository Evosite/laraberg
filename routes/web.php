<?php

use Evosite\Laraberg\Controllers\BlockRendererController;
use Evosite\Laraberg\Controllers\OEmbedController;
use Evosite\Laraberg\Controllers\MediaLibraryController;

Route::group(['prefix' => config('laraberg.prefix'), 'middleware' => config('laraberg.middlewares')], function () {
    Route::get('oembed', [OEmbedController::class, 'show']);
    Route::get('block-renderer', [BlockRendererController::class, 'show']);
    Route::get('media-library', [MediaLibraryController::class, 'show']);
});
