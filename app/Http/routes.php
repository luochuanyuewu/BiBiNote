<?php

/*
|--------------------------------------------------------------------------
| 应用程序路由
|--------------------------------------------------------------------------
|
| 此文件用来定义整个应用的路由信息
| 路由就是，你输入了什么url，定义返回什么样的资源
*/

//根目录路由，返回welcome界面并追加所有公开的帖子数据
Route::get('/', function () {
    $notes = \App\Note::where('is_public', 1)->orderBy('created_at', 'desc')->get();
    return view('welcome', compact('notes'));
});
//返回readme界面
Route::get('/readme', function () {
    return view('readme');
});
//返回显示所有用户的界面
Route::get('user/showall', ['as' => 'user.showall', function () {

    $users = \App\User::all();
    return view('users.showall', compact('users'));
}]);

Route::get('user/show/{id}', ['as' => 'user.show', 'uses' => "UserController@show"]);

Route::get('note/show/{id}', ['as' => 'note.show', 'uses' => "NoteController@show"]);

Route::auth();


//这是路由组，在这个组下的所有界面都必须登陆了才能访问
Route::group(['middleware' => ['auth']], function () {

    //Note相关的route
    //查看登陆用户的所有帖子
    Route::get('note', ['as' => 'note.index', 'uses' => "NoteController@index"]);
    //编辑登陆用户的某个帖子
    Route::get('note/edit/{id}', ['as' => 'note.edit', 'uses' => "NoteController@edit"]);
    //处理登陆用户的某个帖子的公开性
    Route::get('note/setPublic/{id}', ['as' => 'note.setPublic', 'uses' => "NoteController@setPublic"]);
    //用于处理创建某个帖子
    Route::post('note/store', ['as' => 'note.store', 'uses' => "NoteController@store"]);
    //用于更新某个帖子
    Route::patch('note/update/{id}', ['as' => 'note.update', 'uses' => "NoteController@update"]);
    //用于删除某个帖子
    Route::get('note/destroy/{id}', ['as' => 'note.destroy', 'uses' => "NoteController@destroy"]);

    //Tag相关的route
    //用于显示所有的分类
    Route::get('category', ['as' => 'category.index', 'uses' => "CategoryController@index"]);
    //用于按照特定分类来浏览帖子
    Route::get('category/show/{id}', ['as' => 'category.show', 'uses' => "CategoryController@show"]);
    //新建某个分类
    Route::post('category/store', ['as' => 'category.store', 'uses' => "CategoryController@store"]);
    //删除某个分类
    Route::get('category/destroy/{id}', ['as' => 'category.destroy', 'uses' => "CategoryController@destroy"]);


    //User相关的route
    //查看某个用户
    Route::get('user/edit', ['as' => 'user.edit', 'uses' => "UserController@edit"]);
    //编辑某个用户
    Route::patch('user/update', ['as' => 'user.update', 'uses' => "UserController@update"]);

});