<?php

Route::get('newhome', function(){
    echo "pnkj";
});
Route::get('/', [Pnkjwebspero\Changepage\HomePageController::class, 'index']);