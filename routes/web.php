<?php
use Illuminate\Support\Facades\Session;
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







//global route for language middleware 


Route::group(['middleware' => ['changelanguage']],function(){
//all app routes must be here 

//route for changa langauge in app
Route::get('/lang/{lang}','languageController@changelanguage');






Route::get('/adminpanel','HomeController@dashboard')->name('adminpanel');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');










});




