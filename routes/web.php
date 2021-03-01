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

// ログイン画面
Route::get('/login_form', 'UserController@login_form')->name('login_form');
// ログイン画面
Route::post('/login', 'UserController@login')->name('login');


//==========================================================================


// ブログ一覧画面
Route::get('/', 'BlogController@showList')->name('blogs');
// ブログ登録画面
Route::get('blog/create', 'BlogController@showCreate')->name('create');
// ブログ登録
Route::post('blog/store', 'BlogController@exeStore')->name('store');
// ブログ詳細画面
Route::get('blog/{id}', 'BlogController@showDetail')->name('show');
// ブログ編集画面
Route::get('blog/edit/{id}', 'BlogController@showEdit')->name('edit');
Route::post('blog/update', 'BlogController@exeUpdate')->name('update');
// ブログ削除
Route::post('blog/delete/{id}', 'BlogController@exeDelete')->name('delete');


//==========================================================================

// テスト用（練習用）
Route::get('test/index', 'TestController@showIndex')->name('testIndex');
// テスト投稿編集画面
Route::get('test/edit/{id}', 'TestController@showEdit')->name('testEdit');
//更新処理
Route::post('test/update', 'TestController@exeUpdate')->name('testUpdate');