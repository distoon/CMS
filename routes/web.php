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

    Route::get('/home',function(){
        return view('home');
    });

    Route::get('/profile', function() {
        switch(\Auth::user()->role){
            case '0':
                return view('admin.profile');
                break;
            case '1':
                return view('student.profile');
                break;
            case '2':
                return view('instructor.profile');
                break;
            default: return redirect(route('login'));
        }
    })->name('profile');
        
    Route::group(['prefix' => 'admin','middleware' => ['admin'],],function()
    {
        // students
        Route::get('/add-student','AdminController@getAddStudent')->name('add.student');
        Route::post('/add-student','AdminController@postAddStudent')->name('add.student');
        Route::get('/edit-student/{name}', 'AdminController@getUpdateStudent')->name('edit.student');
        Route::post('/update-student/{name}', 'AdminController@postUpdateStudent')->name('update.student');
        Route::get('/students','AdminController@getListStudents')->name('list.student');
        Route::get('/student/{name}', 'AdminController@getViewStudent')->name('view.student');

        // Courses
        Route::get('/add-course','AdminController@getAddCourse')->name('add.course');
        Route::post('/add-course','AdminController@postAddCourse')->name('add.course');
        Route::get('/courses', 'AdminController@getListCourses')->name('list.course');
        Route::get('/edit-course/{code}', 'AdminController@getUpdateCourse')->name('edit.course');
        Route::post('/update-course/{code}', 'AdminController@postUpdateCourse')->name('update.course');
        Route::get('/course/{code}', 'AdminController@postUpdateCourse')->name('view.course');

        // halls
        Route::get('/halls','AdminController@listHalls')->name('list.hall');
        Route::get('/add-hall','AdminController@createHall')->name('add.hall');
        Route::post('/add-hall','AdminController@storeHall')->name('add.hall');
        Route::get('/hall/{id}','AdminController@showHall')->name('update.hall');
        Route::get('/edit-hall/{id}','AdminController@editHall')->name('edit.hall');
        Route::post('/update-hall/{id}','AdminController@updateHall')->name('update.hall');

        // instructors
        Route::get('/instructors','AdminController@listInstructors')->name('list.instructor');
        Route::get('/add-instructor','AdminController@createInstructor')->name('add.instructor');
        Route::post('/add-instructor','AdminController@storeInstructor')->name('add.instructor');
        Route::get('/instructor/{id}','AdminController@showInstructor')->name('update.instructor');
        Route::get('/edit-instructor/{id}','AdminController@editInstructor')->name('edit.instructor');
        Route::post('/update-instructor/{id}','AdminController@updateInstructor')->name('update.instructor');
    });        
});
        
