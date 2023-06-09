<?php

Route::get('newhome', function(){
    echo "pnkj";
});
Route::get('/', [Pnkjwebspero\Changepage\HomePageController::class, 'index']);

Route::get('/add-file', [Pnkjwebspero\Changepage\HomePageController::class, 'addFile']);