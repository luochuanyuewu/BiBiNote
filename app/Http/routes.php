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
    $notes =  \App\Note::where('is_public',1)->orderBy('created_at', 'desc')->get();

    return view('welcome',compact('notes'));
});

Route::get('/readme', function () {
    return view('readme');
});


Route::get('user/show/{id}',['as'=>'user.show','uses'=>"UserController@show"]);

Route::auth();



//Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {

    //Note相关的route

    Route::get('note',['as'=>'note.index','uses'=>"NoteController@index"]);
    Route::get('note/edit/{id}',['as'=>'note.edit','uses'=>"NoteController@edit"]);
    Route::get('note/setPublic/{id}',['as'=>'note.setPublic','uses'=>"NoteController@setPublic"]);

    Route::post('note/store',['as'=>'note.store','uses'=>"NoteController@store"]);
    Route::patch('note/update/{id}',['as'=>'note.update','uses'=>"NoteController@update"]);

    Route::get('note/destroy/{id}',['as'=>'note.destroy','uses'=>"NoteController@destroy"]);

    //Tag相关的route
    Route::get('category',['as'=>'category.index','uses'=>"CategoryController@index"]);
    Route::get('category/show/{id}',['as'=>'category.show','uses'=>"CategoryController@show"]);
    Route::post('category/store',['as'=>'category.store','uses'=>"CategoryController@store"]);
    Route::get('category/destroy/{id}',['as'=>'category.destroy','uses'=>"CategoryController@destroy"]);


    //User相关的route
    Route::get('user/edit',['as'=>'user.edit','uses'=>"UserController@edit"]);
    Route::patch('user/update',['as'=>'user.update','uses'=>"UserController@update"]);

});