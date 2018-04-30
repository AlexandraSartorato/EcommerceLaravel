<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Annonce;
use App\Photo;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

/*Route Users*/
Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
Route::put('/user/{id}/update', 'UserController@update')->name('user.update');
Route::delete('/user/{id}/delete', 'UserController@destroy')->name('user.destroy');


/*Route Ads*/
Route::post('/search','AnnonceController@search')->name('ad.search');
Route::get('/ad', 'AnnonceController@index')->name(('ad.index'));
Route::get('/ad/new', 'AnnonceController@create')->name('ad.create');
Route::post('/ad', 'AnnonceController@store')->name('ad.store');
Route::get('/ad/{id}/list', 'AnnonceController@show')->name('ad.show');
Route::get('/ad/{id}/edit', 'AnnonceController@edit')->name('ad.edit');
Route::put('/ad/{id}/update', 'AnnonceController@update')->name('ad.update');
Route::delete('/ad/{id}/delete', 'AnnonceController@destroy')->name('ad.delete');

/*Route Photo*/
Route::get('/photo/new', 'PhotoController@create')->name('photo.create');
Route::post('/photo/{id}/store', 'PhotoController@store')->name('photo.store');
Route::get('/photo/edit', 'PhotoController@edit')->name('photo.edit');
Route::post('/photo/{id}/update', 'PhotoController@update')->name('photo.update');


Route::get('/ad/{id}/show', 'RateController@show')->name('rate.show');
Route::post('/ad/{id}/rate', 'RateController@store')->name('rate.store');

});