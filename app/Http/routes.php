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
    return redirect('/user');
});

Route::resource('user', 'UsersController', [
    'except' => 'show',
    'names' => [
        'index' => 'user.index',
        'create' => 'user.create',
        'store' => 'user.store',
        'show' => 'user.show',
        'update' => 'user.update',
        'edit' => 'user.edit',
        'destroy' => 'user.destroy',
    ],
]);

Route::post('attach_book/{book_id}/user/{user_id}', [
    'uses' => 'LibraryController@attachBook',
    'as'   => 'library.attach_book',
]);

Route::post('remove_book/{book_id}/user/{user_id}', [
    'uses' => 'LibraryController@detachBook',
    'as'   => 'library.detach_book',
]);

Route::get('attach_book/{book_id}', [
    'uses' => 'LibraryController@attachBookToUser',
    'as'   => 'library.attach_book',
]);

Route::get('attach_user/{book_id}', [
    'uses' => 'LibraryController@attachUserToBook',
    'as'   => 'library.attach_user',
]);

Route::resource('book', 'BooksController', [
    'except' => 'show',
    'names' => [
        'index' => 'book.index',
        'create' => 'book.create',
        'store' => 'book.store',
        'show' => 'book.show',
        'update' => 'book.update',
        'edit' => 'book.edit',
        'destroy' => 'book.destroy',
    ],
]);
