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

Route::get('/', function () {
    return redirect('login');
});
Route::get('/get/{folderA}/{folderB}','ImageController@get');
Route::post('/post','ImageController@post')->name('post');
Auth::routes([
    'register' => false,
]);
Route::group(['middleware' => ['auth'],],function(){
        
    Route::get('/home', function() {
    return view('home');
    })->name('home');
    
    Route::group(['prefix' => 'admin'],function()
    {
        // students
        Route::get('/addStudent','AdminController@getAddStudent')->name('add.student');
        Route::post('/addStudent','AdminController@postAddStudent')->name('add.student');
        Route::get('/updateStudent/{name}', 'AdminController@getUpdateStudent')->name('update.student');
        Route::post('/updateStudent/{name}', 'AdminController@postUpdateStudent')->name('update.student');
        Route::get('/listStudents','AdminController@getListStudents')->name('list.student');
    });
});
