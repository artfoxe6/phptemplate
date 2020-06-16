<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'test','namespace' => '\App\Controller\Test'], function () {

    Route::get('/index', [
            'uses' => 'TestController@index', 'as' => 'api.test.index',
            'name' => '测试-首页']
    );
});
