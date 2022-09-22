<?php

use RobChett\Laraberg\Controllers\BlockRendererController;
use RobChett\Laraberg\Controllers\OEmbedController;
use RobChett\Laraberg\Controllers\MediaLibraryController;

Route::group(['prefix' => config('laraberg.prefix'), 'middleware' => config('laraberg.middlewares')], function () {
    Route::get('oembed', [OEmbedController::class, 'show']);
    Route::get('block-renderer', [BlockRendererController::class, 'show']);
    Route::get('media-library', [MediaLibraryController::class, 'show']);
});
