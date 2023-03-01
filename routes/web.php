<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\LibraryController;
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
/*Route to index*/

Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home');
/*End Route to index*/

/*Route to profile */

Route::get('/library', 'ProfileController@getProfile');

Route::get('click_edit/{UID}', 'EditProfileController@edit_function'); //Route to Ctrller edit profile

Route::post('update/{UID}', 'EditProfileController@update_function'); //Route to Ctrller update profile

Route::get('click_edit_password/{UID}', 'ChangePasswordController@changePassword'); //Route to Ctrller change password

Route::post('update-password', 'ChangePasswordController@updatePassword'); //Route to Ctrller update password
/*End Route to profile*/
/*Route to library */
Route::get('/library', 'LibraryController@index');
Route::get('/Library', 'LibraryController@create');
Route::get('/add_new_library', 'LibraryController@AddForm');
Route::post('/update-library', 'LibraryController@UpdateLibrary');

Route::get('edit-library/{LIBRARYID}', 'LibraryController@editLibraryForm');
Route::post('edit-library/{LIBRARYID}', 'LibraryController@editLibrary');

Route::get('/delete-library/{LIBRARYID}', 'LibraryController@deleteLibrary');



Route::post('/updateClick', 'LibraryController@updateClick'); //route to update click



/*End Route to library*/
// Route to delete picture

Route::get('delete/{POSTID}', [LibraryController::class,'deletePicture']);
//
/*Route to insert*/
Route::get('insert', 'InsertController@insertform');
Route::get('insert', 'LibraryController@create');
Route::post('insert', 'InsertController@store');
Route::post('store', 'InsertController@store');
/*End Route to insert*/
/*Route to sign in*/
Route::get('/dangnhap', 'SignInController@index');
Route::post('/postLogin', 'SignInController@postLogin');

//Logout
Route::get('/logout', [
    'as' => 'logout',
    'uses' => 'SignInController@logOut'
]);


//get info
Route::get('/getInfo', [
    'as' => 'getInfo',
    'uses' => 'SignInController@getInformation'
]);
//register
Route::get('/register', 'RegisterController@index'); //dan toi trang register
Route::post('/postRegister', 'RegisterController@postRegister');
//Route to profile artist
Route::get('/profile_artist/{UID}', 'ProfileArtistController@index');
