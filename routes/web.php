
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

Route::get('/', 'NotesController@index');

Route::get('/newnote', 'NotesController@showForm');

Route::get('/edit/{id}', 'NotesController@showForm');

Route::delete('/delete/{id}', 'NotesController@delete');

Route::post('/edit', 'NotesController@edit');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::post('/login', 'LoginController@authenticate');

Route::get('/notes', 'NotesController@get');

Route::get('/notes/{id}','NotesController@get');
