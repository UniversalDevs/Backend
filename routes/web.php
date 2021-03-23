<?php
//Clear Cache facade value:
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});



Auth::routes();

Route::group(['prefix'=>'/admin','middleware'=>['auth'], 'as'=>'admin.'], function () {
    Route::get('/', ['as'=>'home','uses'=>'indexController@index']);
    Route::group(['prefix'=>'voluntarios','as'=>'voluntarios.'], function () {
        Route::get('/lista', ['as'=>'lista','uses'=>'Painel\VoluntariosController@lista']);
        Route::get('/novo', ['as'=>'novo','uses'=>'Painel\VoluntariosController@novo']);
        Route::get('/editar/{id}', ['as'=>'editar','uses'=>'Painel\VoluntariosController@editar']);
        Route::post('store', ['as'=>'store','uses'=>'Painel\VoluntariosController@store']);
        Route::post('/update/{id}', ['as'=>'update','uses'=>'Painel\VoluntariosController@update']);
        Route::get('/delete/{id}', ['as'=>'delete','uses'=>'Painel\VoluntariosController@delete']);
    });
});




Route::get('/', ['as'=>'home','uses'=>'indexController@home']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/{slug}', ['as'=>'conteudo','uses'=>'Site\ConteudosController@Select']);
