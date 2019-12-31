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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('lang/{locale}', 'LocalizationController@index');
Auth::routes(['verify'=> true]);


 Route::get('/users/confirmation/{token}','Auth\RegisterController@confirmation')->name('confirmation');


//Admin route
Route::get('admin/digi221/digiwork', 'AdminController@index')->name('admin');
Route::get('admin/digi221/digiwork/domaine', 'AdminController@listDomaine')->name('listDomaine');
Route::post('admin/digi221/digiwork/domaine/save', 'AdminController@saveDomaine')->name('saveDomaine');
Route::get('admin/digi221/digiwork/domaine/delete/{id}', 'AdminController@deleteDomaine')->name('deleteDomaine');
Route::post('admin/digi221/digiwork/specialite/save' , 'AdminController@saveSpecialite')->name('saveSpecialite');
Route::get('admin/digi221/digiwork/specialite/delete/{id}', 'AdminController@deleteSpecialite')->name('deleteSpecialite');





//profil edition 

Route::get('digi221/digiwork/prestataires', 'PrestataireController@index')->name('editProfil');
Route::get('digi221/digiwork/prestataires/valideProfil', 'PrestataireController@valideProfil')->name('valideProfil');
Route::post('digi221/digiwork/prestataires/saveProfil', 'PrestataireController@saveProfil')->name('saveProfil');
Route::get('digi221/digiwork/prestataires/listeAnnonces', 'PrestataireController@listeAnnonces')->name('listeAnnonces');

