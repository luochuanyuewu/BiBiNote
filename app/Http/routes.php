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

Route::get('/readme', function () {
    return view('readme');
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
    Route::get('category',['as'=>'category.index','uses'=>"CategoryController@index"]);
    Route::get('category/show/{id}',['as'=>'category.show','uses'=>"CategoryController@show"]);
    Route::get('category/create',['as'=>'category.create','uses'=>"CategoryController@create"]);
    Route::get('category/edit/{id}',['as'=>'category.edit','uses'=>"CategoryController@edit"]);

    Route::post('category/store',['as'=>'category.store','uses'=>"CategoryController@store"]);
    Route::patch('category/update/{id}',['as'=>'category.update','uses'=>"CategoryController@update"]);

    Route::get('category/destroy/{id}',['as'=>'category.destroy','uses'=>"CategoryController@destroy"]);

});