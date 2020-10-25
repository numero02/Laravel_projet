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

Route::get('/', 'AdController@index');

Route::get('/ads/admin', 'HomeController@ads');

Route::get('/ads/create', 'AdController@create');

Route::post('/ad/store', 'AdController@store');

Route::post('/message/store', 'MessageController@store');

/*
    afficher la liste
*/

Route::get('/messages/{id}' , 'MessageController@index');


/**
 *  Notation
 */

Route::post('/scoring/store', 'ScoringController@store');



/**
 * achat 
 */

Route::post('/purchase/store', 'PurchaseController@store');

Route::get('/request/purchase' , 'PurchaseController@index');

Route::get('/list-purchase/{id}' , 'PurchaseController@purchaseDisplay');

Route::put('/purchase/state/modify' , 'PurchaseController@purchaseApprove');


/* 
    page produit
*/ 
Route::get('/ad/{id}/show','AdController@show');
Route::get('/ad/{id}/chat', 'AdController@chat');

Route::get('/ad/{id}/edit','AdController@edit');

Route::put('/ad/{id}/update','AdController@update');



Route::get('/ad/{id}/show2/{id_seller}/{id_buyer}','AdController@show2');

Route::delete('/ads/{id}/destroy', 'AdController@destroy');

Route::put('/users/{id}/state', 'HomeController@active');

Route::put('/users/{id}/rights', 'HomeController@rightsAdmin');

Route::delete('/users/{id}/destroy', 'HomeController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * =======================================================
 * =======================================================
 */
// catégories

//pour afficher la liste des catégories
Route::get('/categories', 'CategoryController@index');
//pour ajouter une catégorie
Route::get('/categories/create', 'CategoryController@create');
Route::post('/categories', 'CategoryController@store');

//pour modifier une catégorie
Route::get('/categories/{id}/edit', 'CategoryController@edit');
Route::put('/categories/{id}', 'CategoryController@update');

//pour suprimer une catégorie avec id
Route::get('/categories/{id}/destroy', 'CategoryController@destroy');
