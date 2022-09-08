<?php

use Illuminate\Support\Facades\Route;

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

//Author
Route::get('index','App\Http\Controllers\LoginController@getIndex');
Route::get('list-story/{authorId}','App\Http\Controllers\AuthorController@listStory');
Route::get('add-story','App\Http\Controllers\AuthorController@addStory');
Route::post('add-story','App\Http\Controllers\AuthorController@addStoryDB');
Route::get('edit-story','App\Http\Controllers\AuthorController@editstory');
Route::get('story/{id}','App\Http\Controllers\AuthorController@story');
Route::get('add-chapter/{id}','App\Http\Controllers\AuthorController@addchapter');
Route::post('add-chapter/{id}','App\Http\Controllers\AuthorController@addchapterDB');
Route::get('edit-chapter','App\Http\Controllers\AuthorController@editchapter');
Route::get('del-story/{id}','App\Http\Controllers\AuthorController@delStory');
//User
Route::get('login', 'App\Http\Controllers\UserController@getLogin');
Route::get('logout', 'App\Http\Controllers\UserController@logout');
Route::post('login', 'App\Http\Controllers\UserController@postLogin');
Route::get('register', 'App\Http\Controllers\UserController@getRegister');
Route::post('register', 'App\Http\Controllers\UserController@postRegister');
Route::get('get-author', 'App\Http\Controllers\UserController@getAuthor');
Route::get('account', 'App\Http\Controllers\UserController@getAccountPage');
Route::get('change-avt', 'App\Http\Controllers\UserController@changeAvt');
Route::get('change-name', 'App\Http\Controllers\UserController@changeName');
Route::get('change-password', 'App\Http\Controllers\UserController@changePass');
Route::get('change-email', 'App\Http\Controllers\UserController@changeEmail');
Route::post('change-anh-dai-dien', 'App\Http\Controllers\UserController@postChangeAvt');
Route::post('change-ten-hien-thi', 'App\Http\Controllers\UserController@postChangeName');
Route::post('change-mat-khau', 'App\Http\Controllers\UserController@postChangePass');
Route::post('change-email', 'App\Http\Controllers\UserController@postChangeEmail');

//Adnin
Route::get('add-category', 'App\Http\Controllers\AdminController@addCategory' );
Route::post('add-category', 'App\Http\Controllers\AdminController@postCategory' );
Route::get('list-category', 'App\Http\Controllers\AdminController@listCategory' );
Route::get('edit-category/{id}/{metaTitle}', 'App\Http\Controllers\AdminController@editCategory' );
Route::post('edit-category/{id}', 'App\Http\Controllers\AdminController@postEditCategory' );
Route::get('del-category/{id}', 'App\Http\Controllers\AdminController@delCategory' );
Route::get('get-info', 'App\Http\Controllers\AdminController@getInfo' );
Route::post('post-info', 'App\Http\Controllers\AdminController@postInfo' );
Route::get('accept-author', 'App\Http\Controllers\AdminController@acptAuthor');
Route::get('list-user', 'App\Http\Controllers\AdminController@listUser');
Route::get('delete-user/{id}', 'App\Http\Controllers\AdminController@delUser');
Route::get('unblock/{id}', 'App\Http\Controllers\AdminController@unckUser');
//SMOD
Route::get('list-author-application', 'App\Http\Controllers\AdminController@listAuthorApp');
Route::get('acp-invite/{id}', 'App\Http\Controllers\AdminController@acpAuthorApp');
Route::get('refuse-invite/{id}', 'App\Http\Controllers\AdminController@refAuthorApp');
Route::get('list-report', 'App\Http\Controllers\AdminController@getReport');
Route::get('report/{id}', 'App\Http\Controllers\AdminController@getReportView');
Route::get('ref-report/{id}', 'App\Http\Controllers\AdminController@refReport');
Route::get('accept-report/{id}', 'App\Http\Controllers\AdminController@acpReport');
Route::get('list-story-mod', 'App\Http\Controllers\AdminController@listStoryMod');
Route::get('decu/{id}', 'App\Http\Controllers\AdminController@deCu');
Route::get('top1/{id}', 'App\Http\Controllers\AdminController@top1');
Route::get('list-author-mod', 'App\Http\Controllers\AdminController@listAuthorMod');
Route::get('noibat/{id}', 'App\Http\Controllers\AdminController@noiBat');
//public-web
Route::get('tieuthuyetviet.com', 'App\Http\Controllers\PageController@getTrangChu');
Route::get('trangtruyen/{id}', 'App\Http\Controllers\PageController@getStory');
Route::get('read-chapter/{id}', 'App\Http\Controllers\PageController@getChapter');  
Route::get('read-chapter-new/{id}', 'App\Http\Controllers\PageController@getChapterNew');     
Route::get('{id}/the-loai-{metaTitle}', 'App\Http\Controllers\PageController@getList'); 
Route::get('new-story', 'App\Http\Controllers\PageController@getListNew'); 
Route::get('final-story', 'App\Http\Controllers\PageController@getListFinal'); 
Route::get('next-chapter/{id}', 'App\Http\Controllers\PageController@getNextChapter'); 
Route::get('pre-chapter/{id}', 'App\Http\Controllers\PageController@getPreChapter'); 
Route::get('read-chapterStory/{id}', 'App\Http\Controllers\PageController@getReadChapter'); 
Route::get('continute-read/{id}', 'App\Http\Controllers\PageController@getContinuteChapter');
Route::get('favorite-story', 'App\Http\Controllers\UserController@getFavorite');  
Route::get('add-favorite/{id}', 'App\Http\Controllers\UserController@addFavorite');  
Route::get('del-favorite/{id}', 'App\Http\Controllers\UserController@delFavorite'); 
Route::post('postComment/{id}/{chapterId}', 'App\Http\Controllers\PageController@postComment');
Route::get('bao-loi/{id}', 'App\Http\Controllers\PageController@getLoi'); 
Route::post('bao-loi-truyen/{id}', 'App\Http\Controllers\PageController@postLoi'); 