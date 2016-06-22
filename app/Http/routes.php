<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

//Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {

    //Note相关的route

    Route::get('note',['as'=>'note.index','uses'=>"NoteController@index"]);
    Route::get('note/show/{id}',['as'=>'note.show','uses'=>"NoteController@show"]);
    Route::get('note/create',['as'=>'note.create','uses'=>"NoteController@create"]);
    Route::get('note/edit/{id}',['as'=>'note.edit','uses'=>"NoteController@edit"]);

    Route::post('note/store',['as'=>'note.store','uses'=>"NoteController@store"]);
    Route::patch('note/update/{id}',['as'=>'note.update','uses'=>"NoteController@update"]);

    Route::get('note/destroy/{id}',['as'=>'note.destroy','uses'=>"NoteController@destroy"]);

    //Tag相关的route
    Route::get('tag',['as'=>'tag.index','uses'=>"TagController@index"]);
    Route::get('tag/show/{id}',['as'=>'tag.show','uses'=>"TagController@show"]);
    Route::get('tag/create',['as'=>'tag.create','uses'=>"TagController@create"]);
    Route::get('tag/edit/{id}',['as'=>'tag.edit','uses'=>"TagController@edit"]);

    Route::post('tag/store',['as'=>'tag.store','uses'=>"TagController@store"]);
    Route::patch('tag/update/{id}',['as'=>'tag.update','uses'=>"TagController@update"]);

    Route::get('tag/destroy/{id}',['as'=>'tag.destroy','uses'=>"TagController@destroy"]);
});