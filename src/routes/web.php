<?php


Route::group(['namespace' => 'RM\News\Http\Controllers'], function () {
    Route::resource('news', 'NewsController');
});
// Route::get('/news','NewsController@create');
