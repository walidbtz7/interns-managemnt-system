<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect('dashboard');
});

// Route::get('stagaire','stagaireController@index');
// Route::get('stagaire/create','stagaireController@Create');
// Route::post('stagaire','stagaireController@store');
// Route::get('stagaire/{cin}/edit','stagaireController@edit');
// Route::put('stagaire/{cin}','stagaireController@update');
// Route::get('stagaire/{cin}','stagaireController@destroy');

Route::resource('stagaire','StagaireController');
Route::resource('user','UsersController');
Route::get('allstagaire','StagaireController@showSta');


Route::get('dashboard','StagaireController@dashb');
Route::get('ATTESTATION/{id}','StagaireController@attes');
Route::post('addAbs','StagaireController@addAbs');


Route::get('/downoladAll','StagaireController@exportAll');
Route::get('/downoladEnCours','StagaireController@exportEc');
Route::get('/downoladCom','StagaireController@exportCom');
Route::get('/downoladRef','StagaireController@exportRef');

Route::get('/search/{cin}','StagaireController@search');
Route::get('/allS','StagaireController@allStagaire');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
