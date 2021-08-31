<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

//Ruta para registro
Route::get('/register', function(){
    return view ('register');
});

//Ruta para vista logeado
Route::get('/logged', function(){
    return view ('logged');
});
//Vista metodos de pago
Route::get('/payment', function(){
    return view ('payment');
});
//Vista Datos de tarjeta
Route::get('/carddata', function(){
    return view ('carddata');
});

//Se crean las rutas de Categoria.
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}','CategoryController@show');
Route::post('/categories/create','CategoryController@store');
Route::put('/categories/update/{id}','CategoryController@update');
Route::delete('/categories/delete/{id}','CategoryController@destroy');
//Se crean las rutas de Videocategoria.
Route::get('/videocategories', 'VideocategoryController@index');
Route::get('/videocategories/{id}','VideocategoryController@show');
Route::post('/videocategories/create','VideocategoryController@store');
Route::put('/videocategories/update/{id}','VideocategoryController@update');
Route::delete('/videocategories/delete/{id}','VideocategoryController@destroy');
//Se crean las rutas de Commentary
Route::get('/commentaries', 'CommentaryController@index');
Route::get('/commentaries/{id}','CommentaryController@show');
Route::post('/commentaries/create','CommentaryController@store');
Route::put('/commentaries/update/{id}','CommentaryController@update');
Route::delete('/commentaries/delete/{id}','CommentaryController@destroy');
//Se crean las rutas de Video
Route::get('/videos', 'VideoController@index');
Route::get('/videos/{id}','VideoController@show');
Route::post('/videos/create','VideoController@store');
Route::put('/videos/update/{id}','VideoController@update');
Route::delete('/videos/delete/{id}','VideoController@destroy');
//Se crean las rutas de Country
Route::get('/countries', 'CountryController@index');
Route::get('/countries/{id}','CountryController@show');
Route::post('/countries/create','CountryController@store');
Route::put('/countries/update/{id}','CountryController@update');
Route::delete('/countries/delete/{id}','CountryController@destroy');
//Se crean las rutas de Region
Route::get('/regions', 'RegionController@index');
Route::get('/regions/{id}','RegionController@show');
Route::post('/regions/create','RegionController@store');
Route::put('/regions/update/{id}','RegionController@update');
Route::delete('/regions/delete/{id}','RegionController@destroy');
//Se crean las rutas de Commune
Route::get('/communes', 'CommuneController@index');
Route::get('/communes/{id}','CommuneController@show');
Route::post('/communes/create','CommuneController@store');
Route::put('/communes/update/{id}','CommuneController@update');
Route::delete('/communes/delete/{id}','CommuneController@destroy');
//Se crean las rutas de Playlist
Route::get('/playlists', 'PlaylistController@index');
Route::get('/playlists/{id}','PlaylistController@show');
Route::post('/playlists/create','PlaylistController@store');
Route::put('/playlists/update/{id}','PlaylistController@update');
Route::delete('/playlists/delete/{id}','PlaylistController@destroy');
//Se crean las rutas de Serie
Route::get('/series', 'SerieController@index');
Route::get('/series/{id}','SerieController@show');
Route::post('/series/create','SerieController@store');
Route::put('/series/update/{id}','SerieController@update');
Route::delete('/series/delete/{id}','SerieController@destroy');
//Se crean las rutas de Playlistvideo
Route::get('/playlistvideos', 'PlaylistvideoController@index');
Route::get('/playlistvideos/{id}','PlaylistvideoController@show');
Route::post('/playlistvideos/create','PlaylistvideoController@store');
Route::put('/playlistvideos/update/{id}','PlaylistvideoController@update');
Route::delete('/playlistvideos/delete/{id}','PlaylistvideoController@destroy');
//Se crean las rutas de Uservideo
Route::get('/uservideos', 'UservideoController@index');
Route::get('/uservideos/{id}','UservideoController@show');
Route::post('/uservideos/create','UservideoController@store');
Route::put('/uservideos/update/{id}','UservideoController@update');
Route::delete('/uservideos/delete/{id}','UservideoController@destroy');
//Se crean las rutas de Userplaylist
Route::get('/userplaylists', 'UserplaylistController@index');
Route::get('/userplaylists/{id}','UserplaylistController@show');
Route::post('/userplaylists/create','UserplaylistController@store');
Route::put('/userplaylists/update/{id}','UserplaylistController@update');
Route::delete('/userplaylists/delete/{id}','UserplaylistController@destroy');
//Se crean las rutas de Role
Route::get('/roles', 'RoleController@index');
Route::get('/roles/{id}','RoleController@show');
Route::post('/roles/create','RoleController@store');
Route::put('/roles/update/{id}','RoleController@update');
Route::delete('/roles/delete/{id}','RoleController@destroy');
//Se crean las rutas de medio de pagos
Route::get('/paymentmethods', 'PaymentmethodController@index');
Route::get('/paymentmethods/{id}','PaymentmethodController@show');
Route::post('/paymentmethods/create','PaymentmethodController@store');
Route::put('/paymentmethods/update/{id}','PaymentmethodController@update');
Route::delete('/paymentmethods/delete/{id}','PaymentmethodController@destroy');
//Se crean las rutas de userrole
Route::get('/userroles', 'UserroleController@index');
Route::get('/userroles/{id}','UserroleController@show');
Route::post('/userroles/create','UserroleController@store');
Route::put('/userroles/update/{id}','UserroleController@update');
Route::delete('/userroles/delete/{id}','UserroleController@destroy');
//Se crean las rutas de seguidorseguido
Route::get('/followerfolloweds', 'FollowerfollowedController@index');
Route::get('/followerfolloweds/{id}','FollowerfollowedController@show');
Route::post('/followerfolloweds/create','FollowerfollowedController@store');
Route::put('/followerfolloweds/update/{id}','FollowerfollowedController@update');
Route::delete('/followerfolloweds/delete/{id}','FollowerfollowedController@destroy');
//Se crean las rutas de usuario
Route::get('/users', 'UserController@index');
Route::get('/users/{id}','UserController@show');
Route::post('/users/create','UserController@store');
Route::put('/users/update/{id}','UserController@update');
Route::delete('/users/delete/{id}','UserController@destroy');
//Se crean las rutas de donacion
Route::get('/donations', 'DonationController@index');
Route::get('/donations/{id}','DonationController@show');
Route::post('/donations/create','DonationController@store');
Route::put('/donations/update/{id}','DonationController@update');
Route::delete('/donations/delete/{id}','DonationController@destroy');