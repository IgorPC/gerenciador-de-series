<?php

Route::get('/', function () {
    return redirect()->route('entrar');
});

Route::get('/series', 'SeriesController@index')->name('listar-series');
Route::get('/novaSerie', 'SeriesController@create')->name('nova-serie')->middleware('auth');
Route::post('/novaSerie', 'SeriesController@store')->middleware('auth');
Route::post('/remover/{id}', 'SeriesController@destroy')->middleware('auth');
Route::post('/editar/{id}', 'SeriesController@editarNome')->middleware('auth');
Route::get('/{seriesId}/temporadas', 'TemporadaController@index');
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index')->name('entrar');
Route::post('/entrar', 'EntrarController@entrar')->name('entrar');
Route::get('/registrar', 'RegistrarController@create')->name('registrar');
Route::post('/registrar', 'RegistrarController@store');
Route::get('/sair', function(){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('entrar');
})->name('sair');

